<template>
  <v-data-table-server
      v-model:items-per-page="itemsPerPage"
      :items="serversStore.index"
      :items-length="serversStore.pagination.totalItems ? serversStore.pagination.totalItems : 1"
      :loading="serversStore.loading"
      :items-per-page-options="itemsPerPageOptions"
      @update:options="serversStore.load"
  >
    <template v-slot:headers>
      <tr class="bg-blue font-weight-bold">
        <td>Model</td>
        <td v-if="showCol">RAM</td>
        <td v-if="showCol">Storage</td>
        <td v-if="showCol">Location</td>
        <td class="text-end">Price</td>
      </tr>
    </template>
    <template v-slot:item="{ item }">
      <tr>
        <td><server-detail :server="item" /></td>
        <td v-if="showCol">{{ item.ram }}</td>
        <td v-if="showCol">{{ item.storage }}</td>
        <td v-if="showCol">{{ item.location }}</td>
        <td class="text-end">{{ item.price }}</td>
      </tr>
    </template>
  </v-data-table-server>
</template>
<script>
import {useServersStore} from "~/stores/Servers";
import ServerDetail from './Detail.vue';
import { useDisplay } from 'vuetify'

export default {
  name: 'ServersIndex',
  components: {
    ServerDetail
  },
  data() {
    return {
      serversStore: useServersStore(),
      itemsPerPageOptions: [
        {value: 10, title: '10'},
        {value: 25, title: '25'},
        {value: 50, title: '50'},
      ],
      itemsPerPage: 10,
      display: useDisplay()
    }
  },
  computed: {
    showCol() {
      return this.display.mdAndUp
    },
  }
}
</script>