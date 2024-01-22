import axios from '@/plugins/axios.js'
import { onMounted, ref, watch } from 'vue'
import VacancyInterface from "./vacancy.interface";



export default function (): Object {
    const vacancies = ref<VacancyInterface[] | null>(null)
    const meta = ref()
    const currentPage = ref(1)
    const perPage = ref(20)
    const perPageOptions = [5, 10, 15, 30]
    const getVacancies = async () => {

        const params = new URLSearchParams({
            page: currentPage.value,
            per_page: perPage.value
        })

        await axios.get('/recruiters/vacancies?' + params)
            .then((response) => {
                vacancies.value = response.data.data
                meta.value = response.data.meta
            }).catch(err => console.log(err))
    }

    watch(meta, current => {
        currentPage.value = meta.value.current_page
    })

    watch(
        [currentPage, perPage],
        async () => getVacancies()
    )

    return {
        vacancies,
        getVacancies,
        meta,
        currentPage,
        perPage,
        perPageOptions
    }
}
