<script setup lang="ts">
import {onMounted, ref} from 'vue'
import Header from '@/components/dashboard/Header.vue'
import DrawerStoreVacancy from './components/DrawerStoreVacancy.vue'
import {useVacancy} from '@/services/vacancies'
import {Card, CardTitle, CardDescription} from "@/components/ui/card";
import {Pagination} from '@/components/ui/pagination'

import {
  Select,
  SelectContent,

  SelectItem,

  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'

import {useToast} from 'vue-toastification'

const {index, store: storeService} = useVacancy()

const {vacancies, getVacancies, meta, currentPage, perPage, perPageOptions} = index()

const {store, formData, vacancy} = storeService()

const toast = useToast()

const drawerEl = ref(null)

const storeVacancy = async (params) => {
  try {
    formData.value.title = params.title
    formData.value.subtitle = params.subtitle
    formData.value.description = params.description
    formData.value.expires_at = params.expires_at
    await store()
    vacancies.value.push(vacancy.value)
    vacancy.value = null
    drawerEl.value.toggle()
    toast.success('Vaga Cadastrada com Sucesso.')
  } catch (e) {
    toast.error('Opsss... Erro ao cadastrar esta Vaga')
  }
}

onMounted(async () => {
  await getVacancies()
})

</script>
<template>
  <div class="">
    <Header title="Vagas">
      <template #options>
        <DrawerStoreVacancy ref="drawerEl" @submit="storeVacancy"/>
      </template>
    </Header>
    <div class="mt-4 grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-6 lg:col-span-4" v-for="c in vacancies" :key="c">
        <Card class="p-6">
          <CardTitle class="lg:text-lg text-sm">{{ c.title }}</CardTitle>
          <CardDescription class="lg:text-lg text-sm">{{ c.subtitle }}</CardDescription>
        </Card>
      </div>
    </div>

    <!--  Paginação completa  -->
    <div class="flex items-center justify-between">
      <div class="">
        <Select v-model="perPage">
          <SelectTrigger >
            <SelectValue placeholder="Selecione uma quantidade" />
          </SelectTrigger>
          <SelectContent>
            <SelectItem v-for="pPage in perPageOptions" :value="pPage">
              {{pPage}} por página
            </SelectItem>
          </SelectContent>
        </Select>
      </div>
      <div class="py-4">
        <Pagination
            v-if="meta"
            :page="meta.current_page"
            :items-per-page="perPage"
            :total="meta.total"
            @updatePage="pg=>currentPage = pg"
        />
      </div>
    </div>
  </div>
</template>
