import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Playfair Display', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                navy: {
                    900: '#0a1628',
                    800: '#0f1f3a',
                    700: '#16294d',
                    600: '#1e3a5f',
                    500: '#2a4a7a',
                },
                gold: {
                    DEFAULT: '#d4af37',
                    300: '#f0d97a',
                    400: '#e6c757',
                    500: '#d4af37',
                },
            },
        },
    },
    plugins: [forms],
};