<template>
  <div class="container" v-if="posts">
    <h2 v-for="post in posts" v-bind:key="post.id" v-html="post.title"></h2>
  </div>
</template>

<script>
export default {
  name: "UsersPage",
  data() {
    return {
      posts: null,
    };
  },
  created: function () {
    fetch("https://jsonplaceholder.typicode.com/posts?userId=3")
      .then((response) => {
        // The API call was successful!
        return response.json();
      })
      .then((data) => {
        // This is the JSON from our response
        this.posts = data;
      })
      .catch((err) => {
        // There was an error
        console.warn("Something went wrong.", err);
      });
  },
};
</script>
