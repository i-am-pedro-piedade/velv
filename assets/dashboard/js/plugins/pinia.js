import {createPinia} from "pinia"
import {markRaw} from "vue"
import router from '~/router/index'

const pinia = createPinia()
pinia.use(({ store }) => {
    store.$router = markRaw(router)
})
export default pinia