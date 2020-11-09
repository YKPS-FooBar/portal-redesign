import Vue from 'vue'
import App from './App.vue'
import './plugins/vuetify.js'
import './plugins/vuesax.js'
import 'vuesax/dist/vuesax.css'
import router from './router'
import './styles/main.css'
import "material-icons/iconfont/material-icons.css"

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
