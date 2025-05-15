// import './bootstrap'
// import { createApp } from 'vue'
// import router from './router'
// import ProviderList from './Pages/Providers/ProviderList.vue'

// const app = createApp(ProviderList)
// app.use(router)
// app.mount('#app')


import './bootstrap'
import { createApp } from 'vue'
import router from './router'
import Layout from './Layouts/Layout.vue'

const app = createApp(Layout) // Layout do shfaqet gjithmonë dhe brenda ka router-view
app.use(router)
app.mount('#app')
