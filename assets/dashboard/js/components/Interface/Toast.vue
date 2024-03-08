<template>
  <v-bottom-sheet v-model="settingsStore.toast.visible">
    <v-card class="text-center">
      <v-card-title class="mt-6">
        <h5>{{ settingsStore.toast.title }}</h5>
      </v-card-title>
      <v-card-text class="mb-6">{{ settingsStore.toast.text }}</v-card-text>
    </v-card>
  </v-bottom-sheet>
</template>
<script>
import { useSettingsStore } from '~/stores/Settings'

export default {
  name: 'Toast',
  data() {
    return {
      settingsStore: useSettingsStore(),
      drawer: false,
    }
  },
  methods: {
  },
}
</script>
