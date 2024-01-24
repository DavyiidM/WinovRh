<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import Header from '@/components/dashboard/Header.vue'
import VacancyService from '@/services/vacancies/store.service';
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'

import { useCategory } from '@/services/categories'
import { useToast } from 'vue-toastification'

import AppTextEditor from '@/components/ui/editor/AppTextEditor.vue';

import Editor from 'primevue/editor';


// const value = ref('');


const { formData, store } = VacancyService();

const { index: indexCategories } = useCategory()

const { categories, getCategories, perPage: perPageCategories } = indexCategories()

perPageCategories.value = 1000

const toast = useToast()

const reset = () => {
  formData.value.category_id = ''
  formData.value.title = ''
  formData.value.subtitle = ''
  formData.value.expires_at = ''
  formData.value.description = ''
}

const props = defineProps({
  categories: {
    type: [Array, null],
    default: () => [],
  }
})

const storeVacancy = async () => {
  try {
    await store()
    reset()
    toast.success('Vaga Cadastrada com Sucesso.')
  } catch (e) {
    console.log(e)
    toast.error('Opsss... Erro ao cadastrar esta Vaga')
  }
}

onMounted(async () => {
  await getCategories()
  console.log({ categories: categories.value })
})

</script>

<template>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

  <Header title="Cadastro de vagas">
  </Header>
  <div title="Cadastrar Vagas" btn-text="Nova Vaga">

    <form @submit.prevent="storeVacancy" class="space-y-4">

      <div class="space-y-2">
        <Label>Categoria da Vaga</Label>
        <Select v-model="formData.category_id">
          <SelectTrigger>
            <SelectValue placeholder="Selecione uma categoria" />
          </SelectTrigger>
          <SelectContent>
            <SelectItem v-for="category in categories" :value="category.id">
              {{ category.name }}
            </SelectItem>
          </SelectContent>
        </Select>

        <Label>Nome da Vaga</Label>
        <Input type="text" name="title" v-model="formData.title" />
        <Label>Subtitulo</Label>
        <Input type="text" name="subtitle" v-model="formData.subtitle" />
        <Label>Data de expiração</Label>
        <Input type="text" name="expires_at" v-model="formData.expires_at" />
        <Label>Description</Label>

        <!-- <AppTextEditor v-model="formData.description" :max-limit="10000" /> -->
        <div class="card">
          <Editor v-model="formData.description" editorStyle="height: 320px" :max-limit="10000" />

        </div>

        </div>

        <Button class="w-full" type="submit">Cadastrar</Button>
      </form>
    </div>
</template>