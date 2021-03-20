import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        auth: {
            check: false,
            user: false
        }
    },
    getters: {
        auth(state) {
            return state.auth
        }
    },
    mutations: {
        auth(state) {
            if(AppStorage.getToken()) {
                axios.post(`/api/auth/user?token=${AppStorage.getToken()}`)
                .then(response => {
                    state.auth.check = true
                    state.auth.user = response.data
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
        }
    },
    actions: {
        auth(context) {
            context.commit('auth')
        },
        logout(context) {
            context.commit('logout')
        }
    }
})

export default store