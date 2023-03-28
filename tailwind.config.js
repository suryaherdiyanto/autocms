/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'body': ['"Open Sans", sans-serif'],
        'cairo': ['"Cairo", sans-serif']
      },
      colors: {
        'primary': "#15132B",
        'primary-darker': "#0D0B21",
        'primary-lighter': "#39365c"
      }
    },
  },
  plugins: [],
}
