import HeaderComponent from "./components/HeaderComponent";
import VueRouter from 'vue-router';
import store from './store'
import './bootstrap'
import HomeComponent from "./components/HomeComponent";
import DishComponent from "./components/DishComponent";
import FavoriteComponent from "./components/FavoriteComponent";
import MapComponent from "./components/MapComponent";
import FooterComponent from "./components/FooterComponent";
import LoginComponent from "./auth/LoginComponent";
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().Fsplit('.')[0], files(key).default))

Vue.component('header-component', HeaderComponent);
Vue.component('footer-component', FooterComponent);


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: LoginComponent
        },
        {
            path: '/home',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/dish/:dishId',
            name: 'dish',
            component: DishComponent,
            props: true
        },
        {
            path: '/favorite',
            name: 'favorite',
            component: FavoriteComponent
        },
        {
            path: '/favorite/:dishId/add',
            name: 'favorite.add',
            component: DishComponent
        },
        {
            path: '/map',
            name: 'map',
            component: MapComponent
        },
    ]
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const app = async () => {
    await store.dispatch('auth/currentUser')

    new Vue({
    el: '#app',
    router,
    store
    })
};

app();