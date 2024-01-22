<template>
  <div class="show-container">
    <div class="mt-4 p-6">
      <h1 class="text-3xl font-bold mb-4">{{ vacancy.title }}</h1>
      <p class="text-base mb-4">{{ vacancy.subtitle }}</p>

      <!-- Outros detalhes da vaga, se necessário -->
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import { useToast } from 'vue-toastification';
import { useVacancy } from '@/services/vacancies';

const router = useRouter();
const toast = useToast();
const { show } = useVacancy();
const vacancy = ref({});

onMounted(async () => {
  // Obtenha os detalhes da vaga ao iniciar a página
  // await getVacancyDetails();
});

const getVacancyDetails = async () => {
  try {
    const response = await show(router.params.uuid);
    vacancy.value = response.data; // Substitua isso com a estrutura real da resposta
  } catch (error) {
    console.error('Erro ao obter os detalhes da vaga', error);
    // Lide com o erro de forma apropriada, por exemplo, redirecione para a página de erro
    router.push('/');
  }
};
</script>

<style scoped>
.show-container {
  padding: 20px;
}
</style>
