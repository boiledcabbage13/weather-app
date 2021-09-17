const initialState = {
    location: null,
    locations: []
};

export const state = {
    ...initialState
}

export const mutations = {
    setLocation: (state, payload) => {
        state.location = payload
    },
    setLocations: (state, payload) => {
        state.locations = payload
    }
}

export const actions = {}

export const getters = {
    location: state => state.location,
    locations: state => state.locations
}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}