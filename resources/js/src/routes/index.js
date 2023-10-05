import {createRouter, createWebHistory} from 'vue-router'

import Layout from '@/layouts/DashboardLayout.vue'
import Dashboard from "@/views/Dashboard.vue";
import CategoryIndex from '@/views/categories/Index.vue'


const routes = [
    {
        path:'/admin',
        component: Layout,
        children:[
            {
                path:'',
                name:'admin.index',
                component: Dashboard,
            },

            {
                path:'categorias',
                name: 'admin.categories.index',
                component: CategoryIndex,
            },
        ]
    },
   
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router


