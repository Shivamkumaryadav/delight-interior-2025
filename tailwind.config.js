/** @type {import('tailwindcss').Config} */
export default {
  files: {
    // All files Tailwind should scan
    include: [
      './resources/**/*.{blade.php,js,vue,ts}',
    ],
  },
  theme: {
    extend: {
      colors: {
        primary: '#f97316',
      },
    },
  },
  plugins: [],
}
