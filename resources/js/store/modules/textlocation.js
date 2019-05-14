import {api} from '../../api';

const state = {
    textlocations: [],
    hours: [''],
    weekdays: [],
    texthistory: [],
    texts : [],
    locations: [],
    ready: false,
};

const getters = {
    allTextLocations: state => { return state.textlocations },
    allHours: state => { return  state.hours },
    allWeekdays: state => { return state.weekdays },
    allHistory: state => { return state.texthistory },
    allTexts: state => { return state.texts },
    allLocations: state => { return state.locations },
    getReady: state => { return state.ready }
};

const mutations = {
    setTextLocations: ( state, array) =>{
        state.textlocations = array;
    },
    setHours: (state, array) => {
        state.hours = array;
    },
    setWeekdays: (state, array) => {
        state.weekdays = array;
    },
    setTextHistory: (state, array) => {
        state.texthistory = array;
    },
    setTexts: (state, array) => {
        state.texts = array;
    },
    setLocations: (state, array) => {
        state.locations = array;
    },
    setReady: (state) => {
        state.ready = true;
    }
};

const getTextData = commit => {
    api.get('text-locations').then(({ data }) => {
        commit('setTextLocations', data)
    });
    api.get('hours').then(({ data }) => {
        commit('setHours', data)
    });
    api.get('weekdays').then(({ data }) => {
        commit('setWeekdays', data)
    });
    api.get('history').then(({ data }) => {
        commit('setTextHistory', data)
    });
    api.get('texts').then(({ data }) => {
        commit('setTexts', data)
    });
    api.get('locations').then(({ data }) => {
        commit('setLocations', data.data)
    });
    commit('setReady')

};

const actions = {
    init: ({state, commit}) => {
        getTextData(commit)
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
