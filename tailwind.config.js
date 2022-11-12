const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Graphik", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            ...colors,
            indigo: {
                DEFAULT: "#5E17EB",
                50: "#D3C0FA",
                100: "#C6ADF8",
                200: "#AC88F5",
                300: "#9262F1",
                400: "#783DEE",
                500: "#5E17EB",
                600: "#4910BA",
                700: "#350C86",
                800: "#200753",
                900: "#0C031F",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("tailwindcss/colors"),
        require("@tailwindcss/typography"),
    ],
};
