<script setup lang="ts">
import {onMounted, ref} from 'vue'
import Header from '@/components/dashboard/Header.vue'
import DrawerStoreCategory from './components/DrawerStoreCategory.vue'
import {useCategory} from '@/services/categories'

const {index, store: storeService} = useCategory()

const {categories, getCategories} = index()

const {store, formData, category} = storeService()

const storeCategory = async (params) => {
  try{
    formData.value.name = params.name
    await store()

    categories.value.push(category.value)
    category.value = null
    // notificação...
    // fechar o drawer de cadastro.
  }catch(e){
    console.log('Xi... Deu ruim...')
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
        <DrawerStoreCategory @submit="storeCategory"/>
      </template>
    </Header>

    <ul>
      <li class="" v-for="category in categories" :key="category.id">{{ category.name }}</li>
    </ul>
  </div>
</template>
