import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  { path: '/', name: 'home', component: () => import('@/Pages/Providers/ProviderList.vue') },
  { path: '/providers/:id', name: 'provider-profile', component: () => import('@/Pages/Providers/ProviderProfile.vue') },
  { path: '/not-found', name: 'not-found', component: { template: '<h2>Page Not Found</h2>' } },
  { path: '/:pathMatch(.*)*', redirect: '/not-found' }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
