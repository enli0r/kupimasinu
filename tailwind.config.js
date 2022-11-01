const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    screens:{
      'sm': {'max': '639px'},

      'md': {'max': '767px'},

      'lg': {'max': '1023px'},

      'xl': {'max': '1279px'},

  },


    extend: {
      colors: {
        'gray-background' : '#f7f8fc',
        'half-transparent': 'rgba(0,0,0,0.5)',
        'footer' : '#e4e4e4',
        'redd' : '#ba1b1d',
        'whitee': '#F7F4F3'
        
      },

      maxWidth: {
          main: '62.5rem',
          footer : '31.25rem',
      },
      
      spacing: {
          5: '1.25rem',
          70: '17.5rem',
          55: '17rem',
          100: '25rem',
          120: '30rem',
          175: '43.75rem',
      },
      
      fontSize: {
          xxs: ['0.625rem', { lineHeight: '1rem' }],
      },
      
      boxShadow: {
          card: '4px 4px 15px 0 rgba(36, 37, 38, 0.08)',
          dialog: '0px 5px 15px -2px rgba(0,0,0,0.66)',
          leftDialog: '-10px 3px 20px -8px rgba(0,0,0,0.50)'

      },

      fontFamily: {
          sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
      },

      screens:{
          'smMin': '640px',

          'mdMin': '768px',

          'custom' : {'max' : '839px'},

          'customMin' : '840px',

          'lgMin': '1024px',

          'xlMin': '1280px',

          


      },
      borderRadius: {
          '2xl': '1rem'
      },

      borderWidth: {
          '3' : '3px'
      }
      },
  },
  plugins: [
    require('@tailwindcss/line-clamp'),
  ],
}
