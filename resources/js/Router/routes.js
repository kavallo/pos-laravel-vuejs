import { auth, guest } from './guard'
import AuthParent from '../components/auth/auth_parent'
import Login from '../components/auth/login'
import ForgottenPassword from '../components/auth/forgotten_password'
import ResetPassword from '../components/auth/reset_password'
import AdminParent from '../components/layouts/admin_parent'
import Home from '../components/home'
import About from '../components/about'
import NotFound from '../components/404'

const routes = [
    // auth routes
    {
        path: '/auth',
        component: AuthParent,
        redirect: { name: 'login' },
        beforeEnter: (to, from, next) => guest(to, from, next),

        children: [
            {
                path: 'login',
                component: Login,
                name: 'login',
            },
        
            {
                path: 'forgotten-password',
                component: ForgottenPassword,
                name: 'forgotten.password',
            },
        
            {
                path: 'reset-password/:user_id/:verification_code?',
                component: ResetPassword,
                name: 'reset.password',
            },
        ]
    },

    // admin routes
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