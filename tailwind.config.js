const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php', './node_modules/flowbite/**/*.js', "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js"

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
                    ...defaultTheme.fontFamily.sans
                ]
            },
            display: ["group-hover"],
        },
        fontSize: {
            sm: '0.8rem',
            base: '1rem',
            xl: '1.25rem',
            '2xl': '1.563rem',
            '3xl': '1.953rem',
            '4xl': '2.441rem',
            '5xl': '3.052rem',
        }
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('daisyui'), require('flowbite/plugin'), require("tw-elements/dist/plugin.cjs")]


};
