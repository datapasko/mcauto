import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "#fff1f1;",                    
                    100: "#ffe0e0",
                    200: "#ffc6c6",
                    300: "#ff9f9f",
                    400: "#ff6767",
                    500: "#fb2d2d",
                    600: "#e91919",
                    700: "#c41111",
                    800: "#a21212",
                    900: "#861616",
                    950: "#490606" 
                },
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
    corePlugins: {
      preflight: false, // Esto reduce el tiempo si no usas los estilos base de Tailwind.
    }
};
