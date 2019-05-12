require('./bootstrap');
import 'es6-promise/auto'

import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';
import MainApp from './components/MainApp.vue';
import * as VueGoogleMaps from "vue2-google-maps";
import {routes} from './routes';
import Chart from './v-chart-plugin.js'

Vue.use(Chart);

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
  'textlog',
  require('./components/TextLog.vue').default 
);

Vue.component(
    'd3graph',
    require('./components/D3Graph.vue').default
);

Vue.use(VueRouter);

Vue.use(VueGoogleMaps, {
    load: {
      key: "REPLACE-THIS-WITH-YOUR-KEY-FROM-ABOVE",
      libraries: "places" // necessary for places input
    }
  });

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

window.addEventListener('load', function () {
    const app = new Vue({
        el: '#app',
        store,
        router,
        components: { MainApp }

    });
});

