import './bootstrap'
import { createApp } from 'vue'
import router from './router'
import Layout from './Layouts/Layout.vue'
import 'vue-select/dist/vue-select.css';

const app = createApp(Layout) // Layout do shfaqet gjithmonë dhe brenda ka router-view
app.use(router)
app.mount('#app')
