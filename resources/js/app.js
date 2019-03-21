/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import routes from './routes';
Vue.use(VueRouter)


import PortalVue from 'portal-vue';
Vue.use(PortalVue);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('team-list', require('./components/TeamList.vue').default);
Vue.component('team-details', require('./components/TeamDetails.vue').default);
Vue.component('player-list', require('./components/PlayerList.vue').default);
Vue.component('add-player-form', require('./components/AddPlayerForm.vue').default);
Vue.component('edit-player-form', require('./components/EditPlayerForm.vue').default);
Vue.component('player', require('./components/player.vue').default);
Vue.component('loading', require('./components/Loading.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
});
