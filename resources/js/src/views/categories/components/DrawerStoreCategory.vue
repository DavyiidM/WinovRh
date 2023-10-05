<script setup lang="ts">
import {ref} from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import {Drawer} from  '@/components/ui/drawer'

const formData = ref({
    name:''
})

const emit = defineEmits(['submit'])
const submit = ()=> emit('submit', {...formData.value})

</script>

<template>
  <Drawer title="Cadastrar Categoria" btn-text="Nova Categoria">
    <form @submit.prevent="submit" class="space-y-4">
        <div class="space-y-2">
            <Label>Nome da Categoria</Label>
            <Input type="text" name="name" v-model="formData.name"/>
        </div>

        <Button class="w-full" type="submit">Cadastrar</Button>
    </form>
  </Drawer>
</template>