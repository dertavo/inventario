import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '../components/Home.vue'
import RegistroPersonal from '../components/RegistroProducto.vue'
import Productos from '../components/Productos.vue'

import DetalleProducto from '../components/DetalleProducto.vue'

import ActualizarProducto from '../components/ActualizarProducto.vue'

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
    {
        path: '/productos',
        name: 'productos',
        component: Productos
        
      },
      {
        path: '/detalle-producto/:id',
        name: 'detalle-producto',
        component: DetalleProducto
        
      },
      {
        path: '/actualizar-producto/:id',
        name: 'actualizar-producto',
        component: ActualizarProducto
        
      },
  ]
})

export default router
