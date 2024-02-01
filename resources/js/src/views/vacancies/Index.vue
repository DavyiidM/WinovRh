<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import Header from '@/components/dashboard/Header.vue'
import { useVacancy } from '@/services/vacancies'
import { Card, CardTitle, CardDescription } from "@/components/ui/card";
import { Pagination } from '@/components/ui/pagination'
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import { useToast } from 'vue-toastification'
import { Switch } from '@/components/ui/switch'
import { useCategory } from '@/services/categories'
import axios from '@/plugins/axios.js'



const { index: indexCategories } = useCategory()
const { categories, getCategories, perPage: perPageCategories } = indexCategories()
perPageCategories.value = 1000

const { index, store: storeService } = useVacancy()
const { vacancies, getVacancies, meta, currentPage, perPage, perPageOptions } = index()
const { store, formData, vacancy } = storeService()

const toast = useToast()
const router = useRouter()

const showDetails = ref(false)
const selectedVacancy = ref({})

const storeVacancy = async (params) => {
  router.push('/admin/register')
}

onMounted(async () => {
  await getVacancies()
  await getCategories()
  console.log({ vacancies })
})


const handleChange = async (status, vacancyId) => {
  try {
    await axios.post(`vacancies/${vacancyId}/update-status`, { status });

    if (status) {
      toast.success('Esta vaga foi ativada com sucesso');
    } else {
      toast.success('Esta vaga foi desativada com sucesso');
    }

    // Handle the response from the backend if needed
    // ...
  } catch (error) {
    console.error(error);

    if (status) {
      toast.error('Erro ao ativar a vaga');
    } else {
      toast.error('Erro ao desativar a vaga');
    }

    // Handle the error if needed
    // ...
  }
};

</script>

<template>
  <div class="details-container">
    <div>
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
              <Switch :checked="c.status" @update:checked="($events) => handleChange($events, c.id)" />
            </div>
            <CardDescription class="lg:text-lg text-sm">{{ c.subtitle }}</CardDescription>
            <router-link :to="{ name: 'admin.vacancies.show', params: { id: c.id } }">
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
  overflow-y: auto;
}

.details-container {
  padding: 20px;
}
</style>
