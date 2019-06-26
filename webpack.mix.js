const mix = require('laravel-mix')
const glob = require('glob-all')
const path = require('path')

require('laravel-mix-purgecss')

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

mix.setPublicPath('public')
    .setResourceRoot('../') // turns assets paths in css relative to css file
    .sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/sass/backend/app.scss', 'css/backend.css')
    .js('resources/js/frontend/app.js', 'js/frontend.js')
    .js(
        [
            'resources/js/backend/before.js',
            'resources/js/backend/app.js',
            'resources/js/backend/after.js'
        ],
        'js/backend.js'
    )
    .extract()
    .sourceMaps()

if (mix.inProduction()) {
    mix.version()
        .options({
            // optimize js minification process
            terser: {
                cache: true,
                parallel: true,
                sourceMap: true
            }
        })
        .purgeCss({
            paths: () =>
                glob.sync([
                    path.join(__dirname, 'resources/views/**/*.blade.php'),
                    path.join(__dirname, 'resources/js/**/*.js')
                ]),
            // Other options are passed through to Purgecss
            whitelistPatterns: [
                /animated/,
                /^arrow$/,
                /^modal-backdrop$/,
                /^modal-open$/,
                /^show$/,
                /^collapsing$/
            ],
            whitelistPatternsChildren: [/tooltip/]
        })
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({ devtool: 'inline-source-map' })
}
