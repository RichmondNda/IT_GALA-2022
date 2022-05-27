const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },

        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            indigo: colors.indigo,
            red: colors.rose,
            yellow: colors.yellow,
            cyan: colors.cyan,
            teal: colors.teal,
            emerald: colors.emerald,
            green: colors.green,
            lime: colors.lime,
            amber: colors.amber,
            myorange: colors.green,
            pink : colors.pink,
            orange:'#FFD700',
            myblue:'#0f056b 	',
            
          },

    },

    
    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
