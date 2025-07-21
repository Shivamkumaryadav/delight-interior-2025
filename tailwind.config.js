/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.{blade.php,js,vue,ts}',
  ],
  safelist: ['bg-primary', 'text-primary'], // <-- Add this
  theme: {
    extend: {
      colors: {
        dshs: '#f97316', // <-- orange
      },
    },
  },
  plugins: [],
}
