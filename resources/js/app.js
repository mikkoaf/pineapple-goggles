require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import MainApp from './components/MainApp.vue';
import {routes} from './routes';


Vue.use(VueRouter);
Vue.use(Vuex);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

window.addEventListener('load', function () {
    const app = new Vue({
        el: '#app',
        router,
        components: { MainApp }

    });
})



