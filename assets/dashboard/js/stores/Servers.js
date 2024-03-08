import { defineStore } from 'pinia'
import axios from "axios";
import {useBaseDataStore} from "./BaseDataStore";

export const useServersStore = defineStore({
    id: 'servers',
    state: () => ({
        ...useBaseDataStore.state(),
        index: [],
        pagination: {},
        filters: {
            location: null,
            storageType: null,
            storage: [],
            ram: []
        },
        isFiltered: false,
    }),
    getters: {
        ...useBaseDataStore.getters,
    },
    actions: {
        ...useBaseDataStore.actions,
        applyFilters() {
            this.isFiltered = true
            this.load({page: 1, itemsPerPage: this.itemsPerPage})
        },
        resetFilters() {
            this.$reset()
            this.load({page: 1, itemsPerPage: this.itemsPerPage})
        },
        async load({ page, itemsPerPage }) {
            this.loading = true
            return new Promise((resolve) => {
                axios
                    .get(this.settingsStore.apiBaseUrl + '/servers', {
                        params: {
                            page: page ? page : 1,
                            limit: itemsPerPage ? itemsPerPage : 10,
                            filters: this.isFiltered ? this.filters : {},
                        }
                    })
                    .then(response => {
                        this.index = Object.values(response.data.items)
                        this.pagination = response.data.pagination
                        resolve()
                    })
                    .finally(() => {
                        this.loading = false
                    })
            })
        },
    }
})
