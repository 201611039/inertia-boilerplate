const mix = require('laravel-mix');
require('laravel-mix-browser-sync-multi');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .webpackConfig({
        output : {chunkFilename: 'js/[name].[contenthash].js'},
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.js',
                '@': path.resolve('resources/js'),
            },
        },
    })
    .version()
    .browserSyncMulti([
        'http://127.0.0.1:8000',
    ]);
