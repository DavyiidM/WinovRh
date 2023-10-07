<script setup lang="ts">
import {ref} from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import {Drawer} from  '@/components/ui/drawer'

const formData = ref({
    name: ''
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
  <Drawer ref="drawerEl" title="Cadastrar Categoria" btn-text="Nova Categoria" @close="reset">
    <form @submit.prevent="submit" ref="formEl" class="space-y-4">
        <div class="space-y-2">
            <Label>Nome da Categoria</Label>
            <Input type="text" name="name" v-model="formData.name"/>
        </div>

        <Button class="w-full" type="submit">Cadastrar</Button>
    </form>
  </Drawer>
</template>
