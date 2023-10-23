import axios from '@/plugins/axios.js'
import {onMounted, ref} from 'vue'
import VacancyInterface from "./vacancy.interface";

export default function (): Object {
    const vacancy = ref<VacancyInterface | null>(null)
    const formData = ref({name: ''})

    const store = async () => {
        await axios.post('/recruiters/vacancies', formData.value)
        .then(response => {
            vacancy.value = response.data.data
        })
        .catch(err => console.log(err))
    }

    return {
        vacancy,
        formData,
        store,
    }
}
