<template>
  <div class="container" v-if="page">
    <div class="block block--1">
      <h1 v-html="page.title.rendered"></h1>
      <div v-html="page.content.rendered"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SinglePage",
  data() {
    return {
      page: null,
      postSlug: this.$route.params.id,
    };
  },
  created: function () {
    fetch(
      "http://localhost:8000/wp-json/wp/v2/pages?slug=" +
        this.postSlug +
        "&_embed"
    )
      .then((response) => {
        // The API call was successful!
        return response.json();
      })
      .then((data) => {
        // This is the JSON from our response
        this.page = data[0];
      })
      .catch((err) => {
        // There was an error
        console.warn("Something went wrong.", err);
      });
  },
};
</script>
