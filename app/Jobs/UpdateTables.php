<?php

namespace App\Jobs;

use App\Models\Game;
use App\Models\Teamstatistic;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateTables implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $seasonId;

    public function __construct(string $seasonId)
    {
        $this->seasonId = $seasonId;
    }

    public function handle(): void
    {
        $games = Game::all();
        $teamstats = Teamstatistic::all();
        foreach ($teamstats as $teamstat) {
            if ($teamstat->season_id == $this->seasonId) {
                $field['win'] = 0;
                $field['draw'] = 0;
                $field['lose'] = 0;
                $field['goal_for'] = 0;
                $field['goal_againts'] = 0;
                $field['goal_diff'] = 0;
                $field['played'] = 0;
                $field['points'] = 0;
                
                foreach ($games as $game) {
                    if($game->played == 1) {
                        if ($teamstat->id == $game->home_teamstatistic_id) {
                            $field['goal_for'] += $game->home_goal;
                            $field['goal_againts'] += $game->away_goal;
                            $field['played'] += 1;
                            if ($game->home_goal > $game->away_goal) {
                                $field['win'] += 1;
                                $field['points'] += 3;
                            } else if ($game->home_goal < $game->away_goal) {
                                $field['lose'] += 1;
                            } else {
                                $field['draw'] += 1;
                                $field['points'] += 1;
                            }
                        } else if ($teamstat->id == $game->away_teamstatistic_id) {
                            $field['goal_for'] += $game->away_goal;
                            $field['goal_againts'] += $game->home_goal;
                            $field['played'] += 1;
                            if ($game->home_goal < $game->away_goal) {
                                $field['win'] += 1;
                                $field['points'] += 3;
                            } else if ($game->home_goal > $game->away_goal) {
                                $field['lose'] += 1;
                            } else {
                                $field['draw'] += 1;
                                $field['points'] += 1;
                            }
                        }
                    }
                }

                $field['goal_diff'] = $field['goal_for'] - $field['goal_againts'];
                $teamstat->update($field);
            }
        }
    }
}
