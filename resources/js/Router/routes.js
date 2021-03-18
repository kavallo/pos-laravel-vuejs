import Login from '../components/auth/login'
import Home from '../components/home'
import About from '../components/about'

const routes = [
    { path: '/login', component: Login, name: 'login' },
    { path: '/', component: Home, name: 'home' },
    { path: '/about', component: About, name: 'about' },
]

export default routes