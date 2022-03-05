<template>
  <div class="posts-feed" v-if="posts"> <!--Waits for fetch to finish before loading-->
    <div
      v-for="post in filteredPosts"
      class="active post"
      :class="post._embedded['wp:term']['0']['0'].slug"
      :key="post.id"
    >
      <div class="post_image">
        <img :src="post._embedded['wp:featuredmedia']['0'].source_url" />
      </div>
      <router-link :to="{ path: '/post/' + post.slug }">
        <h1 v-html="post.title.rendered"></h1>
        <div v-html="post.excerpt.rendered" class="subtitle"></div>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "WPPosts",
  data() {
    return {
      posts: null,
      filteredPosts: [],
    };
  },
  methods: {
    updateFilteredPosts() {
      this.filteredPosts = this.posts.filter(
        (post) => this.filterBy == -1 || post.categories.includes(this.filterBy) //filters every fetched post by filterBy
      );
    },
  },
  props: {
    filterBy: {
      type: Number, //for type safety
      required: true,
    },
  },
  watch: {
    filterBy: function () {
      this.updateFilteredPosts(); //filters posts after category li on click 
    },
  },
  created: function () {
    fetch("http://localhost:8000/wp-json/wp/v2/posts?_embed")
      .then((response) => {
        // The API call was successful!
        return response.json();
      })
      .then((data) => {
        // This is the JSON from our response
        this.posts = data;
        this.updateFilteredPosts(); //initial filter posts
      })
      .catch((err) => {
        // There was an error
        console.warn("Something went wrong.", err);
      });
  },
};
</script>
