<template>
  <v-row  class="mb-6">
    <v-col cols="12" class="py-2">
      <h4 class="mb-4">Theme</h4>
      <v-btn-toggle v-model="this.settingsStore.settings.theme">
        <v-btn value="dark">
          Dark
        </v-btn>
        <v-btn value="light">
          Light
        </v-btn>
      </v-btn-toggle>
    </v-col>
  </v-row>
</template>
<script>
import {useSettingsStore} from "~/stores/Settings";
import {useTheme} from "vuetify";

export default {
  name: 'Settings',
  data() {
    return {
      settingsStore: useSettingsStore(),
      theme: useTheme(),
    }
  },
  watch: {
    'settingsStore.settings.theme'() {
      this.theme.global.name = this.settingsStore.settings.theme
    }
  },
}
</script>