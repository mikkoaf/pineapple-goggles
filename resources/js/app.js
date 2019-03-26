import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import {routes} from './routes';

Vue.use(VueRouter);
Vue.use(Vuex);

import MainApp from './components/App';


const router = new VueRouter({
    mode: 'history',
    router
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
