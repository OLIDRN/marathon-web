/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
    "./resources/**/**/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        noir: "#1C1817",
        white: "#F6F6F6",
        gold: "#CBA135",
    },
  },
  },
  plugins: [],
}