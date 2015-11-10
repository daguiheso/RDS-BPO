var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix.less("style.less", "assets/css");

    mix.scripts([
    	"libs/jquery/jquery-2.1.4.min.js",
    	"libs/bootstrap/bootstrap-3.3.4.min.js",
    ], "assets/js", "resources/assets/js");

});