export function auth(to, from, next) {
    if(AppStorage.getToken()) {
        axios.post('/user')
        .then(response => {
            next()
        })
        .catch(error => {
            next({ name: 'login' })
        })
    } else {
        next({ name: 'login' })
    }
}

export function guest(to, from, next) {
    if(AppStorage.getToken()) {
        axios.post('/user')
        .then(response => {
            next({ name: 'home' })
        })
        .catch(error => {
            next()
        })
    } else {
        next()
    }
}