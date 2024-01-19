<template>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Brother+1816&display=swap">

  <div class="min-h-screen flex">
    <!-- Parte Esquerda -->
    <div class="w-full bg-cover" style="background-image: url('https://winov.com.br/wp-content/uploads/2023/02/bg.png')">
      <div class="flex flex-col items-center justify-center h-full bg-opacity-0 text-white text-7xl font-medium">
        
        <img src="https://winov.com.br/wp-content/uploads/2022/11/02_plataforma_branco.png" alt="Sua Logo" class="w-20 mb-4">

        <p class="text-center mt-5">
          CRM de Vagas Winov
        </p>
      </div>
    </div>


    <!-- Parte Direita -->
    <div class="w-1/2 bg-header-color bg-opacity-70 p-8 flex items-center justify-center">
      <div class="max-w-md w-full bg-white bg-opacity-30 shadow-lg rounded-md p-8">
        <div class="flex items-center justify-center h-full">
          <img src="https://winov.com.br/wp-content/uploads/2023/08/cropped-16-x-16-pixels.png" alt="Logo" class="w-20" />
        </div>
        <form @submit.prevent="login">
          <div class="mb-4 flex items-center">
            <img src="https://winov.com.br/wp-content/uploads/2021/05/ic_mail.svg" alt="Ícone de e-mail"
              class="w-6 h-6 mr-2">
            <input type="email" id="email" v-model="email" required
              class="p-3 w-full  font-medium border rounded-md focus:outline-none focus:border-green-600" placeholder="Seu e-mail" />
          </div>

          <div class="mb-4 flex items-center">
            <img src="https://winov.com.br/wp-content/uploads/2022/03/ic_shield.svg" alt="Ícone de senha"
              class="w-6 h-6 mr-2">
            <input type="password" id="password" v-model="password" required
              class="p-3 w-full  font-medium border rounded-md focus:outline-none focus:border-green-600" placeholder="Sua senha" />
          </div>

          <button type="submit"
            class="w-full subscribe-button  font-medium text-white p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            Login
          </button>
        </form>

      </div>
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
        // Lógica de login aqui (substitua caso necessário)
        const router = useRouter();
        const redirect = new URLSearchParams(window.location.search).get('redirect') || '/admin';
        const response = await axios.post('/api/login', { email: this.email, password: this.password });

        console.log(response)

        if (response.data.success) {
          localStorage.setItem('token', response.data.token);
          window.location.href = '/admin';
        } else {
          console.log('Erro no login');
        }
      } catch (error) {
        console.error('Erro ao fazer login:', error);
      }
    },
  },
};
</script>

<style scoped>
/* Adicione estilos específicos do componente aqui, se necessário */
.bg-header-color {
  background: linear-gradient(to right, #6BBA05, #08162B);
}

.bg-btn-color {
  color: #6BBA05;
}

.bg-btn-color:hover {
  color: #08162B;
}

.font-brother1816 {
  font-family: 'Brother 1816';
  font-weight: 800;
}

.subscribe-button {
  background-color: #6BBA05;
  font-size: 20px;
  color: #ffffff;
  /* Cor do texto no botão */
  cursor: pointer;
  transition: background-color 0.3s;
}

.subscribe-button:hover {
  background-color: #92D322;
}
</style>
