import { defineStore } from 'pinia'
import axios from "axios";
import {useStorage} from "@vueuse/core";
import {useBaseDataStore} from "./BaseDataStore";

export const useServersFiltersStore = defineStore({
    id: 'serversFilters',
    state: () => ({
        ...useBaseDataStore.state(),
        location: useStorage('location', []),
        storage: useStorage('storage', {}),
        storageType: useStorage('storageType', []),
        ram: useStorage('ram', []),
        loaded: false
    }),
    getters: {
        ...useBaseDataStore.getters,
        getStorageLabel(index) {
            console.log(index)
        },
        storageLabel: (state) => {
            console.log(state.storage)
            return 1
        },
    },
    actions: {
        ...useBaseDataStore.actions,
        load() {
            this.loading = true
            return new Promise((resolve) => {
                axios
                    .get(this.settingsStore.apiBaseUrl + '/filters')
                    .then(response => {
                        this.location = response.data.location
                        this.storage = response.data.storage
                        this.storageType = response.data.storageType
                        this.ram = response.data.ram
                        resolve()
                    })
                    .catch(errors => {
                        this.settingsStore.displayToast('Error', 'The filter options could not be loaded')
                    })
                    .finally(() => {
                        this.loading = false
                        this.loaded = true
                    })
            })
        },
    }
})
