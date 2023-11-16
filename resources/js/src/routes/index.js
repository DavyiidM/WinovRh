    import {createRouter, createWebHistory} from 'vue-router'

    import Layout from '@/layouts/DashboardLayout.vue'
    import Dashboard from "@/views/Dashboard.vue";
    import CategoryIndex from '@/views/categories/Index.vue'
    import VacancyIndex from '@/views/vacancies/Index.vue'
    import CandidatesIndex from '@/views/candidates/Index.vue'
    import CandidatesShow from '@/views/candidates/Show.vue'
    import Register from '@/views/vacancies/Register.vue';


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
                {
                    path:'vagas',
                    name: 'admin.vacancies.index',
                    component: VacancyIndex,
                },
                {
                    path: 'candidatos',
                    name: 'admin.candidates.index',
                    component:CandidatesIndex,
                
                },
                {
                    path: 'candidatos/:uuid',
                    name:'admin.candidates.show',
                    component: CandidatesShow,
                },
                {
                    path: '/admin/register',
                    name:'admin.vacancies.register',
                    component: Register,
                }
            ]
        },
    
    ];

    const router = createRouter({
        history: createWebHistory(),
        routes
    })

    export default router


