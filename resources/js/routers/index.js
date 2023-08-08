import {createWebHistory, createRouter} from 'vue-router'
import store from '@/store'

/* Guest Component */
const Login = () => import('@/components/auth/Login.vue')
const Register = () => import('@/components/auth/Register.vue')
/* Guest Component */

/* Admin Component */
const Admin = () => import('@/components/admin/Admin.vue')
/* Admin Component */

/* Layouts */
const DashboardLayout = () => import('@/components/layouts/Default.vue')
/* Layouts */

/* Authenticated Component */
const Dashboard = () => import('@/components/Dashboard.vue')
/* Authenticated Component */

const routes = [
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            title: `Login`
        }
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            title: `Register`
        }
    },
    {
        name: "dashboard",
        path: "/",
        component: Dashboard,
        meta: {
            middlewareAuth: true,
            title: 'Dashboard'
        },
    },
    {
        name: "admin",
        path: "/admin",
        component: Admin,
        meta: {
            middlewareAuth: true,
            admin: true,
            title: 'Admin'
        },
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.matched.some((record) => record.meta.middlewareAuth)) {
        if (!store.state.auth.authenticated) {
            next({name: "login"})
        }
    }

    if (to.matched.some((record) => record.meta.admin)) {
        if (!store.state.auth.isAdmin) {
            store.dispatch('auth/logout');
            next({name: "login"})
        }
    }

    next();
})

export default router
