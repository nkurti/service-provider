import './bootstrap'
import '../css/app.css';
import { createApp } from 'vue'
import router from './router'
import Layout from './Layouts/Layout.vue'

const app = createApp(Layout)
app.use(router)
app.mount('#app')
