module.exports = {
  content: ['./theme/**/*.php', './theme/**/*.js'],
  theme: {
    extend: {
      colors: {
        red: '#eb2e39',
        cream: '#e4d9cf',
        black: '#332e2f',
        medium: '#b7b7b7',
        light: '#eeeeee'
      },
      keyframes: {
        fadeIn: {
          from: { opacity: 0 },
          to: { opacity: 1 }
        }
      },
      animation: {
        fadeIn: 'fadeIn .5s ease-in-out'
      }
    },
    fontFamily: {
      serif: ['Georgia', 'serif'],
      sans: ['Lato', 'sans-serif']
    }
  },
  prefix: 'tw-'
};
