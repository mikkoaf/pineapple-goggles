require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
//import VueLoader from 'vue-loader';
import Vuex from 'vuex';
import MainApp from './components/MainApp.vue';
import * as VueGoogleMaps from "vue2-google-maps";
import {routes} from './routes';

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
/*
Vue.component(
  'dataloader',
  require('.components/DataLoader.vue').default
);
*/
Vue.use(VueRouter);
Vue.use(Vuex);
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
        router,
        components: { MainApp }

    });
})

