<?php

/**
 * Plugin Name:       Github Assistant
 * Description:       Github Assistant Plugin by using github api.
 * Version:           1.0.0
 * Author:            Naeem Haque
 * License:           GPL v2 or later
 * Text Domain:       plugin-template
 */

if (!defined('ABSPATH')) {
    exit();
} // No direct access allowed

require_once __DIR__ . '/vendor/autoload.php';


final class GithubAssistant
{

    /**
     * Define Plugin Version
     */
    const VERSION = '1.0.0';

    /**
     * Construct Function
     */
    public function __construct()
    {
        $this->plugin_constants();
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);
        add_action('plugins_loaded', [$this, 'init_plugin']);

        //fetch all users
        add_action( 'wp_ajax_nopriv_fetch_users', [Includes\api\Api::class, 'fetch_all_users'] );
        add_action( 'wp_ajax_fetch_users', [Includes\api\Api::class, 'fetch_all_users'] );

        //fetch single user information
        add_action( 'wp_ajax_nopriv_user_information',  [Includes\api\Api::class, 'fetch_user_information']);
        add_action( 'wp_ajax_user_information', [Includes\api\Api::class, 'fetch_user_information']);

        //fetch user repositories
        add_action( 'wp_ajax_nopriv_user_repos',  [Includes\api\Api::class, 'fetch_user_repos']);
        add_action( 'wp_ajax_user_repos', [Includes\api\Api::class, 'fetch_user_repos']);

        //fetch user following list
        add_action( 'wp_ajax_nopriv_user_following',  [Includes\api\Api::class, 'fetch_user_following']);
        add_action( 'wp_ajax_user_following', [Includes\api\Api::class, 'fetch_user_following']);

        //fetch user follower list
        add_action( 'wp_ajax_nopriv_user_follower',  [Includes\api\Api::class, 'fetch_user_follower']);
        add_action( 'wp_ajax_user_follower', [Includes\api\Api::class, 'fetch_user_follower']);

    }

    /**
     * Plugin Constants
     * @since 1.0.0
     */
    public function plugin_constants()
    {
        define('PLUGIN_VERSION', self::VERSION);
        define('PLUGIN_TEMPLATE_PATH', trailingslashit(plugin_dir_path(__FILE__)));
        define('PLUGIN_URL', trailingslashit(plugins_url('', __FILE__)));
        define('PLUGIN_ASSETS', PLUGIN_URL . 'assets/');
//        define('PLUGIN_NONCE', 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N:GKBkn$piN0.N%N~X91VbCn@.4');
    }

    /**
     * Singletone Instance
     * @since 1.0.0
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * On Plugin Activation
     * @since 1.0.0
     */
    public function activate()
    {
        $is_installed = get_option('plugin_is_installed');

        if (!$is_installed) {
            update_option('plugin_is_installed', time());
        }

        update_option('plugin_is_installed', PLUGIN_VERSION);

        //instance of create table class
        $installer = new Includes\Installer();
        $installer->run();
    }

    /**
     * On Plugin De-actiavtion
     * @since 1.0.0
     */
    public function deactivate()
    {

    }

    /**
     * Init Plugin
     * @since 1.0.0
     */
    public function init_plugin()
    {

        new Includes\Assets();


        if (is_admin()) {
            new Includes\Admin();
        } else {
            new Includes\Frontend();
        }

    }


}

function plugin_template()
{
    return new GithubAssistant();
}

plugin_template();



