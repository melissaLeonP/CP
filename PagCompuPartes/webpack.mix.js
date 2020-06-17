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

// mix.js('resources/js/app.js', 'public/js');

mix.styles([
    'resources/assets/plantilla/css/bootstrap-grid.min.css',
    'resources/assets/plantilla/css/bootstrap-reboot.min.css',
    'resources/assets/plantilla/css/bootstrap.min.css',
    'resources/assets/plantilla/css/mbr-additional.css',
    'resources/assets/plantilla/css/mobirise-icons-bold.css',
    'resources/assets/plantilla/css/mobirise-icons.css',
    'resources/assets/plantilla/css/mobirise2.css',
    'resources/assets/plantilla/css/style.css',
    'resources/assets/plantilla/css/styles.css',
    'resources/assets/plantilla/css/styleT.css',
    'resources/assets/plantilla/css/tether.css',
    'resources/assets/plantilla/css/estilos.css',

],'public/css/plantilla.css')
.scripts([
    'resources/assets/plantilla/js/tether.min.js',
    'resources/assets/plantilla/js/bootstrap-carousel-swipe.js',
    'resources/assets/plantilla/js/bootstrap.min.js',
    'resources/assets/plantilla/js/formoid.min.js',
    'resources/assets/plantilla/js/jarallax.min.js',
    'resources/assets/plantilla/js/jquery.mb.vimeo_player.js',
    'resources/assets/plantilla/js/jquery.mb.ytplayer.min.js',
    'resources/assets/plantilla/js/jquery.min.js',
    'resources/assets/plantilla/js/jquery.touch-swipe.min.js',
    'resources/assets/plantilla/js/jquery.viewportchecker.js',
    'resources/assets/plantilla/js/mbr-clients-sliders.js',
    'resources/assets/plantilla/js/mbr-flip-card.js',
    'resources/assets/plantilla/js/mbr-popup-btns.js',
    'resources/assets/plantilla/js/nav-dropdown.js',
    'resources/assets/plantilla/js/navbar-dropdown.js',
    'resources/assets/plantilla/js/popper.min.js',
    'resources/assets/plantilla/js/script.js',
    'resources/assets/plantilla/js/scriptSV.js',
    'resources/assets/plantilla/js/smooth-scroll.js',
],'public/js/plantilla.js')
.js(['resources/assets/js/app.js'],'public/js/app.js');
