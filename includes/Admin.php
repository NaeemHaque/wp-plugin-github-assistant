<?php


namespace Includes;



class Admin
{
    public function __construct()
    {
        $this->despatch_actions();
        new Admin\Menu();
    }

    public function despatch_actions()
    {
//        $addressbook = new Admin\AddressBook();
//        add_action('admin_init', [$addressbook, 'form_handler']);
//        add_action('admin_post_nj_ac_delete_address', [$addressbook, 'delete_address']);
    }
}