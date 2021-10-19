<?php

namespace Includes;

class Installer
{
    public function run(){
        $this->create_tables();
    }

    public function create_tables(){
        global $wpdb;

//        $charset_collate = $wpdb->get_charset_collate();
//
//        $schema = "CREATE TABLE IF NOT EXISTS`{$wpdb->prefix}ac_addresses` (
//                 `Id` int(100) NOT NULL AUTO_INCREMENT,
//                 `name` varchar(100) NOT NULL,
//                 `address` varchar(255) DEFAULT NULL,
//                 `phone` varchar(30) DEFAULT NULL,
//                 `created_by` bigint(20) NOT NULL,
//                 `created_at` datetime NOT NULL,
//                 PRIMARY KEY (`Id`)
//                ) $charset_collate";
//
//        if ( ! function_exists( 'dbDelta' )){
//            require_once ABSPATH . 'wp-admin/includes/YOUR_FILE_NAME';
//        }
//
//        dbDelta( $schema );
    }

}
