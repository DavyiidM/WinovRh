<script setup lang="ts">
import { ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Drawer } from '@/components/ui/drawer'
//import CategoryInterface from  '@/services/categories/category.interface'
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'

const formData = ref({
  name: '',
  title: '',
  subtitle: '',
  description: '',
  category_id: ''
})

const emit = defineEmits(['submit'])

const submit = () => {
  const data = {
    ...formData.value,
    categoryId: formData.categoryId,
  };
  emit('submit', data);
  reset();
};


const drawerEl = ref(null)

const toggle = () => drawerEl.value.toggle()
const formEl = ref(null)

defineExpose({
  toggle
})

const reset = () => {
  formData.value.name = ''
  formEl.value.reset()
}

const props = defineProps({
  categories: {
    type: [Array, null],
    default: () => [],
  }
})

</script>

<template>
  <Drawer ref="drawerEl" title="Cadastrar Vagas" btn-text="Nova Vaga" @close="reset">
    <form @submit.prevent="submit" ref="formEl" class="space-y-4">

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
        <Label>Descrição da Vaga</Label>
        <Input type="text" name="description" v-model="formData.description" />

      </div>
     
      <Button class="w-full" type="submit">Cadastrar</Button>
    </form>
  </Drawer>
</template>
