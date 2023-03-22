import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '../components/Home.vue'
import RegistroPersonal from '../components/RegistroPersonal.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/registro',
      name: 'registro',
      component: RegistroPersonal
      
    },
  ]
})

export default router
