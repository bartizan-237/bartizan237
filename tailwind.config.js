const colors = require('tailwindcss/colors'); // default color sets
// console.log("colors", colors)
module.exports = {
  // darkMode : 'class',
  // purge: [
  //   './resources/views/**/*.blade.php',
  //   './resources/css/**/*.css',
  // ],
  content: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    // colors : {
    //   ...colors,
    //   transparent: 'transparent',
    //   current: 'currentColor',
    //   red : colors.red,
    //   orange: colors.orange,
    //   black: colors.black,
    //   white: colors.white,
    //   gray: colors.slate,
    //   green: colors.green,
    //   teal: colors.teal,
    //   purple: colors.violet,
    //   blue: colors.blue,
    //   sky: colors.sky,
    //   lime: colors.lime,
    //   yellow: colors.amber,
    //   pink: colors.fuchsia,
    // },
    extend: {
      colors : {
        transparent: 'transparent',
        current: 'currentColor',
        red : colors.red,
        orange: colors.orange,
        black: colors.black,
        white: colors.white,
        gray: colors.slate,
        green: colors.green,
        teal: colors.teal,
        purple: colors.violet,
        blue: colors.blue,
        sky: colors.sky,
        lime: colors.lime,
        yellow: colors.amber,
        pink: colors.fuchsia,
      },
      // screens: {
      //   light: { raw: "(prefers-color-scheme: light)" },
      //   dark: { raw: "(prefers-color-scheme: dark)" }
      // }
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
