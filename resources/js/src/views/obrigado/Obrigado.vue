<template>
    <div class="h-screen flex flex-col items-center justify-center bg-cover bg-center" style="background-image: url('https://winov.com.br/wp-content/uploads/2023/08/Blog.png')">
      <!-- Header -->
      <Header />
  
      <!-- Conteúdo da Página -->
      <div class="bg-white p-8 rounded-md shadow-md mt-20 mb-20 max-w-md">
        <h2 class="text-3xl font-bold mb-6">Obrigado!</h2>
        <p class="text-lg mb-4">Agradecemos por sua inscrição.</p>
  
        <!-- Botões de Navegação -->
        <div class="flex justify-center space-x-4">
          <button @click="returnToSite" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-400 focus:outline-none focus:border-blue-300">
            Retornar ao Site
          </button>
          <button @click="returnToVagas" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-400 focus:outline-none focus:border-blue-300">
            Ver Vagas
          </button>
        </div>
      </div>
    </div>
  
      <!-- Footer -->
      <Footer />
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
      returnToSite() {
        // Lógica para retornar ao site principal
        console.log('Retornar ao site principal');
      },
      returnToVagas() {
        // Lógica para retornar à página de vagas
        console.log('Retornar à página de vagas');
      },
    },
  };
  </script>
  
  <style scoped>
  .bg-cover {
    background-size: cover;
  }
  .bg-center {
    background-position: center;
  }
  </style>
  