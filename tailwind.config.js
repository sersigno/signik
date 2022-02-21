module.exports = {
  content: ['./theme/**/*.php', './theme/**/*.js'],
  theme: {
    extend: {
      colors: {},
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
