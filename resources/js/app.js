require('./bootstrap')
import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './Router/routes'
import Master from './components/layouts/master'

Vue.use(VueRouter)

  
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})
  
const app = new Vue({
    render: h => h (Master),
    router
}).$mount('#app')