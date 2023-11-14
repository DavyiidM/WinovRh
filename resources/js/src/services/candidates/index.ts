
import index from './list.service'
import store from './store.service'
import show from './show.service'

export function useCandidate(){
    return {
        index,
        store,
        show,
    }
}
