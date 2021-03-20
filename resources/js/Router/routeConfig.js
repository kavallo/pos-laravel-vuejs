import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import store from '../Helpers/vuexStore'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    if(to.name == 'login') {
        axios.post(`/api/auth/user?token=${AppStorage.getToken()}`)
        .then(response => {
            next({ name: 'home' })
        })
        .catch(error => {
            store.dispatch('logout')
            next()
        })  
    } else {
        axios.post(`/api/auth/user?token=${AppStorage.getToken()}`)
        .then(response => {
            next()
        })
        .catch(error => {
            store.dispatch('logout')
            next({ name: 'login' })
        }) 
    }
})

export default router