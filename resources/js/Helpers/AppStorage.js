class AppStorage {
    store_token(token) {
        localStorage.setItem('app_token', token)
    }

    get_token() {
        return localStorage.getItem('app_token')
    }

    remove_token() {
        localStorage.removeItem('app_token')
    }
}

export default AppStorage = new AppStorage