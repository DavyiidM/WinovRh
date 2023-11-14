import axios from '@/plugins/axios.js'
import {onMounted, ref} from 'vue'
import CandidateInterface from "./candidate.interface";

export default function (): Object {
    const candidate = ref<CandidateInterface | null>(null)
    const formData = ref({name: '',categoryId: null,})

    const store = async () => {
        await axios.post('/recruiters/candidates', formData.value)
        .then(response => {
            candidate.value = response.data.data
        })
        .catch(err => console.log(err))
    }

    return {
        candidate,
        formData,
        store,
    }
}
