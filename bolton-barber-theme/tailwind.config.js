/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./index.php",
        "./functions.php",
        "./src/**/*.{ts,js,css}",
        "./parts/**/*.php",
        "./templates/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                "primary": "#ec5b13",
                "background-dark": "#121212",
                "surface-dark": "#1e1e1e",
                "accent-gold": "#d4af37",
            },
            fontFamily: {
                "display": ["Public Sans", "sans-serif"],
            },
        },
    },
    plugins: [],
}
