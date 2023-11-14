<script setup lang="ts">
import { onMounted, ref } from 'vue'
import Header from '@/components/dashboard/Header.vue'
import DrawerStoreVacancy from './components/DrawerStoreVacancy.vue'
import { useCandidate } from '@/services/candidates'
import { Card, CardTitle, CardDescription } from "@/components/ui/card";
import { Pagination } from '@/components/ui/pagination'
import { Button } from '@/components/ui/button';

import {
  Select,
  SelectContent,

  SelectItem,

  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'

import { useToast } from 'vue-toastification'


const { index, store: storeService } = useCandidate()

const { candidates, getCandidates, meta, currentPage, perPage, perPageOptions } = index()

const toast = useToast()

const drawerEl = ref(null)


onMounted(async () => {
  await getCandidates()

})

</script>
<template>
  <div class="">
    <Header title="Candidatos">
      <template #options>
        
      </template>
    </Header>
    <div class="mt-4 grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-6 lg:col-span-4" v-for="c in candidates" :key="c">
        <Card class="p-6">
          <div class="flex justify-between align-start">
          <CardTitle class="lg:text-lg text-sm">
            <router-link :to="{name:'admin.candidates.show', params:{uuid:c.id}}">
            {{ c.name }}</router-link>
          </CardTitle>
          
        </div>
       
        </Card>
      </div>
    </div>

    <!--  Paginação completa  -->
    <div class="flex items-center justify-between">
      <div class="">
        <Select v-model="perPage">
          <SelectTrigger>
            <SelectValue placeholder="Selecione uma quantidade" />
          </SelectTrigger>
          <SelectContent>
            <SelectItem v-for="pPage in perPageOptions" :value="pPage">
              {{ pPage }} por página
            </SelectItem>
          </SelectContent>
        </Select>
      </div>
      <div class="py-4">
        <Pagination v-if="meta" :page="meta.current_page" :items-per-page="perPage" :total="meta.total"
          @updatePage="pg => currentPage = pg" />
      </div>
    </div>
  </div>
</template>
