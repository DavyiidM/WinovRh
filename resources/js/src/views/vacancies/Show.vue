<!-- Show.vue -->

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useToast } from 'vue-toastification';
import { useRouter } from 'vue-router';
import { useVacancy } from '@/services/vacancies';

const router = useRouter();
const toast = useToast();
const { show: showService } = useVacancy();

const uuid = ref('');
const vacancy = ref(null);

onMounted(async () => {
  // Obtenha o uuid da rota
  uuid.value = router.currentRoute.value.params.uuid;

  // Tente obter os detalhes da vaga
  try {
    const result = await showService.show(uuid.value);
    vacancy.value = result.data; // ou algo semelhante, dependendo da estrutura de dados retornada pelo serviço
  } catch (error) {
    console.error('Erro ao buscar detalhes da vaga:', error);
    router.push({ name: 'admin.vacancies.index' });
    toast.error('Vaga não encontrada. Redirecionando para a lista de vagas.');
  }
});
</script>
