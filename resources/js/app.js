import './bootstrap';
import {createApp} from 'vue'
import App from './App.vue'


import router from './router'

const SERVER_URL="http://localhost/inventario/public/api";
const app = createApp(App)
app.use(router)
app.config.globalProperties.$SERVER_URL = SERVER_URL;
app.mount('#app')
