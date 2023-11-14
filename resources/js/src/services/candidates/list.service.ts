import axios from '@/plugins/axios.js'
import { onMounted, ref, watch } from 'vue'
import CandidateInterface from "./candidate.interface";


export default function (): Object {
    const candidates = ref<CandidateInterface[] | null>(null)
    const meta = ref()
    const currentPage = ref(1)
    const perPage = ref(20)
    const perPageOptions = [5, 10, 15, 30]
    const getCandidates = async () => {

        const params = new URLSearchParams({
            page: currentPage.value,
            per_page: perPage.value
        })

        await axios.get('/recruiters/candidates?' + params)
            .then((response) => {
                candidates.value = response.data.data
                meta.value = response.data.meta
            }).catch(err => console.log(err))
    }

    watch(meta, current => {
        currentPage.value = meta.value.current_page
    })

    watch(
        [currentPage, perPage],
        async () => getCandidates()
    )

    return {
        candidates,
        getCandidates,
        meta,
        currentPage,
        perPage,
        perPageOptions
    }
}
