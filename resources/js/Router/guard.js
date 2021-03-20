import store from '../Helpers/vuexStore'

export function auth(to, from, next) {
    if(AppStorage.getToken()) {
        axios.post(`/api/auth/user?token=${AppStorage.getToken()}`)
        .then(response => {
            next()
        })
        .catch(error => {
            store.dispatch('logout')
            next({ name: 'login' })
        })
    } else {
        store.dispatch('logout')
        next({ name: 'login' })
    }
}

export function guest(to, from, next) {
    if(AppStorage.getToken()) {
        axios.post(`/api/auth/user?token=${AppStorage.getToken()}`)
        .then(response => {
            next({ name: 'home' })
        })
        .catch(error => {
            store.dispatch('logout')
            next()
        })
    } else {
        store.dispatch('logout')
        next()
    }
}