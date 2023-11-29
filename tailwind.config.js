import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                body: ["Inter"],
            },
            colors: {
                primarybw: {
                    black: "#212121",
                    secondary: "#687083",
                    icon: "#9AA2B1",
                    outline: "#D1D5DC",
                    inline: "#E4E7EB",
                    light: "#F0F2F5",
                    surface: "#F9FAFB",
                    white: "#FFFFFF",
                },
                primary: {
                    darkblue: "#052845",
                    limegreen: "#C5DA4D",
                },
            },
        },
    },

    plugins: [forms],
};
