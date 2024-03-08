<template>
  <v-navigation-drawer
      location="left"
      class="bg-blue-grey-darken-4"
      expand-on-hover
      rail
  >
    <v-list-item prepend-icon="fa-solid fa-house" class="pa-4" title="Server management" value="home"></v-list-item>
    <v-divider class="my-4"></v-divider>
    <v-list-item prepend-icon="fa-solid fa-server" title="Servers" value="servers" @click="$router.push('/')"></v-list-item>
    <v-list-item prepend-icon="fa-solid fa-cog" title="Settings" value="settings" @click="$router.push('/settings')" ></v-list-item>
  </v-navigation-drawer>
</template>
<script>

export default {
  name: 'NavigationDrawer',
  methods: {
  },
}
</script>
