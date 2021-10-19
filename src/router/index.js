import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../component/Home'
import Profile from '../views/users/Profile'

import Followers from "../views/users/partial/Follower";
import Following from "../views/users/partial/Following"
import Repositories from "../views/users/partial/Repositories"

Vue.use(VueRouter)


const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/profile/:login',
        name: 'Profile',
        component: Profile,
        props: true
    },
    {
        path: '/profile/:login/repos',
        name: 'Repositories',
        component: Repositories,
        props: true
    },
    {
        path: '/profile/:login/followers',
        name: 'Followers',
        component: Followers,
        props: true
    },
    {
        path: '/profile/:login/following',
        name: 'Following',
        component: Following,
        props: true
    }
]

const router = new VueRouter({
    base: process.env.BASE_URL,
    routes
})

export default router