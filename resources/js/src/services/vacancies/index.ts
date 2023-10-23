
import index from './list.service'
import store from './store.service'

export function useVacancy(){
    return {
        index,
        store,
    }
}
