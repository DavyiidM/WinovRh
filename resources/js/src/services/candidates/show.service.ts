import axios from '@/plugins/axios.js'
import {onMounted, ref} from 'vue'
import CandidateInterface from "./candidate.interface";

export default function (): Object {
    const candidate = ref<CandidateInterface | null>(null)
    
    const show = async (uuid)=>{
        await axios.get(`/recruiters/candidates/${uuid}`)
        .then(response=>{
            candidate.value = response.data.data
        }).catch(err=>Promise.reject(err))
    }
    return {
        candidate,
        show,
    }
}
