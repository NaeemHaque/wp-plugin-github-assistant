const mix = require( 'laravel-mix' );
mix.setPublicPath('assets');
mix.setResourceRoot('../');

/**
 * Compile JavaScript
 */
mix.js('src/main.js', 'assets/js/index.js').vue({ version: 2 });