<template>
  <div class="h-full flex flex-col items-center justify-between bg-image">
      <!-- Header -->
      <Header />

      <!-- Conteúdo da Página -->
      <div class="bg-white p-8 rounded-md shadow-md mt-40 mb-20">
          <h2 class="text-3xl font-bold mb-6">Inscrever Vaga</h2>
          <form @submit.prevent="submitForm" class="text-left">
              <div class="mb-4">
                  <label for="name" class="block text-sm font-medium text-gray-600">Nome:</label>
                  <input type="text" id="name" v-model="name" required
                      class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" />
              </div>

              <div class="mb-4">
                  <label for="phone" class="block text-sm font-medium text-gray-600">Telefone:</label>
                  <input type="tel" id="phone" v-model="phone" required
                      class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" />
              </div>

              <div class="mb-4">
                  <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                  <input type="email" id="email" v-model="email" required
                      class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" />
              </div>

              <div class="mb-4">
                  <label for="linkedin" class="block text-sm font-medium text-gray-600">LinkedIn:</label>
                  <input type="text" id="linkedin" v-model="linkedin"
                      class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" />
              </div>

              <div class="mb-4">
                  <label for="github" class="block text-sm font-medium text-gray-600">GitHub:</label>
                  <input type="text" id="github" v-model="github"
                      class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" />
              </div>

              <div class="mb-4">
                  <label for="resume" class="block text-sm font-medium text-gray-600">Currículo:</label>
                  <input type="file" id="resume" ref="resume" class="mt-1" />
              </div>

              <button type="submit"
                  class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-400 focus:outline-none focus:ring focus:border-blue-300">
                  Inscrever-se
              </button>
          </form>
      </div>
  </div>

  <!-- Footer -->
  <Footer />
</template>

<script>
  import Header from '@/views/candidature/header/Header.vue';
  import Footer from '@/views/candidature/footer/Footer.vue';
  import axios from 'axios';

  export default {
      components: {
          Header,
          Footer,
      },
      data() {
          return {
              name: '',
              phone: '',
              email: '',
              linkedin: '',
              github: '',
          };
      },

  methods: {
  async submitForm() {
          // Lógica para enviar os dados do formulário
          console.log('Formulário enviado!');
          console.log('Nome:', this.name);
          console.log('Telefone:', this.phone);
          console.log('Email:', this.email);
          console.log('LinkedIn:', this.linkedin);
          console.log('GitHub:', this.github);

          // Processar o arquivo do currículo
          const curriculoFile = this.$refs.resume.files[0];
          console.log('Currículo:', curriculoFile);

          try {
              const response = await axios.post('/api/subscribe', {
                  name: this.name,
                  email: this.email,
                  phone: this.phone,
                  linkedin: this.linkedin,
                  github: this.github,
              });

              console.log('Canditado cadastrado com sucesso:', response.data);
          } catch (error) {
              console.error('Erro ao cadastrar contato:', error);
          }
      },
    }
  };
</script>

<style scoped>
  .bg-image {
      background-image: url('https://winov.com.br/wp-content/uploads/2023/08/Blog.png');
      background-size: cover;

  }
</style>