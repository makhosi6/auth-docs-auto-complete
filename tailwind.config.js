const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require('tailwindcss/colors');


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
                DEFAULT: '#29F294',
                '50': '#D6FDEB',
                '100': '#C3FBE1',
                '200': '#9CF9CE',
                '300': '#76F7BA',
                '400': '#4FF4A7',
                '500': '#29F294',
                '600': '#0DD678',
                '700': '#0AA15A',
                '800': '#076C3D',
                '900': '#03371F'
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require('tailwindcss/colors'),
        require("@tailwindcss/typography"),
    ],
};
