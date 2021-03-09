import Home from '../components/home'
import Login from '../components/auth/login'
import Register from '../components/auth/register'

const routes = [
    { path: '/', component: Home, name: 'home' },
    { path: '/login', component: Login, name: 'login' },
    { path: '/register', component: Register, name: 'register' }
]

export default routes