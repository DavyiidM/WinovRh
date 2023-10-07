<script setup lang="ts">
import {onMounted, ref} from 'vue'
import Header from '@/components/dashboard/Header.vue'
import DrawerStoreCategory from './components/DrawerStoreCategory.vue'
import {useCategory} from '@/services/categories'
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

const {index, store: storeService} = useCategory()

const {categories, getCategories, meta, currentPage, perPage, perPageOptions} = index()

const {store, formData, category} = storeService()

const toast = useToast()

const drawerEl = ref(null)

const storeCategory = async (params) => {
  try {
    formData.value.name = params.name
    await store()
    categories.value.push(category.value)
    category.value = null
    drawerEl.value.toggle()
    toast.success('Categoria Cadastrada com Sucesso.')
  } catch (e) {
    toast.error('Opsss... Erro ao cadastrar esta categoria')
  }
}

onMounted(async () => {
  await getCategories()
})

</script>
<template>
  <div class="">
    <Header title="Categorias">
      <template #options>
        <DrawerStoreCategory ref="drawerEl" @submit="storeCategory"/>
      </template>
    </Header>
    <div class="mt-4 grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-6 lg:col-span-4" v-for="c in categories" :key="c">
        <Card class="p-6">
          <CardTitle class="lg:text-lg text-sm">{{ c.name }}</CardTitle>
          <CardDescription v-if="c.vacancies_count">{{ c.vacancies_count }} vagas ativas</CardDescription>
          <CardDescription v-else>Nenhuma vaga ativa atrelada</CardDescription>
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
