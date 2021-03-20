require('./bootstrap')
import Vue from 'vue'
import router from './Router/routeConfig'
import Master from './components/layouts/master'
import AppStorage from './Helpers/AppStorage'
import store from './Helpers/vuexStore'
import { Form, HasError, AlertError, AlertErrors, AlertSuccess } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)

window.AppStorage = AppStorage
window.Form = Form
  
const app = new Vue({
    render: h => h (Master),
    store,
    router
}).$mount('#app')