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
  
    mix.js('addons/default/rajv3/spa-theme/resources/js/app.js', 'public/js/') 
        .sass('addons/default/rajv3/spa-theme/resources/scss/app.scss', 'public/css'); 
  
  // Utilities
    //mix.scripts([
    //  'addons/default/rajv3/spa-theme/resources/js/utilities/gallery-simple.js',
    ////  'addons/default/rajv3/spa-theme/resources/js/utilities/gallery-boxslides.js',
    //  'addons/default/rajv3/spa-theme/resources/js/utilities/gallery-multiboxslides.js',
    //            ], 'public/js/gallery-all.js'); 
    //mix.js('addons/default/rajv3/spa-theme/resources/js/utilities/gallery-boxslides.js', 'public/js/') 
    //mix.js('addons/default/rajv3/spa-theme/resources/js/utilities/gallery-multiboxslides.js', 'public/js/') 

  //------- Yoga En Joie
    mix.js('addons/default/rajv3/spa-theme/resources/js/yogaenjoie_app.js', 'public/js/yogaenjoie_app.js')
        .sass('addons/default/rajv3/spa-theme/resources/scss/yogaenjoie_app.scss', 'public/css'); 

  //------- Yoann
  //  mix.js('addons/default/rajv3/spa-theme/resources/js/yoann_app.js', 'public/js/yoann_app.js')
   //     .sass('addons/default/rajv3/spa-theme/resources/scss/yoann_app.scss', 'public/css');  
  
  //------- Desan
    mix.js('addons/default/rajv3/spa-theme/resources/js/desan_app.js', 'public/js/desan_app.js')
        .sass('addons/default/rajv3/spa-theme/resources/scss/desan_app.scss', 'public/css');  
      //manifest desan  
      mix.copy('addons/default/rajv3/spa-theme/resources/views/partials/desan/webmanifest.json', 'public/app/desan.webmanifest');

