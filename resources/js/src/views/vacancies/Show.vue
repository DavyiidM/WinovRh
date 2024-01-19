<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useToast } from 'vue-toastification';
import { useRouter, useRoute } from 'vue-router';
import { useVacancy } from '@/services/vacancies';

const router = useRouter();
const route = useRoute();
const toast = useToast();
const { show } = useVacancy();

const uuid = ref('');
const vacancy = ref(null);

onMounted(async () => {

  uuid.value = route.params.uuid;
  console.log('UUID:', uuid.value);

  try {
    const result = await show(uuid.value);
    console.log('Resultado:', result);
    vacancy.value = result.data;
    console.log('Vaga:', vacancy.value);
  } catch (error) {
    console.error('Erro ao buscar detalhes da vaga:', error);
    router.push({ name: 'admin.vacancies.index' });

    toast.error('Vaga não encontrada. Redirecionando para a lista de vagas.');
  }
});
</script>
<template>
  <div>
    <h1>Detalhes da Vaga</h1>
    <div v-if="vacancy">
      <p><strong>Nome da Vaga:</strong> {{ vacancy.name }}</p>
      <p><strong>Descrição:</strong> {{ vacancy.description }}</p>
      <!-- Adicione mais campos conforme necessário -->
    </div>
  </div>
</template>