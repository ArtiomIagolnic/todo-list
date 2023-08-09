import { createApp, markRaw } from 'vue'
import { createPinia } from 'pinia'
import router from './router'

import '@fortawesome/fontawesome-free/css/all.css';
import '@mdi/font/css/materialdesignicons.css'
import './index.css'
import './axios'
import './style.css'

import App from './App.vue'

const pinia = createPinia();

pinia.use(({ store }) => {
    store.router = markRaw(router)
})

const app = createApp(App);
app.use(pinia)
app.use(router)

app.mount('#app')
