var Elixir = require('laravel-elixir');

Elixir(function(mix) {
	mix.scripts('./assets/src/js/app.js', './assets/dist/js/github-explorer.js');

	mix.sass('./assets/src/sass/app.scss', './assets/dist/css/github-explorer.css');
});
