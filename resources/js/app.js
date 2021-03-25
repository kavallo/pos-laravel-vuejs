require('./bootstrap')
import Vue from 'vue'
import router from './Router/routeConfig'
import Master from './components/layouts/master'
import AppStorage from './Helpers/AppStorage'
import store from './Helpers/vuexStore'
import { Form, HasError, AlertError, AlertErrors, AlertSuccess } from 'vform'
import { serialize } from 'object-to-formdata';

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)

window.appUrl = 'http://pos.test';
window.AppStorage = AppStorage
window.Form = Form
window.serialize = serialize

// axios default configuration
axios.defaults.baseURL = `${appUrl}/api`
axios.defaults.headers.common['Authorization'] = `Bearer ${AppStorage.getToken()}`
  
const app = new Vue({
    render: h => h (Master),
    store,
    router
}).$mount('#app')