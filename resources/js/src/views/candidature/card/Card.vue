<template>
  <div class="bg-white p-4 rounded-md shadow-md">
    <h3 class="text-lg font-semibold">{{ title }}</h3>
    <p class="text-gray-500">{{ name }}</p>
    <p class="mt-2">{{ description }}</p>
    <button @click="subscribe"
      class="mt-4 subscribe-button text-white px-4 py-2 rounded-md hover:bg-blue-400 focus:outline-none focus:border-blue-300">
      Inscrever-se
    </button>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    name: String,
    description: String,
  },
  methods: {
    subscribe() {
      // Lógica de inscrição aqui
      console.log('Inscrição realizada!');
      // Redirecionar para a página de inscrição
      this.$router.push({ name: 'subscribe.index' });
    },
  },
};
</script>

<style scoped>
.subscribe-button {
  background-color: #6BBA05;
  color: #ffffff;
  /* Cor do texto no botão */
  cursor: pointer;
  transition: background-color 0.3s;
}

.subscribe-button:hover {
  background-color: #92D322;
}
</style>
