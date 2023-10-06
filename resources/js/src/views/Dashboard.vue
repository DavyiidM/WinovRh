<script setup lang="ts">
import Overview from '@/components/dashboard/Overview.vue'
import DateRangePicker from '@/components/dashboard/DateRangePicker.vue'
import MainNav from '@/components/dashboard/MainNav.vue'
import RecentSales from '@/components/dashboard/RecentSales.vue'
import Search from '@/components/dashboard/Search.vue'
import TeamSwitcher from '@/components/dashboard/TeamSwitcher.vue'
import UserNav from '@/components/dashboard/UserNav.vue'
import {onMounted} from 'vue'
import axios from '@/plugins/axios'
import Header from '@/components/dashboard/Header.vue'

import { Button } from '@/components/ui/button'
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'

onMounted(async ()=>{

})

</script>

<template>
    <Header title="Dasboard">
        <template #options>

        </template>
    </Header>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        <Card>
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                <CardTitle class="text-sm font-medium">
                    Total de candidatos
                </CardTitle>
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        class="h-4 w-4 text-muted-foreground"
                >
                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                </svg>
            </CardHeader>
            <CardContent>
                <div class="text-2xl font-bold">
                    750
                </div>
                <p class="text-xs text-muted-foreground">
                    325 Candidatos no último mês
                </p>
            </CardContent>
        </Card>
        <Card>
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                <CardTitle class="text-sm font-medium">
                    Candidatos
                </CardTitle>
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        class="h-4 w-4 text-muted-foreground"
                >
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </CardHeader>
            <CardContent>
                <div class="text-2xl font-bold">
                    635 Inscritos
                </div>
                <p class="text-xs text-muted-foreground">
                    230 no último mês
                </p>
            </CardContent>
        </Card>
        <Card>
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                <CardTitle class="text-sm font-medium">
                    Vagas
                </CardTitle>
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        class="h-4 w-4 text-muted-foreground"
                >
                    <rect width="20" height="14" x="2" y="5" rx="2" />
                    <path d="M2 10h20" />
                </svg>
            </CardHeader>
            <CardContent>
                <div class="text-2xl font-bold">
                    8
                </div>
                <p class="text-xs text-muted-foreground">
                    3 na última semana
                </p>
            </CardContent>
        </Card>
        <Card>
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
                <CardTitle class="text-sm font-medium">
                    Ativas
                </CardTitle>
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        class="h-4 w-4 text-muted-foreground"
                >
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                </svg>
            </CardHeader>
            <CardContent>
                <div class="text-2xl font-bold">
                    1
                </div>
                <p class="text-xs text-muted-foreground">
                    Há 17h ativa
                </p>
            </CardContent>
        </Card>
    </div>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
        <Card class="col-span-4">
            <CardHeader>
                <CardTitle>Overview</CardTitle>
            </CardHeader>
            <CardContent class="pl-2">
                <Overview />
            </CardContent>
        </Card>
        <Card class="col-span-3">
            <CardHeader>
                <CardTitle>Vagas Recentes</CardTitle>
                <CardDescription>
                    Você Abriu 8 vagas no útimo mês.
                </CardDescription>
            </CardHeader>
            <CardContent>
                <RecentSales />
            </CardContent>
        </Card>
    </div>

</template>
