
import index from './list.service'
import store from './store.service'

export function useCategory(){
    return {
        index,
        store,
    }
}
