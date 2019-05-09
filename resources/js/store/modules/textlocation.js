const state = {
    textlocations: [],
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
    setWeekdays: (state, array) => {
        state.weekdays = array;
    },
    setTextHistory: (state, array) => {
        state.texthistory = array;
    }
};

const getTextData = commit => {
    api.get('texts/').then(({ data }) => {
        commit('setTextLocations', data)
    });
    api.get('texts/').then(({ data }) => {
        commit('setWeekdays', data)
    });
    api.get('texts/').then(({ data }) => {
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
