<?php

namespace Includes\Admin;

class Menu
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function admin_menu()
    {
        $parent_slug = 'github-assistant';
        $capability = 'manage_options';
        add_menu_page(
            __('Github Assistant', ' plugin-template'),
            __('Github Assistant', ' plugin-template'),
            $capability,
            $parent_slug,
            [$this, 'github_assistant'],
            plugins_url( 'github-assistant/images/github.png'),
            115
        );


    }

    public function plugin_page()
    {
        echo '<div id="app"></div>';
    }


    public function github_assistant()
    {
        echo '<div id="app"></div>';
    }

}