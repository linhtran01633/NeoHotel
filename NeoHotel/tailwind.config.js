/** @type {import('tailwindcss').Config} */
export default {
  content: [
   "./resources/**/*.blade.php",
    "./resources/**/*.js"
  ],
  theme: {
    extend: {
        width: {
            'formClamp': 'clamp(16rem, 45vw, 34rem)',
        },
    },
  },
  plugins: [],
}

