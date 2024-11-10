import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Nosotros from '@/views/Nosotros.vue'
import Carrito from '@/views/Carrito.vue'
import Contacto from '@/views/Contacto.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/index.html',
      redirect: '/' // Redirecciona a la ruta principal '/'
    },
    {
      path: '/nosotros',
      name: 'Nosotros',
      component: Nosotros
    },
    {
      path: '/carrito',
      name: 'Carrito',
      component: Carrito
    },
    {
      path: '/contacto',
      name: 'Contacto',
      component: Contacto
    }
  ]
})

export default router
