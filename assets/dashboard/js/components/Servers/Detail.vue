<template>
  <v-dialog max-width="800">
    <template v-slot:activator="{ props: activatorProps }">
      <a v-bind="activatorProps" role="button" href="" @click.prevent>
        {{ server.model }}
      </a>
    </template>
    <template v-slot:default="{ isActive }">
      <v-card elevation="16">
        <template v-slot:title>
          <h3 class="border-b pb-2 mb-4">{{ server.model }}</h3>
        </template>
        <template v-slot:text>
          <v-chip class="pa-5 me-4 mb-4" variant="outlined">
            <v-icon icon="fa-regular fa-hard-drive" start class="me-3"></v-icon>
            {{ server.storage }}
          </v-chip>
          <v-chip class="pa-5 me-4 mb-4" variant="outlined">
            <v-icon icon="fa-solid fa-microchip" start class="me-3"></v-icon>
            {{ server.ram }}
          </v-chip>
          <v-chip class="pa-5 me-4 mb-4" variant="outlined">
            <v-icon icon="fa-solid fa-map-location-dot" start class="me-3"></v-icon>
            {{ server.location }}
          </v-chip>
          <div class="my-4">
            Additional details could be displayed here...
          </div>
          <div class="text-end border-t mt-4 pt-2"><h3>{{ server.price }}</h3></div>
        </template>
        <template v-slot:actions>
          <v-btn
              class="ms-auto"
              text="OK"
              @click="isActive.value = false"
          ></v-btn>
        </template>
      </v-card>
    </template>
  </v-dialog>
</template>
<script>

export default {
  name: 'Server detail',
  props: {
    server: {required: true, type: Object},
  },
  data() {
    return {
    }
  },
}
</script>