<script setup lang="ts">
import {onMounted, ref} from 'vue'
import Header from '@/components/dashboard/Header.vue'
import {Button} from '@/components/ui/button'
import DrawerStoreCategory from './components/DrawerStoreCategory.vue'
import axios from '@/plugins/axios'

const categories = ref([])

onMounted(async ()=>{
  await axios.get('recruiters/categories').then(response=>{
   categories.value = response.data.data
  })
})

const store = async (params) =>{
  await axios.post('recruiters/categories', params)
  .then(response => categories.value.push(response.data.data))
  .catch(e=> alert('Xi... Deu ruim...'))
}

</script>
<template>
  <div class="">
    <Header title="Categorias">
      <template #options>
        <DrawerStoreCategory @submit="store"/>
      </template>
    </Header>

    <ul>
      <li class="" v-for="category in categories" :key="category.id">{{ category.name }}</li>
    </ul>
  </div>
</template>