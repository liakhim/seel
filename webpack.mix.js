const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue({ version: 2 }) // Указываем Vue 2
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig({
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js' // Для совместимости с Vue 2
            }
        }
    });
