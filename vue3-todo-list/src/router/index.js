import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '../stores/auth'

import Home from '../components/main/Home.vue'
import Register from '../components/auth/Register.vue'
import Login from '../components/auth/Login.vue'
import About from '../components/main/About.vue'
import FotgotPassword from '../components/auth/ForgotPassword.vue'
import ResetPassword from '../components/auth/ResetPassword.vue'
import Tasks from '../components/todos/Tasks.vue'
import TaskEdit from '../components/todos/TaskEdit.vue'
import E404 from '../components/main/E404.vue'

const routes = [
    { name: 'home', path: '/', component: Home },
    { name: 'register', path: '/register', component: Register },
    { name: 'login', path: '/login', component: Login },
    { name: 'about', path: '/about', component: About },

    { name: 'forgot-password', path: '/forgot-password', component: FotgotPassword },
    { name: 'reset-password', path: '/password-reset/:token', component: ResetPassword },
    {
        name: 'tasks', path: '/:user/tasks', component: Tasks,
        beforeEnter: (to, from, next) => {
            const authStore = useAuthStore()
            if (authStore.user) {
                next()
            } else {
                next('/login')
            }
        }
    },

    {
        name: 'task-edit', path: '/:user/tasks/:task', component: TaskEdit,
    },

    { path: '/:any(.*)', component: E404 },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;