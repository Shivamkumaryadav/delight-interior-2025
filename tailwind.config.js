/** @type {import('tailwindcss').Config} */
export default {
  content: [
     './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  safelist: ['bg-primary', 'text-primary'], // <-- Add this
  theme: {
    extend: {
      colors: {
        maroon: '#960016',
      },
    },
  },
  plugins: [],
}
