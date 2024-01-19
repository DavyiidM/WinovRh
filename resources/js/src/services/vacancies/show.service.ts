// useVacancy.js
import axios from '@/plugins/axios.js'
import { ref } from 'vue'
import VacancyInterface from "./vacancy.interface";

export default function () {
    const vacancy = ref<VacancyInterface | null>(null)

    const show = async (uuid) => {
        try {
            const response = await axios.get(`/recruiters/vacancies/${uuid}`);
            vacancy.value = response.data.data;
            console.log(response.data);
            return response; // Retornar a resposta completa se necessário
        } catch (error) {
            return Promise.reject(error);
        }
    }

    return {
        vacancy,
        show,
    }
}
