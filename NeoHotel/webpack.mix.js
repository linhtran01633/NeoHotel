const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .react()
   .sourceMaps(); // Tùy chọn, giúp debug JavaScript

if (mix.inProduction()) {
    mix.version();
}
