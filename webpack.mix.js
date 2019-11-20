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

mix.js([
    'resources/js/template.js',
    'resources/js/logout.js',
    'resources/js/button-add.js',
    'resources/js/add-to-cart.js',
    ], 'public/js')
    .js([
    'resources/js/admin.js',
    ], 'public/js')
    .styles([
    'resources/css/slide.css',
    'resources/css/cart.css',
    'resources/css/form.css',
    'resources/css/admin.css',
    ], 'public/css/slide.css');
