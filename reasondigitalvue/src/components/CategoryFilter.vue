<template>
  <ul class="category-filter" v-if="categories"> <!-- waits for fetch before loading -->
    <li @click="setFilterBy(-1)">All Cage</li>
    <li
      v-for="category in categories"
      :key="category.id"
      @click="setFilterBy(category.id)"
    >
      {{ category.name }}
    </li>
  </ul>
</template>

<script>
export default {
  name: "CategoryFilter",
  data() {
    return {
      filteredPosts: [],
      categories: null,
    };
  },
  props: {
    //Callback to home to update posts
    setFilterBy: {
      type: Function,
      required: true,
    },
  },
  created: function () {
    fetch("http://localhost:8000/wp-json/wp/v2/categories")
      .then((response) => {
        // The API call was successful!
        return response.json();
      })
      .then((data) => {
        // This is the JSON from our response
        this.categories = data;
      })
      .catch((err) => {
        // There was an error
        console.warn("Something went wrong.", err);
      });
  },
};
</script>
