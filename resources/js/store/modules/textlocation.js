const state = {
    textlocations: []
};

const getters = {
    allTextLocations: state => state.textlocations
};

const mutations = {
    setTextLocations( state, array) {
        state.textlocations = array;
        localStorage.setItem('textlog', array)
    }
};

const actions = {};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
