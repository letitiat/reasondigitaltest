<template>
  <div class="container--1-1">
    <div class="block block--1">
      <h1 v-html="post.title.rendered"></h1>
      <div v-html="post.content.rendered"></div>
    </div>
    <div class="block block--2">
      <div class="block_image">
        <img :src="post._embedded['wp:featuredmedia']['0'].source_url" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SinglePost",
  data() {
    return {
      post: null,
      postSlug: this.$route.params.id,
    };
  },
  created: function () {
    fetch(
      "http://localhost:8000/wp-json/wp/v2/posts?slug=" +
        this.postSlug +
        '&_embed'
    )
      .then((response) => {
        // The API call was successful!
        return response.json();
      })
      .then((data) => {
        // This is the JSON from our response
        this.post = data[0];
      })
      .catch((err) => {
        // There was an error
        console.warn("Something went wrong.", err);
      });
  },
};
</script>
