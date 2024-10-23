/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],

  theme: {

    extend: {
        colors: {

      'midnight': '#222831',
      'lightGrey' : '#31363F',
      'shotlanceTosca' : '#76ABAE',
      'shotlanceWhite' : '#EEEEEE',
      'hoverTosca' : '#90D6DA',
      'linkOn' : '#48F5FF',
    },},

     backgroundImage: {
        'hero-pattern': "url('/img/hero-pattern.svg')",
        'footer-texture': "url('/img/footer-texture.png')",
      }
  },

  plugins: [
    require('flowbite/plugin')
  ],
}

