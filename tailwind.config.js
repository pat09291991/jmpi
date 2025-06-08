/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php",
    "./about.php",
    "./products.php",
    "./stores.php",
    "./header.php",
    "./footer.php",
    "./assets/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Poppins", "sans-serif"],
      },
    },
  },
  plugins: [],
};
