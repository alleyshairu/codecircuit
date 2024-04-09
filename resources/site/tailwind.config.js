import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./resources/views/site/**/**/*.blade.php",
        "./resources/views/auth/**/**/*.blade.php",
        "./resources/views/components/**/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                'brand-yellow': '#fffaed',
                'brand-blue': '#083156',
                'brand-gray': '#f9fafb',
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                code: ['Fira sans', ...defaultTheme.fontFamily.sans],
            },
        },
        container: {
            center: true,
        },
    },
    plugins: [],
};

