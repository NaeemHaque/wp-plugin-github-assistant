import Vue from 'vue'
import App from './App.vue'
import router from "./router";
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import axios from 'axios'
import moment from 'moment'

Vue.use(ElementUI);

Vue.config.productionTip = false

new Vue({
    router,
    axios,
    moment,
    render: h => h(App)
}).$mount('#app')
