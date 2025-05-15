import { createRouter, createWebHistory } from 'vue-router'
import ProviderList from './Pages/Providers/ProviderList.vue'
import ProviderProfile from './Pages/Providers/ProviderProfile.vue'

const routes = [
  { path: '/', name: 'home', component: ProviderList },
  { path: '/providers/:id', name: 'provider-profile', component: ProviderProfile },
  { path: '/not-found', name: 'not-found', component: { template: '<h2>Page Not Found</h2>' } },
  { path: '/:pathMatch(.*)*', redirect: '/not-found' }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
