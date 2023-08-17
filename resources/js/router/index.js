import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'

/* Guest Component */
const Home = () => import('@/components/Home.vue')

const routes = [
    {
        name: "home",
        path: "/home",
        component: Home,
        meta: {
            middleware: "guest",
            title: `Home`
        }
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "home" })
        }
    }
})

export default router