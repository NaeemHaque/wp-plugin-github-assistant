<?php

namespace Includes\Frontend;

class Shortcode{
    public function __construct()
    {
        add_shortcode('github-assistant', [$this, 'render_shortcode']);
    }
    public function render_shortcode( $atts, $content){
        echo '<div id="app"></div>';
    }
}

