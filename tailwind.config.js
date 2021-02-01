const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
          
                black: '#000',
                white: '#fff',
                side: '#b87700',
                main: '#E5E5E5',
                'print': '#FF9800',
                
              },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    // plugins: [require('@tailwindcss/ui')],
};
