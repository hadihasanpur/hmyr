module.exports = {
  // mode: 'jit',
  // content: ['./index.html','./index2.html'],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    screens: {
      'xs': '310px',
      // => @media (min-width: 310px) { ... }   Huawei => 360  =>  xs
      'sm': '640px',
      // => @media (min-width: 640px) { ... }   Huawei => 687  =>  sm
      'md': '768px',
      // => @media (min-width: 768px) { ... }
      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }
      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }  acer => 1366  =>  xl
      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
      '3xl': '1792px',
      // => @media (min-width: 1792) { ... }    LG  => 1920  =>   3xl  |  Benko  =>1920
      '4xl': '2048px',
      // => @media (min-width: 2048) { ... }
    },

    fontFamily: {
      'vazir': ['Vazir']
    },
    theme: {
      fontSize: {
        'sm': '0.8rem',
        'base': '1rem',
        'xl': '1.25rem',
        '2xl': '1.563rem',
        '3xl': '1.953rem',
        '4xl': '2.441rem',
        '5xl': '3.052rem',
      }
    },
    extend: {
      spacing: {
        '1/2': '50%',
        '1/3': '33.333333%',
        '2/3': '66.666667%',
        '1/4': '25%',
        '2/4': '50%',
        '3/4': '75%',
        '1/5': '20%',
        '2/5': '40%',
        '3/5': '60%',
        '4/5': '80%',
        '1/6': '16.666667%',
        '2/6': '33.333333%',
        '3/6': '50%',
        '4/6': '66.666667%',
        '5/6': '83.333333%',
        '1/12': '8.333333%',
        '2/12': '16.666667%',
        '3/12': '25%',
        '4/12': '33.333333%',
        '5/12': '41.666667%',
        '6/12': '50%',
        '7/12': '58.333333%',
        '8/12': '66.666667%',
        '9/12': '75%',
        '10/12': '83.333333%',
        '11/12': '91.666667%',
      },
      gridTemplateColumns: {
        // Simple 16 column grid
        '16': 'repeat(16, minmax(0, 1fr))',
      },
      lineHeight: {
        '0': '0',
      },
      padding: {
        '1/3': '33.333333%',
        '2/3': '66.6666%'
      }
    },
  },

  plugins: [
    require('@tailwindcss/aspect-ratio'),
    //     require("@tailwindcss/forms")({
    //      strategy: 'base', // only generate global styles
    //      strategy: 'class', // only generate classes
    //    }),
  ]

  ,
}