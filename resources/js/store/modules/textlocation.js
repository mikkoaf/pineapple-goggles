import {api} from '../../api';

const state = {
    textlocations: [],
    hours: [],
    weekdays: [],
    texthistory: [],
};

const getters = {
    allTextLocations: state => state.textlocations
};

const mutations = {
    setTextLocations: ( state, array) =>{
        state.textlocations = array;
        localStorage.setItem('textlog', array)
    },
    setHours: (state, array) => {
        state.hours = array;
    },
    setWeekdays: (state, array) => {
        state.weekdays = array;
    },
    setTextHistory: (state, array) => {
        state.texthistory = array;
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
    })

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
