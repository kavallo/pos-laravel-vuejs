import { auth, guest } from './guard'
import Login from '../components/auth/login'
import AdminParent from '../components/layouts/admin_parent'
import Home from '../components/home'
import About from '../components/about'
import NotFound from '../components/404'

const routes = [
    {
        path: '/login',
        component: Login,
        name: 'login',
        beforeEnter: (to, from, next) => guest(to, from, next)
    },

    {
        path: '/',
        component: AdminParent,
        beforeEnter: (to, from, next) => auth(to, from, next),
        children: [
            {
                path: '',
                component: Home,
                name: 'home'
            },

            {
                path: 'about',
                component: About,
                name: 'about',
            },
        ]
    },

    // 404 route (fallback)
    { path: '/*', component: NotFound, name: '404' },
]

export default routes