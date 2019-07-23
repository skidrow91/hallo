import Vue from 'vue'
import Router from 'vue-router'
import Signup from '../views/Signup.vue'
import Login from '../views/Login.vue'
import Main from '../components/Main.vue'
import Board from '../views/Board.vue'
import List from '../components/List.vue'

Vue.use(Router)

const routes = [
  {path: '/signup',name: 'signup',component: Signup},
  {path: '/login',name: 'login',component: Login},
  {path: '/board',name: 'board',component: Board, meta: { requiresAuth: true }},
  {path: '/board/:boardId',name: 'board_detail',component: List, meta: { requiresAuth: true }},
  {path: '/',name: 'main',component: Main, meta: { redirectTo: '/board'}}
]

const router = new Router({
  routes: routes,
  mode: 'history'
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!localStorage.getItem('access_token')) {
      next({
        path: '/login',
        // query: { redirect: to.fullPath }
      })
    } else {
      next()
    }
  } else {
    if (to.matched.some(record => record.meta.redirectTo)) {
      if (localStorage.getItem('access_token')) {
        next({path: '/board'})
      }
      else {
        next() // make sure to always call next()!
      }
    }
    else {
      next() // make sure to always call next()!
    }
  }
})

export default router