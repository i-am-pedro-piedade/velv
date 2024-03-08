<template>
  <v-form @submit.prevent>
    <v-container class="pt-8">
      <v-row>
        <v-col cols="12" md="4">
          <v-select
              :items="filtersStore.location"
              v-model="serversStore.filters.location"
              clearable
              label="Location"
          ></v-select>
        </v-col>
        <v-col cols="12" md="4">
          <v-select
              :items="filtersStore.storageType"
              v-model="serversStore.filters.storageType"
              clearable
              label="Storage type"
          ></v-select>
        </v-col>
        <v-col cols="12" md="4">
          <v-range-slider
              :min="0"
              :max="Object.keys(filtersStore.storage).length-1"
              :step="1"
              label="Storage"
              v-model="storageFilter"
              show-ticks="always"
              thumb-label="always"
              tick-size="2"
              strict
          >
            <template v-slot:thumb-label="{ modelValue }">
              {{ filtersStore.storage[modelValue].label }}
            </template>
          </v-range-slider>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12">
          RAM
        </v-col>
        <v-col cols="1" v-for="option in filtersStore.ram">
          <v-checkbox
              v-model="serversStore.filters.ram"
              :label="option"
              :value="option"
          ></v-checkbox>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" class="text-end">
          <v-btn type="button" v-on:click="serversStore.resetFilters()" color="red" prepend-icon="fa-regular fa-circle-xmark" v-if="this.serversStore.isFiltered" class="me-2">
            Reset
          </v-btn>
          <v-btn type="button" v-on:click="serversStore.applyFilters()" prepend-icon="fa-regular fa-circle-check" color="blue">
            Apply
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>
<script>
import {useServersStore} from "~/stores/Servers";
import {useServersFiltersStore} from "~/stores/ServersFilters";

export default {
  name: 'ServersFilters',
  data() {
    return {
      serversStore: useServersStore(),
      filtersStore: useServersFiltersStore(),
      selectedStorageFilter: [0, Object.keys(useServersFiltersStore().storage).length-1]
    }
  },
  computed: {
    storageFilter: {
      get() {
        return this.selectedStorageFilter
      },
      set(value) {
        this.selectedStorageFilter = value
        this.serversStore.filters.storage = [this.filtersStore.storage[value[0]].value, this.filtersStore.storage[value[1]].value]
        return value
      }
    }
  },
  created() {
    this.filtersStore.load()
  },
}
</script>