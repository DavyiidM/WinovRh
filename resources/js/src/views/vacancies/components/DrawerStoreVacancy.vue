<script setup lang="ts">
import {ref} from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import {Drawer} from  '@/components/ui/drawer'

const formData = ref({
    name: '',
    title: '',
    subtitle: '',
    description: '',
})

const emit = defineEmits(['submit'])
const submit = ()=> emit('submit', {...formData.value})
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

</script>

<template>
  <Drawer ref="drawerEl" title="Cadastrar Vagas" btn-text="Nova Vaga" @close="reset">
    <form @submit.prevent="submit" ref="formEl" class="space-y-4">
        <div class="space-y-2">
            <Label>Nome da Vaga</Label>
            <Input type="text" name="title" v-model="formData.title"/>
            <Label>Descrição da Vaga</Label>
            <Input type="text" name="description" v-model="formData.description"/>
            <Label>Subtitulo</Label>
            <Input type="text" name="subtitle" v-model="formData.subtitle"/>
            <Label>Data de expiração</Label>
            <Input type="text" name="expires_at" v-model="formData.expires_at"/>
        </div>
        <Button class="w-full" type="submit">Cadastrar</Button>
    </form>
  </Drawer>
</template>
