import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        auth: {
            check: false,
            user: false
        },
        spinnerClose: false
    },
    getters: {
        auth(state) {
            return state.auth
        },
        spinnerClose(state) {
            return state.spinnerClose
        }
    },
    mutations: {
        auth(state) {
            if(AppStorage.getToken()) {
                axios.post('/user')
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
        spinnerClose(state, status) {
            state.spinnerClose = status
        }
    },
    actions: {
        auth(context) {
            context.commit('auth')
        },
        logout(context) {
            context.commit('logout')
        },
        spinnerClose(context, status) {
            context.commit('spinnerClose', status)
        }
    }
})

export default store