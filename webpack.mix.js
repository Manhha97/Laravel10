let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css')
//    .sass('resources/assets/sass/main.scss', 'public/css');
// mix.styles([
// 	'resources/assets/css/app.css',
// 	'resources/assets/css/main.css'],
// 	'public/css/all.css');
mix.babel('resources/assets/css/adminlte.css','public/css/adminlte.min.css');
mix.babel('resources/assets/js/demo.js','public/js/demo.js');
mix.babel('resources/assets/js/adminlte.js','public/js/adminlte.js');
mix.js('resources/assets/js/home.js', 'public/js');
if (mix.inProduction()){
	mix.version();
}