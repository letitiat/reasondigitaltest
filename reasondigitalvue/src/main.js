import { createApp } from 'vue'
import App from './App.vue'
import './assets/styles.scss';
import * as VueRouter from 'vue-router';
import Home from './pages/Home.vue';
import SinglePost from './pages/SinglePost.vue';
import SinglePage from './pages/SinglePage.vue';
import UsersPage from './pages/UsersPage.vue';

// Define  routes
const routes = [
    { path: '/', component: Home },
    { path: '/post/:id', component: SinglePost },
    { path: '/:id', component: SinglePage },
    { path: '/users', component: UsersPage },
  ]
  
// new router instance
  const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
  })

// Create and mount the root instance.
const app = createApp(App)

app.use(router)
app.mount('#app')
