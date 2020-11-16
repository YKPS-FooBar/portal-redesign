import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Dashboard',
    component: () => import('../views/Dashboard.vue')
  },
  {
    path: '/links',
    name: 'Links',
    component: () => import('../views/Links.vue')
  },
  {
    path: '/clubs',
    name: 'Clubs',
    component: () => import('../views/Clubs.vue')
  }
]

const router = new VueRouter({
  routes,
  mode: 'history'
})

router.beforeEach((to, from, next) => {
  document.title = to.path === '/' ? 'YKPS Portal' : `${to.name} | YKPS Portal`
  next()
})

export default router
