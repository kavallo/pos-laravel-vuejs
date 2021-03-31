import { auth, guest } from './guard'
import AuthParent from '../components/auth/auth_parent'
import Login from '../components/auth/login'
import ForgottenPassword from '../components/auth/forgotten_password'
import ResetPassword from '../components/auth/reset_password'
import AdminParent from '../components/layouts/admin_parent'
import Home from '../components/home'
import Profile from '../components/profile'
import NotFound from '../components/404'
// cateogry
import CreateCategory from '../components/category/create_category'
import CategoryList from '../components/category/category_list'

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
                path: 'reset-password/:token',
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
                path: 'profile',
                component: Profile,
                name: 'profile',
            },

            {
                path: 'categories/create',
                component: CreateCategory,
                name: 'category.create',
                meta: { groupName: 'category' },
            },

            {
                path: 'categories',
                component: CategoryList,
                name: 'category.index',
                meta: { groupName: 'category' },
            },

        ]
    },

    // 404 route (fallback)
    { path: '/*', component: NotFound, name: '404' },
]

export default routes