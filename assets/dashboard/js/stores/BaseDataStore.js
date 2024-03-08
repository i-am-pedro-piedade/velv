import {useSettingsStore} from "~/stores/Settings";

export const useBaseDataStore = {
    state: () => ({
        loading: false,
        index: [],
        settingsStore: useSettingsStore(),
    }),
    getters: {
    },
    actions: {
    }
}

