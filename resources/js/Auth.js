import axios from "axios"

class Auth {
    check() {
        let token = this.get_token()
        if (token !== null) {
            axios.post(`/api/auth/user?token=${token}`)
            .then(response => {
                return response.data
            })
            .catch(error => {
                return false
            })
        } else {
            return false
        }
    }

    store_token(token) {
        localStorage.setItem('app_token', token)
    }

    get_token() {
        localStorage.getItem('app_token')
    }

    remove_token() {
        localStorage.removeItem('app_token')
    }
}

export default Auth = new Auth