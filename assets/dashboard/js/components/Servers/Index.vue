<template>

  <v-data-table-server
      :headers="tableHeaders"
      v-model:items-per-page="itemsPerPage"
      :items="serversStore.index"
      :items-length="serversStore.pagination.totalItems ? serversStore.pagination.totalItems : 1"
      :loading="serversStore.loading"
      :items-per-page-options="itemsPerPageOptions"
      @update:options="serversStore.load"
  >
    <template v-slot:item="{ item }">
      <tr>
        <td><button class="link" data-action="server-details">{{ item.model }}</button></td>
        <td>{{ item.ram }}</td>
        <td>{{ item.storage }}</td>
        <td>{{ item.location }}</td>
        <td class="text-end">{{ item.price }}</td>
        <td class="text-end"><server-detail :server="item" /></td>
      </tr>
    </template>
  </v-data-table-server>
</template>
<script>
import {useServersStore} from "~/stores/Servers";
import ServerDetail from './Detail.vue';

export default {
  name: 'ServersIndex',
  components: {
    ServerDetail
  },
  data() {
    return {
      serversStore: useServersStore(),
      tableHeaders: [
        { title: 'Model', align: 'start', sortable: false, key: 'model'},
        { title: 'RAM', align: 'start', sortable: false, key: 'ram'},
        { title: 'Storage', align: 'start', sortable: false, key: 'storage'},
        { title: 'Location', align: 'start', sortable: false, key: 'location'},
        { title: 'Price', align: 'end', sortable: false, key: 'price'},
        { title: 'Details', align: 'end', sortable: false, key: 'details'},
      ],
      itemsPerPageOptions: [
        {value: 10, title: '10'},
        {value: 25, title: '25'},
        {value: 50, title: '50'},
      ],
      itemsPerPage: 10
    }
  },
}
</script>