import axios from '@/plugins/axios.js'
import {onMounted, ref} from 'vue'
import CategoryInterface from "./category.interface";

export default function (): Object {
    const category = ref<CategoryInterface | null>(null)
    const formData = ref({name: ''})

    const store = async () => {
        await axios.post('/recruiters/categories', formData.value)
            .then(response => {
                category.value = response.data.data
            })
            .catch(err => console.log(err))
    }

    return {
        category,
        formData,
        store,
    }
}
