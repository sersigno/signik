const plugin = require('tailwindcss/plugin');

module.exports = {
  content: ['./theme/**/*.php', './theme/**/*.js'],
  theme: {
    extend: {
      colors: {
        blue: '#0000ff',
        white: '#ffffff'
      },
      keyframes: {
        fadeIn: {
          from: { opacity: 0 },
          to: { opacity: 1 }
        }
      },
      backgroundImage: {
        radialMask:
          'radial-gradient(circle closest-side at center, rgba(255,255,255,0) 0, rgba(255,255,255,1) 100%)'
      },
      animation: {
        fadeIn: 'fadeIn .5s ease-in-out',
        colorFader: 'colorFader 10s linear infinite'
      },
      fontFamily: {
        slab: ['rockwell-nova', 'sans-serif']
      }
    }
  },
  plugins: [
    plugin(function ({ addComponents }) {
      addComponents({
        '.sectionTitle': {
          fontSize: '100px',
          lineHeight: '1',
          marginBottom: '2rem',
          fontWeight: 'bold',
          textTransform: 'uppercase'
        },
        '.tabTriggers': {
          msOverflowStyle: 'none',
          scrollbarWidth: 'none'
        },
        '.tabTrigger': {
          padding: '1rem .75rem',
          borderBottom: 'solid 2px transparent',
          flexShrink: '0'
        },
        '.tabContent': {
          backgroundColor: '#3490dc',
          color: '#fff',
          '&:hover': {
            backgroundColor: '#2779bd'
          }
        },
        '.accTrigger': {},
        '.accContent': {},
        '.glide__slides.fade': {
          transform: 'none !important',
          width: 'auto !important',
          display: 'grid',
          gridTemplateAreas: 'slide'
        },
        '.glide__slide.fade': {
          position: 'relative',
          opacity: '0',
          transition: 'opacity 0.5s ease',
          gridArea: 'slide'
        },
        '.glide__slide--active.fade': {
          zIndex: '1',
          opacity: '1'
        }
      });
    })
  ]
};
