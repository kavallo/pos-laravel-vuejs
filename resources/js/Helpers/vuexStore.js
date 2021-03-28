import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        auth: {
            check: false,
            user: false
        },
        spinner: false
    },
    getters: {
        auth(state) {
            return state.auth
        },
        spinner(state) {
            return state.spinner
        }
    },
    mutations: {
        auth(state) {
            if(AppStorage.getToken()) {
                axios.post('/admin')
                .then(response => {
                    state.auth.check = true
                    state.auth.user = response.data.data
                })
                .catch(error => {
                    state.auth.check = false
                    state.auth.user = false
                })
            } else {
                state.auth.check = false
                state.auth.user = false
            }
        },
        logout(state) {
            AppStorage.removeToken()
            state.auth.check = false
            state.auth.user = false
        },
        spinner(state, status) {
            state.spinner = status
        }
    },
    actions: {
        auth(context) {
            context.commit('auth')
        },
        logout(context) {
            context.commit('logout')
        },
        spinner(context, status) {
            context.commit('spinner', status)
        }
    }
})

export default store