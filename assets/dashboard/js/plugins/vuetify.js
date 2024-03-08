import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, fa } from 'vuetify/iconsets/fa'
import colors from 'vuetify/lib/util/colors'
import { md3 } from 'vuetify/blueprints'

const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'fa',
        aliases,
        sets: {
            fa,
        },
    },
    blueprint: md3,
    theme: {
        defaultTheme: 'dark',
        themes: {
            light: {
                colors: {
                    surface: colors.shades.white,
                }
            },
        },
    }
})


export default vuetify