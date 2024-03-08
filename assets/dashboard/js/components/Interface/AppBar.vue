<template>
  <v-app-bar class="bg-blue-grey-lighten-5">
    <v-app-bar-title class="font-weight-thin">
      <span v-if="!this.$route.name">
        Servers
      </span>
      <span v-else>
        {{ this.$route.name }}
      </span>
    </v-app-bar-title>
  </v-app-bar>
</template>
<script>
import { useSettingsStore } from '~/stores/Settings'
import {useTheme} from "vuetify";

export default {
  name: 'AppBar',
  data() {
    return {
      settingsStore: useSettingsStore(),
      drawer: false,
      theme: useTheme(),
    }
  },
  methods: {
    init() {
      this.theme.global.name = this.settingsStore.settings.theme
    },
  },
  created() {
    this.init()
  },
}
</script>
