<script>
import Card from '@/views/candidature/card/Card.vue';
import { useVacancy } from '@/services/vacancies'
import { onMounted, ref } from 'vue'
import axios from '@/plugins/axios.js'



export default {
  
  components: {
    Card,
  },
  data() {
    return {
      vacancies: [],
    };
  },
  mounted() {
    // Substitua 'sua_url_get_aqui' pela URL da sua API
    axios.get('/recruiters/vacancies-candidate')
      .then((response) => {
        this.vacancies = response.data.data;
      }).catch(err => console.log(err))
  },


};
</script>
<template>
  <div>
    <!-- Seção da imagem de fundo com parallax -->
    <section class="parallax-section relative">
  <div class="parallax-image"></div>
  <div class="absolute top-1/2 left-0 transform -translate-y-1/2 text-white text-left px-8">
    <h1 class="text-4xl font-bold mb-4 lg:w-96">
      O que acontece se juntar o seu potencial com o nosso?
    </h1>
    <h2 class="text-lg lg:w-96">
      Descubra como contribuímos para que nossos winovers cresçam inspirados e inspirando os outros
    </h2>
  </div>
</section>






    <!-- Seção de Cards -->
    <section class="bg-main-color p-8">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold mb-6">VAGAS</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <!-- Cards do conteúdo -->
          <Card v-for="c in vacancies" :key="c" :title="c.title" :name="c.title" :description="c.description" />
        </div>
      </div>
    </section>
  </div>
</template>

<style scoped>
.bg-main-color {
  background-color: #E4E8F0;
}

.parallax-section {
  position: relative;
  height: 500px;
  /* Ajuste a altura conforme necessário */
  overflow: hidden;
}

.parallax-image {
  width: 100%;
  height: 100%;
  background-image: url('https://winov.com.br/wp-content/uploads/2024/01/img_trabalhe_conosco@2x.png');
  background-size: cover;
  background-attachment: fixed;
}
</style>

  
  
  