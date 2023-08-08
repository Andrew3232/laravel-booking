import axios from 'axios'
import router from '@/routers'

const state = {
    authenticated: false,
    isAdmin: false,
    user: {}
};

const getters = {
    authenticated(state) {
        return state.authenticated
    },
    user(state) {
        return state.user
    },
    isAdmin(state) {
        return state.isAdmin
    }
};

const mutations = {
    setAuthenticated(state, value) {
        state.authenticated = value
    },
    setUser(state, value) {
        state.user = value
    },
    setAdmin(state, value) {
        state.isAdmin = value
    }
};

const actions = {
    login({commit}) {
        return axios.get('/api/user').then(({data}) => {
            commit('setUser', data)
            commit('setAuthenticated', true)
            commit('setAdmin', data.isAdmin)
            router.push({name: 'dashboard'})
        }).catch(({response: {data}}) => {
            commit('setUser', {})
            commit('setAuthenticated', false)
            commit('setAdmin', false)
        })
    },
    logout({commit}) {
        commit('setUser', {})
        commit('setAuthenticated', false)
        commit('setAdmin', false)
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
};

