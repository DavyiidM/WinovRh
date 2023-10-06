import axios from '@/plugins/axios.js'
import {onMounted, ref} from 'vue'
import CategoryInterface from "./category.interface";


export default function (): Object {
    const categories = ref<CategoryInterface[] | null>(null)

    const getCategories = async () => {
        await axios.get('/recruiters/categories')
            .then((response) => {
                console.log({response})
                categories.value = response.data.data
            }).catch(err => console.log(err))
    }

    return {
        categories,
        getCategories,
    }
}
