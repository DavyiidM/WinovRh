<template>
  <header class="bg-header-color text-white p-4 flex items-center justify-between fixed top-0 left-0 w-full z-10">
    <div class="flex items-center">
      <img src="https://winov.com.br/wp-content/uploads/2023/05/logo.png" alt="Logo" class="h-8 mr-4">
    </div>
    <button @click="toggleMenu" class="text-xl focus:outline-none">
      ☰
    </button>
  </header>
</template>

<script>
export default {
  methods: {
    toggleMenu() {
      // Lógica para mostrar/ocultar o menu
    },
  },
};
</script>

<style scoped>
.bg-header-color {
  background-color: #08162B;
}
</style>
