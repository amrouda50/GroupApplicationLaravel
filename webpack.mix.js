const mix = require('laravel-mix');
const path = require('path');
const tailwind = require('tailwindcss');
// config eslint
mix.webpackConfig({
    module: {
        rules: [
            {
                enforce: 'pre',
                exclude: /node_modules/,
                loader: 'eslint-loader',
                include: path.resolve(__dirname),
                test: /\.(js|vue)?$/
            },{
                test: /\.svg$/,
                loader: 'vue-svg-loader', // `vue-svg` for webpack 1.x
            },
        ]
    },
    stats: {
        children: true,
    }
})
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

mix
    .js('resources/js/app.js', 'public/js')
    .sourceMaps()
    .postCss('resources/css/app.css', 'public/css', [
        //
        tailwind('tailwind.config.js')
    ])
    .vue({ runtimeOnly: (process.env.NODE_ENV || 'production') === 'production' })
    .webpackConfig({
        output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js',
                '@': path.resolve('resources/js'),
                '~': path.resolve('resources'),
                'ziggy': path.resolve('vendor/tightenco/ziggy/dist/vue'),
            },
        }
    })
    .copyDirectory("resources/images" , "public/images");

mix.options({
    hmrOptions: {
        host: "localhost",
        port: 8500
    }
});

