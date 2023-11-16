<script setup lang="ts">
import { onMounted, ref } from 'vue'
import Header from '@/components/dashboard/Header.vue'
import DrawerStoreVacancy from './components/DrawerStoreVacancy.vue'
import { useVacancy } from '@/services/vacancies'
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
import { Switch } from '@/components/ui/switch'

import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogTrigger,
} from '@/components/ui/alert-dialog'

import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog'

import { useCategory } from '@/services/categories'


const { index: indexCategories } = useCategory()

const { categories, getCategories, perPage: perPageCategories } = indexCategories()

perPageCategories.value = 1000

const { index, store: storeService } = useVacancy()

const { vacancies, getVacancies, meta, currentPage, perPage, perPageOptions } = index()

const { store, formData, vacancy } = storeService()

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
  await getCategories()

  console.log({ categories: categories.value })
})

</script>
<template>
  <div class="">
    <Header title="Vagas">
      
      <template #options>
        <DrawerStoreVacancy :categories="categories" ref="drawerEl" @submit="storeVacancy" />
      </template>
    </Header>
    <div class="mt-4 grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-6 lg:col-span-4" v-for="c in vacancies" :key="c">
        <Card class="p-6">
          <div class="flex justify-between align-start">
            <CardTitle class="lg:text-lg text-sm">{{ c.title }}</CardTitle>
            <Switch class="" />
          </div>
          <CardDescription class="lg:text-lg text-sm">{{ c.subtitle }}</CardDescription>

          <AlertDialog>
            <AlertDialogTrigger>Visualizar a Vaga</AlertDialogTrigger>
            <AlertDialogContent>
              <AlertDialogHeader>
                <AlertDialogTitle>{{ c.title }} {{ c.subtitle }}</AlertDialogTitle>
                <AlertDialogTitle>{{ c.expires_at }}</AlertDialogTitle>
                <AlertDialogDescription>
                  <AlertDialogTitle>Requisitos</AlertDialogTitle>
                  {{ c.description }}
                </AlertDialogDescription>
              </AlertDialogHeader>
              <AlertDialogFooter>
                <Dialog>
                  <DialogTrigger>
                    <Button>Editar vaga</Button>
                  </DialogTrigger>
                  <DialogContent>
                    <DialogHeader>
                      <DialogTitle>Editar Vaga</DialogTitle>
                      <DialogDescription>
                        Faças aqui as devidas alterações e salve !!
                      </DialogDescription>
                    </DialogHeader>

                    <DialogFooter>
                      <Button>Salvar</Button>
                    </DialogFooter>
                  </DialogContent>
                </Dialog>
                <AlertDialogAction>Fechar</AlertDialogAction>
              </AlertDialogFooter>
            </AlertDialogContent>
          </AlertDialog>

        </Card>
        <Card> </Card>

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
