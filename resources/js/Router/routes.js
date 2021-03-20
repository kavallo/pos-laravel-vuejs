import Login from '../components/auth/login'
import Home from '../components/home'
import About from '../components/about'
import NotFound from '../components/404'

const routes = [
    { path: '/login', component: Login, name: 'login' },
    { path: '/', component: Home, name: 'home' },
    { path: '/about', component: About, name: 'about' },

    // 404 route (fallback)
    { path: '/*', component: NotFound, name: '404' },
]

export default routes