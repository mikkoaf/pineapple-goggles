import Vue from 'vue'
import Vuex from 'vuex'
import textlocation from './modules/textlocation'


Vue.use(Vuex);

const store = new Vuex.Store({
    strict: process.env.NODE_ENV !== 'production',
    modules: {
        textlocation,
    }
});

export default store

