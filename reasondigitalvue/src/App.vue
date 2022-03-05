<template>
  <div class="wrapper">
    <div class="container">
      <VHeader />
      <router-view></router-view> 
    </div>
    <VFooter />
  </div>
</template>

<script>
import VHeader from "./components/VHeader.vue";
import VFooter from "./components/VFooter.vue";

export default {
  name: "app",
  components: {
    VHeader,
    VFooter,
  },
};
</script>