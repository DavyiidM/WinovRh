<script setup lang="ts">
import { onMounted, ref } from 'vue';
import {useRoute} from 'vue-router';
import { useToast } from 'vue-toastification';
import { useVacancy } from '@/services/vacancies';
import axios from '@/plugins/axios.js'


const route = useRoute();
const toast = useToast();

const { show } = useVacancy();
const vacancy = ref({});

const htmlContent = ref<string>('');
onMounted(async () => {
  // Obtenha os detalhes da vaga ao iniciar a página
  await getVacancyDetails();
  console.log(route.params.id)
});

const getVacancyDetails = async () => {
  try {
    const response = await axios.get(`/recruiters/vacancies/${route.params.id}`);
    htmlContent.value = response.data.data.description;
    // console.log(response);
    vacancy.value = response.data.data; // Substitua isso com a estrutura real da resposta
  } catch (error) {
    console.error('Erro ao obter os detalhes da vaga', error);
  }
};



</script>

<template>
  <div class="show-container">
    <div class="mt-4 p-6">
      <h1 class="text-3xl font-bold mb-4">{{ vacancy.title }}</h1>
      <p class="text-base mb-4">{{ vacancy.subtitle }}</p>
    </div>
    <div v-html="htmlContent"></div>
  </div>
</template>

<style scoped>
.show-container {
  padding: 20px;
}
</style>