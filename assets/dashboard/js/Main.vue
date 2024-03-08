<template>
  <v-container fluid>
    <v-layout class="rounded rounded-md">
      <navigation-drawer/>
      <v-main class="d-flex w-100">
        <app-bar/>
        <v-container class="pa-6">
          <router-view />
        </v-container>
      </v-main>
      <toast />
    </v-layout>
  </v-container>
</template>
<script>
import AppBar from './components/Interface/AppBar.vue';
import NavigationDrawer from './components/Interface/NavigationDrawer.vue';
import Toast from './components/Interface/Toast.vue';
import {useSettingsStore} from "~/stores/Settings";

export default {
  components: {
    AppBar,
    NavigationDrawer,
    Toast
  },
  props: {
    route: {required: true, type: String},
    apiBaseUrl: {required: true, type: String},
  },
  data() {
    return {
      settingsStore: useSettingsStore(),
    }
  },
  mounted() {
    this.settingsStore.apiBaseUrl = this.apiBaseUrl
  },
}
</script>
