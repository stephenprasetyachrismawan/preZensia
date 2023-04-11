const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php', './node_modules/flowbite/**/*.js'

    ],

    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#c79ee5",
                    "secondary": "#ba0337",
                    "accent": "#bdfff4",
                    "neutral": "#14161F",
                    "base-100": "#F5F5FA",
                    "info": "#90C8DA",
                    "success": "#33D7A0",
                    "warning": "#F9B358",
                    "error": "#E47A67"
                }
            },
        ]
    },


    theme: {
        extend: {
            fontFamily: {
                sans: [
                    'Figtree',
                    ... defaultTheme.fontFamily.sans
                ]
            }
        }
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('daisyui'), require('flowbite/plugin')]


};
