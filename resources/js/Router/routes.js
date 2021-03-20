import Login from '../components/auth/login'
import Home from '../components/home'
import About from '../components/about'
import NotFound from '../components/404'
import { auth, guest } from './guard'

const routes = [
    { path: '/login', component: Login, name: 'login', beforeEnter: (to, from, next) => guest(to, from, next), },
    { path: '/', component: Home, name: 'home', beforeEnter: (to, from, next) => auth(to, from, next) },
    { path: '/about', component: About, name: 'about', beforeEnter: (to, from, next) => auth(to, from, next) },

    // 404 route (fallback)
    { path: '/*', component: NotFound, name: '404' },
]

export default routes