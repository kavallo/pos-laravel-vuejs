class AppStorage {
    storeToken(token) {
        localStorage.setItem('app_token', token)
    }

    getToken() {
        return localStorage.getItem('app_token')
    }

    removeToken() {
        localStorage.removeItem('app_token')
    }
}

export default AppStorage = new AppStorage