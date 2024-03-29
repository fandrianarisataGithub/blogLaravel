/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import Swal from 'sweetalert2';
window.Swal = Swal;

Vue.use(VueRouter)

import Articles from './components/ArticlesComponent.vue';
import Home from './components/homeComponent.vue';
import ListeAlert from './components/ListeAlertComponent.vue';

const routes = [{
        path: "/articles",
        component: Articles
    },
    {
        path: "/",
        component: Home
    },
    {
        path: "/alerts",
        component: ListeAlert
    }
]

const router = new VueRouter({ routes });

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-component', require('./components/homeComponent.vue').default);
Vue.component('articles-component', require('./components/ArticlesComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('modal-add-article', require('./components/ModalAddArticleComponent.vue').default);
Vue.component('modal-edit-article', require('./components/ModalEditArticleComponent.vue').default);
Vue.component('alert-component', require('./components/ListeAlertComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router,

});