<template>
  <div class="flex flex-col min-h-screen">
    <Header />
    <div class="flex-1 overflow-y-auto p-20">
      <!-- Conteúdo da sua página ShowCard aqui -->
      <h1 class="text-5xl font-bold mb-4">{{ $route.params.title }}</h1>
      <p class="text mb-2">{{ $route.params.name }}</p>
      <p class="text-base mb-4">{{ $route.params.description }}</p>
      <!-- Outros detalhes da vaga, se necessário -->
    </div>
    <div class="flex justify-center">
      <button @click="subscribe"
        class="w-full sm:w-auto mt-4 mb-4 subscribe-button text-white px-4 py-2 rounded-md hover:bg-blue-400 focus:outline-none focus:border-blue-300">
        Inscrever-se
      </button>
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from '@/views/candidature/header/Header.vue';
import Footer from '@/views/candidature/footer/Footer.vue';

export default {
  components: {
    Header,
    Footer,
  },
  methods: {
    subscribe() {
      // Lógica de inscrição aqui
      // sessionStorage.setItem("vacancy_id", $route.params.id);
      console.log('Inscrição realizada!');
      // Redirecionar para a página de inscrição
      this.$router.push({ name: 'subscribe.index' });
    },
  },
  // ...
}
</script>

<style scoped>
.subscribe-button {
  background-color: #6BBA05;
  color: #ffffff;
  cursor: pointer;
  transition: background-color 0.3s;
}

.subscribe-button:hover {
  background-color: #92D322;
}
</style>
