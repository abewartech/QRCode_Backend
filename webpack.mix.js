const mix = require("laravel-mix");
require("laravel-mix-versionhash");
require("laravel-mix-clean");

mix.js("resources/js/Dashboard.js", "public/js")
    .js("resources/js/Statis.js", "public/js")
    .clean({
        cleanOnceBeforeBuildPatterns: ["./js/*"],
    })
    .react();

mix.disableNotifications();

mix.webpackConfig({
    module: { rules: [{ test: /\.mp3$/i, use: "raw-loader" }] },
});

if (mix.inProduction()) {
    mix.versionHash();
}
