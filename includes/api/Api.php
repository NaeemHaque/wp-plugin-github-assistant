<?php

namespace Includes\api;


class Api
{
    function fetch_all_users()
    {
        $searchUsername = isset($_POST['user']) ? $_POST['user'] : '';

        if (!empty($searchUsername)) {

            if (!wp_verify_nonce($_POST['nonce'], 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N')) {
                die ('Hey, Stop!!!!');
            } else {
                $request = wp_remote_get("https://api.github.com/search/users?q=" . $searchUsername);
                if (is_wp_error($request)) {
                    return false;
                }
                $userData = json_decode(wp_remote_retrieve_body($request));
                wp_send_json_success($userData, 200);

                die();
            }

        }

    }

    //fetch single user information
    function fetch_user_information()
    {
        $searchUser = isset($_POST['user']) ? $_POST['user'] : '';

        if (!empty($searchUser)) {

            if (!wp_verify_nonce($_POST['nonce'], 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N')) {
                die ('Hey, Stop!!!!');
            } else {
                $request = wp_remote_get("https://api.github.com/users/" . $searchUser);
                if (is_wp_error($request)) {
                    return false;
                }
                $userData = json_decode(wp_remote_retrieve_body($request));
                wp_send_json_success($userData, 200);

                die();
            }
        }

    }

    //fetch user's repositories
    function fetch_user_repos()
    {
        $searchRepos = isset($_POST['user']) ? $_POST['user'] : '';

        if (!empty($searchRepos)) {

            if (!wp_verify_nonce($_POST['nonce'], 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N')) {
                die ('Hey, Stop!!!!');
            } else {
                $request = wp_remote_get("https://api.github.com/users/" . $searchRepos . "/repos");
                if (is_wp_error($request)) {
                    return false;
                }
                $repoData = json_decode(wp_remote_retrieve_body($request));
                wp_send_json_success($repoData, 200);

                die();
            }

        }
    }

    //fetch user's following list
    function fetch_user_following()
    {
        $searchFollowing = isset($_POST['user']) ? $_POST['user'] : '';

        if (!empty($searchFollowing)) {

            if (!wp_verify_nonce($_POST['nonce'], 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N')) {
                die ('Hey, Stop!!!!');
            } else {
                $request = wp_remote_get("https://api.github.com/users/" . $searchFollowing . "/following");
                if (is_wp_error($request)) {
                    return false;
                }
                $followingData = json_decode(wp_remote_retrieve_body($request));
                wp_send_json_success($followingData, 200);

                die();
            }

        }
    }


    //fetch user's follower list
    function fetch_user_follower()
    {
        $searchFollowers = isset($_POST['user']) ? $_POST['user'] : '';

        if (!empty($searchFollowers)) {

            if (!wp_verify_nonce($_POST['nonce'], 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N')) {
                die ('Hey, Stop!!!!');
            } else {
                $request = wp_remote_get("https://api.github.com/users/" . $searchFollowers . "/followers");
                if (is_wp_error($request)) {
                    return false;
                }
                $followersData = json_decode(wp_remote_retrieve_body($request));
                wp_send_json_success($followersData, 200); // send a JSON response back to an Ajax request

                die();
            }

        }
    }
}