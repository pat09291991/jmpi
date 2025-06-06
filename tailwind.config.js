/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php", "./about.php", "./contact.php", "./assets/**/*.js"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Poppins", "sans-serif"],
      },
    },
  },
  plugins: [],
};
