import Home from '../components/home'
import Login from '../components/auth/login'

const routes = [
    { path: '/', component: Home, name: 'home' },
    { path: '/login', component: Login, name: 'login' },
]

export default routes