<template>
  <div>
    <div class="menu-btn" :class="{ active: isActive }" @click="onMenuClick">
      <span class="top"></span>
      <span class="mid"></span>
      <span class="bot"></span>
    </div>
    <div id="toggleMenu" :class="{ open: isActive }">
      <nav>
        <ul v-if="menuItems">
          <!-- waits for fetch before loading -->
          <li class="menu-item" v-for="item in menuItems" :key="item.id">
            <router-link :to="{ path: '/' + item.slug }">
              <p v-html="item.title"></p>
            </router-link>
          </li>
          <li class="menu-item">
            <router-link :to="{ path: '/users' }"> Users page </router-link>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  name: "Menu",
  data() {
    return {
      menuItems: null,
      isActive: false,
    };
  },
  created: function () {
    fetch("http://localhost:8000/wp-json/wp/v2/menu")
      .then((response) => {
        // The API call was successful!
        return response.json();
      })
      .then((data) => {
        // This is the JSON from our response
        this.menuItems = data;
      })
      .catch((err) => {
        // There was an error
        console.warn("Something went wrong.", err);
      });
  },
  methods: {
    onMenuClick() {
      this.isActive = !this.isActive;
    },
  },
};
</script>
