<script setup lang="ts">
import {onMounted, ref} from 'vue'
import Header from '@/components/dashboard/Header.vue'
import {Button} from '@/components/ui/button'
import axios from '@/plugins/axios'

const categories = ref([])

onMounted(async ()=>{
  await axios.get('vacancies').then(response=>{
   categories.value = response.data.data
  })
})

const store = async (params) =>{
  await axios.post('vacancies', params)
  .then(response => vacancies.value.push(response.data.data))
  .catch(e=> alert('Xi... Deu ruim...'))
}

</script>
<template>
  <div class="">
    <Header title="Vagas">
      <template >
       <div class="">
        olá
       </div>
      </template>
    </Header>
  </div>
</template>