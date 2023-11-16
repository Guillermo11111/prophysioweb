let mix = require('laravel-mix');

mix.js('public/js/blog_user.js', 'dist').setPublicPath('dist');
mix.js('public/js/blog.js', 'dist').setPublicPath('dist');
mix.js('public/js/captcha.js', 'dist').setPublicPath('dist');
mix.js('public/js/chat.js', 'dist').setPublicPath('dist');
mix.js('public/js/main.js', 'dist').setPublicPath('dist');
mix.js('resources/js/app.js', 'dist').setPublicPath('dist');
mix.css('resources/css/app.css', 'dist').setPublicPath('dist');