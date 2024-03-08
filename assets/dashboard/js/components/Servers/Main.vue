<template>
  <v-expansion-panels class="mb-8">
    <v-expansion-panel>
      <v-expansion-panel-title disable-icon-rotate :color="filterPanelColor">
        Filters
        <template v-slot:actions>
          <v-icon icon="fa-solid fa-filter">
          </v-icon>
        </template>
      </v-expansion-panel-title>
      <v-expansion-panel-text>
        <servers-filters />
      </v-expansion-panel-text>
    </v-expansion-panel>
  </v-expansion-panels>
  <servers-index />
</template>
<script>
import {useServersStore} from "~/stores/Servers";
import {useServersFiltersStore} from "~/stores/ServersFilters";
import ServersFilters from "~/components/Servers/Filters.vue";
import ServersIndex from "~/components/Servers/Index.vue";

export default {
  name: 'Servers',
  components: {
    ServersFilters,
    ServersIndex
  },
  data() {
    return {
      serversStore: useServersStore(),
      filtersStore: useServersFiltersStore(),
    }
  },
  computed: {
    filterPanelColor() {
      return this.serversStore.isFiltered ? 'blue-lighten-5' : ''
    },
  },
}
</script>