const colors = require('tailwindcss/colors'); // default color sets

module.exports = {

  darkMode : 'class',
  // purge: [
  //   './resources/views/**/*.blade.php',
  //   './resources/css/**/*.css',
  // ],
  content: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    colors : {
      ...colors,
    },
    extend: {
      screens: {
        light: { raw: "(prefers-color-scheme: light)" },
        dark: { raw: "(prefers-color-scheme: dark)" }
      }
    }
  },
  variants: {},
  plugins: [
    require('tailwindcss'),
    require('@tailwindcss/forms'),
    // require('tailwindcss-children'),
    // require('@tailwindcss/ui'),
    // require('daisyui'),
    // function({ addBase, config }) {
    //   addBase({
    //     body: {
    //       color: config("theme.colors.black"),
    //       backgroundColor: config("theme.colors.white")
    //     },
    //     "@screen dark": {
    //       body: {
    //         color: config("theme.colors.white"),
    //         backgroundColor: config("theme.colors.black")
    //       }
    //     }
    //   });
    // }
  ]
}
