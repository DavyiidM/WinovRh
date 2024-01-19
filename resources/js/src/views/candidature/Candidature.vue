<template>
  <div class="flex flex-col min-h-screen">
    <Header />
    <MainContent />
    <Footer />
  </div>
</template>

<script>
import Header from '@/views/candidature/header/Header.vue';
import MainContent from '@/views/candidature/mainContent/MainContent.vue';
import Footer from '@/views/candidature/footer/Footer.vue';

export default {
  components: {
    Header,
    MainContent,
    Footer,
  },
};
</script>

<style scoped>
/* Defina a altura mínima da tela para ocupar pelo menos toda a tela */
.min-h-screen {
  min-height: 100vh;
}

/* Adicione um espaçamento automático para empurrar o conteúdo para cima */
.flex {
  flex: 1;
}

/* Estilos específicos para o Footer */
.Footer {
  margin-top: auto; /* Empurra o Footer para o final da página */
  padding: 20px; /* Ajuste a quantidade de padding conforme necessário */
  background-color: #f0f0f0; /* Cor de fundo do Footer */
}
</style>
