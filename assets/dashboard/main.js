import {createApp} from 'vue/dist/vue.esm-bundler';
import {PiniaVuePlugin} from 'pinia'
import dashboard from '~/Main.vue'
import VueDayjs from 'vue3-dayjs-plugin'
import './styles/main.scss';
import router from '~/router/index'
import vuetify from '~/plugins/vuetify'
import pinia from '~/plugins/pinia'

const app = createApp(
    {
        components: {
            dashboard
        },
    })
    .use(vuetify)
    .use(PiniaVuePlugin)
    .use(VueDayjs)
    .use(pinia)
    .use(router)
    .mount('#app')
