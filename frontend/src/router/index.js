import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/about',
            name: 'about',
            component: () => import('../views/AboutView.vue')
        },
        {
            path: '/products',
            name: 'products',
            component: () => import('../views/ProductsView.vue')
        },
        {
            path: '/user/create',
            name: 'user-create',
            component: () => import('../views/UserCreateView.vue')
        },
        {
            path: '/user/list',
            name: 'user-list',
            component: () => import('../views/UserListView.vue')
        }
    ]
});

export default router;
