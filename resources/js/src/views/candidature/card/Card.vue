<template>
  <div class=" bg-white p-6 rounded-md shadow-md mt-10 mb-10 max-w-md ">
    <h3 class="text-3xl font-bold mb-6">{{ title }}</h3>
    <p class="text-gray-500 text-lg mb-4">{{ name }}</p>

    <div class="flex justify-center space-x-4">
      <button @click="viewJobDetails"
        class="subscribe-button text-white px-4 py-2 rounded-md hover:bg-blue-400 focus:outline-none focus:border-blue-300">
        Ver a vaga
      </button>
      <button @click="subscribe"
        class="subscribe-button text-white px-4 py-2 rounded-md hover:bg-blue-400 focus:outline-none focus:border-blue-300">
        Inscrever-se
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    name: String,
    description: String,
    id: String,
  },
  methods: {
    viewJobDetails() {
      // Redirecionando para a página de detalhes da vaga com todas as informações
      sessionStorage.setItem("vacancy_id", this.id);
      this.$router.push({ name: 'ShowCard.index', params: { title: this.title, name: this.name, description: this.description, id: this.id } });
    },
    subscribe() {
      // Lógica de inscrição aqui
      console.log('Inscrição realizadA!');
      // Redirecionar para a página de inscrição
      sessionStorage.setItem("vacancy_id", this.id);
      this.$router.push({ name: 'subscribe.index' });
    },
  },
};
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
