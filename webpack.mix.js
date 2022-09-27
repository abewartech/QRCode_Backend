const mix = require("laravel-mix");

mix.js("resources/js/Dashboard.js", "public/js").react();

mix.disableNotifications();

mix.webpackConfig({
    module: { rules: [{ test: /\.mp3$/i, use: "raw-loader" }] },
});
