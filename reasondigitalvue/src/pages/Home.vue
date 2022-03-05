<template>
  <div class="container">
    <CategoryFilter :setFilterBy="setFilterByCallback" />
    <WPPosts :filterBy="filterBy" />
  </div>
</template>

<script>
import WPPosts from "../components/WPPosts.vue";
import CategoryFilter from "../components/CategoryFilter.vue";

export default {
  name: "Home",
  components: {
    CategoryFilter,
    WPPosts,
  },
  data() {
    return {
        filterBy: -1, //to get all posts
        setFilterByCallback: newFilterBy => {
            this.filterBy = newFilterBy;
        }
    };
  },
};
</script>