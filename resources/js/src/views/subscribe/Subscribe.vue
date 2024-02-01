<template>
    <div class="h-full flex flex-col items-center justify-between bg-image">
        <!-- Header -->
        <Header />

        <!-- Conteúdo da Página -->
        <div class="bg-white p-8 rounded-md shadow-md mt-40 mb-20">
            <h2 class="text-3xl font-bold mb-6">Inscrever Vaga</h2>
            <form @submit.prevent="submitForm" enctype="multipart/form-data" class="text-left">
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
                    <input type="file" required  id="resume" ref="resume" class="mt-1" @change="handleFileChange" />
                </div>

                <button type="submit"
                    class="w-full bg-color text-white p-2 rounded-md hover:bg-color focus:outline-none focus:ring focus:border-blue-300">
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
import { useToast } from 'vue-toastification';
import { useRouter } from 'vue-router';
import { ref } from 'vue';

export default {
    components: {
        Header,
        Footer,
    },
    setup() {
        const router = useRouter();
        const toast = useToast();

        const name = ref('');
        const phone = ref('');
        const email = ref('');
        const linkedin = ref('');
        const github = ref('');
        const resume = ref(null);

        const handleFileChange = (event) => {
            resume.value = event.target.files[0];
        };

        const submitForm = async () => {
            
            if (!name.value || !email.value || !phone.value || !resume.value) {
                toast.error('Por favor, preencha todos os campos obrigatórios.');
                return;
            }

            try {
                const formData = new FormData();
                formData.append('name', name.value);
                formData.append('email', email.value);
                formData.append('phone', phone.value);
                formData.append('linkedin', linkedin.value);
                formData.append('github', github.value);
                formData.append('resume', resume.value);
                formData.append('vacancy_id', sessionStorage.getItem("vacancy_id"));

                const response = await axios.post('/api/subscribe', formData);
                if (response.success && response.success == false) {
                    toast.error('Não foi possível cadastrar seu curriculo');
                    return;

                }

                name.value = '';
                phone.value = '';
                email.value = '';
                linkedin.value = '';
                github.value = '';
                resume.value = null;

                toast.success('Cadastro feito com Sucesso.');
                router.push({ name: 'obrigado.index' });
                console.log('Candidato cadastrado com sucesso:', response.data);
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    toast.error('Por favor, corrija os erros no formulário.');
                } else {
                    toast.error('Opsss... Erro ao cadastrar-se');
                    console.error('Erro ao cadastrar contato:', error);
                }
            }
        };

        return {
            name,
            phone,
            email,
            linkedin,
            github,
            resume,
            handleFileChange,
            submitForm,
        };
    },
};
</script>

<style scoped>
.bg-image {
    background-image: url('https://winov.com.br/wp-content/uploads/2023/08/Blog.png');
    background-size: cover;
}
.bg-color{
    background-color: #6BBA05;
}
.bg-color:hover{
    background-color: #92D322;
}
</style>
