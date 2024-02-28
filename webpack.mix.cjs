const mix = require('laravel-mix');

mix.sass('resources/sass/team.scss', 'public/css');

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css')
//    .options({
//        processCssUrls: false,
//        postCss: [require('postcss-css-variables')]
//    });
