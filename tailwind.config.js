module.exports = {
  content: [
    "./resources/js/**/*.{vue,js}",
    './resources/**/*.blade.php',
  ],
  theme: {
    fontFamily: {
      'sans': ['PT Sans', 'sans-serif'],
      'serif': ['PT Serif', 'serif']
    },
    extend: {
      colors: {
        main: '#C2F2EB',
        secondary:{
          1: '#F49686',
          2: '#DE6F6F'
        }
      },
    },
  },
  plugins: [],
}
