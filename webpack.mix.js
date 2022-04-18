const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/user/js/app.js', 'public/user/js')
    .postCss('resources/user/css/app.css', 'public/user/css', [])
    .js('resources/admin/js/app.js', 'public/admin-public/js')
    .postCss('resources/admin/css/app.css', 'public/admin-public/css', []);
