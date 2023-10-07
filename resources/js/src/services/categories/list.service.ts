import axios from '@/plugins/axios.js'
import {onMounted, ref, watch} from 'vue'
import CategoryInterface from "./category.interface";


export default function (): Object {
    const categories = ref<CategoryInterface[] | null>(null)
    const meta = ref()
    const currentPage = ref(1)
    const perPage = ref(15)
const perPageOptions = [5,10,15,30]
    const getCategories = async () => {

        const params = new URLSearchParams({
            page: currentPage.value,
            per_page: perPage.value
        })

        await axios.get('/recruiters/categories?'+params)
            .then((response) => {
                categories.value = response.data.data
                meta.value = response.data.meta
            }).catch(err => console.log(err))
    }

    watch(meta, current => {
        currentPage.value = meta.value.current_page
    })

    watch(
        [currentPage, perPage],
        async () => getCategories()
    )

    return {
        categories,
        getCategories,
        meta,
        currentPage,
        perPage,
        perPageOptions
    }
}
