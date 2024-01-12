<script setup lang="ts">
import { onMounted, ref } from 'vue'
import Header from '@/components/dashboard/Header.vue'
import { useVacancy } from '@/services/vacancies'
import { Card, CardTitle, CardDescription } from "@/components/ui/card";
import { Pagination } from '@/components/ui/pagination'
import { Button } from '@/components/ui/button';

import { Dialog, DialogContent, DialogTitle, DialogFooter, } from "@/components/ui/dialog";
import {
  Select,
  SelectContent,

  SelectItem,

  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'

import { useToast } from 'vue-toastification'
import { Switch } from '@/components/ui/switch'

import { useCategory } from '@/services/categories'


const { index: indexCategories } = useCategory()

const { categories, getCategories, perPage: perPageCategories } = indexCategories()

perPageCategories.value = 1000

const { index, store: storeService } = useVacancy()

const { vacancies, getVacancies, meta, currentPage, perPage, perPageOptions } = index()

const { store, formData, vacancy } = storeService()

const toast = useToast()

const drawerEl = ref(null)
const showDetails = ref(false);
const selectedVacancy = ref({});

const storeVacancy = async (params) => {
  window.location.href = '/admin/register';
};

const viewDetails = (vacancy) => {
  console.log('Detalhes da Vaga:', vacancy);
  // Implemente a lógica para exibir os detalhes conforme necessário.
  selectedVacancy.value = vacancy;
  showDetails.value = true;
};

onMounted(async () => {
  await getVacancies()
  await getCategories()

  console.log({ categories: categories.value })
})

</script>
<template>
  <div class="details-container">
    <div class="">
      <Header title="Vagas">
        <template #options>
          <Button class="w-full" @click="storeVacancy">Adicionar nova vaga</Button>
        </template>
      </Header>
      <div class="mt-4 grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 lg:col-span-4" v-for="c in vacancies" :key="c.id">
          <Card class="p-6">
            <div class="flex justify-between align-start">
              <CardTitle class="lg:text-lg text-sm">{{ c.title }}</CardTitle>
              <Switch class="" />
            </div>
            <CardDescription class="lg:text-lg text-sm">{{ c.subtitle }}</CardDescription>

            <!-- Adicione a lógica para exibir detalhes aqui -->
            <router-link :to="{ name: 'admin.vacancies.show', params: { uuid: c.uuid } }"
              class="text-blue-500 cursor-pointer">
              Visualizar a Vaga
            </router-link>
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
  </div>
</template>

<style scoped>
.details-popup {
  max-height: 80vh;
  /* Define a altura máxima para 80% da altura da viewport */
  overflow-y: auto;
  /* Adiciona uma barra de rolagem vertical se o conteúdo ultrapassar a altura máxima */
}

.details-container {
  padding: 20px;
  /* Adiciona algum espaço em volta do conteúdo para evitar que ele fique muito próximo às bordas */
}
</style>
