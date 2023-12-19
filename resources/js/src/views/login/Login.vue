<template>
  <div class="min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-4 bg-white shadow-lg rounded-md">
      <h2 class="text-2xl font-semibold mb-4">Login</h2>
      <form @submit.prevent="login">
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-600">E-mail:</label>
          <input type="email" id="email" v-model="email" required
            class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" />
        </div>

        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-600">Senha:</label>
          <input type="password" id="password" v-model="password" required
            class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" />
        </div>

        <button type="submit"
          class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-400 focus:outline-none focus:ring focus:border-blue-300">
          Login
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    async login() {

      try {
        // Lógica de login aqui (substitua pelo seu código real)
        const router = useRouter();


        // Obtém o parâmetro 'redirect' diretamente da URL
        const redirect = new URLSearchParams(window.location.search).get('redirect') || '/admin';


        const response = await axios.post('/api/login', { email: this.email, password: this.password });

        console.log(response)
        
        if (response.data.success) {
          localStorage.setItem('token', response.data.token);
          window.location.href = '/admin';
        } else {
          console.log('Erro no login');
        }

        // Redireciona para a rota desejada após o login
        // router.push(redirect);
      } catch (error) {
        console.error('Erro ao fazer login:', error);
      }
    },
  },
};
</script>

<style scoped>
/* Adicione estilos específicos do componente aqui, se necessário */
</style>
