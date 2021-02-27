require('./bootstrap')
import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './Router/routes'
import admin_routes from './Router/admin_routes'

Vue.use(VueRouter)

  
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})


const admin_router = new VueRouter({
    mode: 'history',
    routes: admin_routes // short for `routes: routes`
})

  
const app = new Vue({
    router
}).$mount('#app')

const admin_app = new Vue({
    router: admin_router
}).$mount('#admin_app')