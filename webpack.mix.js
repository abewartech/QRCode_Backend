const mix = require('laravel-mix');

mix.js("resources/js/Dashboard.js", "public/js").react();

mix.disableNotifications();
