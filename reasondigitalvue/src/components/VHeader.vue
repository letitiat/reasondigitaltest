<template>
  <header class="site-header">
    <div class="container container--header-top">
      <router-link class="brand" :to="{ path: '/' }">
        <img :src="require('../assets/logo.png')" />
      </router-link>
      <Menu />
    </div>
  </header>
</template>

<script>
import Menu from "../components/Menu.vue";

export default {
  name: "VHeader",
  components: {
    Menu,
  },
};
</script>
