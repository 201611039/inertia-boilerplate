const mix = require('laravel-mix');
const path = require('path');

require('laravel-mix-browser-sync-multi');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .webpackConfig({
        // output : {chunkFilename: 'js/[name].[contenthash].js'},
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.js',
                '@': path.resolve('resources/js'),
                '~': path.resolve('resources'),
                ziggy: path.resolve('vendor/tightenco/ziggy/src/js/route.js'),
            },
        },
        module: {
            rules: [
              {
                test: /\.s(c|a)ss$/,
                use: [
                  'vue-style-loader',
                  'css-loader',
                  {
                    loader: 'sass-loader',
                    // Requires sass-loader@^7.0.0
                    options: {
                      implementation: require('sass'),
                      indentedSyntax: true // optional
                    },
                    // Requires sass-loader@^8.0.0
                    options: {
                      implementation: require('sass'),
                      sassOptions: {
                        indentedSyntax: true // optional
                      },
                    },
                  },
                ],
              },
            ],
        }
    })
    .webpackConfig(webpack => {
        return {
            plugins: [
                new webpack.ProvidePlugin({
                    "window.Quill": "quill/dist/quill.js",
                    Quill: "quill/dist/quill.js"
                })
            ]
        };
    })
    .version()
    .browserSyncMulti([
        'localhost:8000',
    ]);
