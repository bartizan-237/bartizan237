const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/appbar.js', 'public/js')
    .js('resources/js/user/*', 'public/js/user/user.js')
    .js('resources/js/post/create.js', 'public/js/post/create.js')
    .js('resources/js/post/show.js', 'public/js/post/show.js')
    .js('resources/js/bartizan/*', 'public/js/bartizan/bartizan.js')
    .sass('resources/css/layout.scss', 'public/css')
    .postCss('resources/css/bartizan/create.css', 'public/css/bartizan', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
        require('autoprefixer'),
    ])
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
        require('autoprefixer'),
    ])
    .postCss('resources/css/main.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
        require('autoprefixer'),
    ]);

if (mix.inProduction()) {
    mix
        .version();
}
