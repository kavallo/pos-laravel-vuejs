class AppStorage {
    constructor() {
        this.accessToken = 'pos_auth_user'
    }
    storeToken(token) {
        localStorage.setItem(this.accessToken, token)
        axios.defaults.headers.common['Authorization'] = `Bearer ${this.getToken()}`
    }

    getToken() {
        return localStorage.getItem(this.accessToken)
    }

    removeToken() {
        localStorage.removeItem(this.accessToken)
    }
}

export default AppStorage = new AppStorage