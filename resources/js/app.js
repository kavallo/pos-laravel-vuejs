require('./bootstrap')
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import routes from './Router/routes'
import Master from './components/layouts/master'
import AppStorage from './Helpers/AppStorage'
import { Form, HasError, AlertError, AlertErrors, AlertSuccess } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)

window.AppStorage = AppStorage
window.Form = Form

Vue.use(VueRouter)
Vue.use(Vuex)

  
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    if(to.name == 'login') {
        if(AppStorage.get_token()) {
            axios.post(`/api/auth/user?token=${AppStorage.get_token()}`)
            .then(response => {
                next({ name: 'home' })
            })
            .catch(error => {
                next()
            })
        } else {
            next()
        }   
    } else {
        if(AppStorage.get_token()) {
            axios.post(`/api/auth/user?token=${AppStorage.get_token()}`)
            .then(response => {
                next()
            })
            .catch(error => {
                next({ name: 'login' })
            })
        } else {
            next({ name: 'login' })
        }
    }
})
  
const app = new Vue({
    render: h => h (Master),
    router
}).$mount('#app')