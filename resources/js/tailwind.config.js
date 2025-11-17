import forms from '@tailwindcss/forms'

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: '#4F46E5',
                secondary: '#0EA5E9',
                dark: '#1E293B',
            },
        },
    },
    plugins: [forms],
}