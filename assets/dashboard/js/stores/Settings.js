import { defineStore } from 'pinia'
import { useStorage } from '@vueuse/core'

export const useSettingsStore = defineStore({
    id: 'settings',
    state: () => ({
        apiBaseUrl: '',
        settings: useStorage('settings', {'theme': 'light'}),
        toast: {
            title: '',
            text: '',
            visible: false
        },
        errors: null
    }),
    getters: {
        currentTimestamp() {
            return Math.floor(Date.now() / 1000)
        },
    },
    actions: {
        displayToast(title, text, duration = 2) {
            this.toast.title = title
            this.toast.text = text
            this.toast.visible = true
            setTimeout(() => {
                this.toast.visible = false
            }, duration*1000)
        },
    }
})
