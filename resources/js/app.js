require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import Vuex from 'vuex';
//import {routes} from './routes';

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VueAxios, axios);

import MainApp from './components/App';
Vue.component('main-app', require('./components/MainApp.vue'));

const router = new VueRouter({
    mode: 'history',
    router
});
const app = new Vue(Vue.util.extend({ router })).$mount('#app');
/*
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
*/
