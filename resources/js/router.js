import Vue from "vue";
import VueRouter from "vue-router";
import Home from './pages/Home.vue';
import Contacts from './pages/Contacts.vue';
import Show from './pages/posts/Show.vue';
import Error from './pages/Error.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {path: "//", component: Home, name: "home.index",
        meta: {
            title: "Homepage",
            linkText: "Home",
        }},
        {path: "/contacts", component: Contacts, name: "contact.index",
        meta: {
            title: "Contacts",
            linkText: "Contacts",
        }},
        {path: "/posts/:post", component: Show, name: "posts.show", 
        meta: {
            title: 'Post Detail'
        }},
        {
            path: "*", component: Error, name: "error"
        }
    ]
});


router.beforeEach((to, from, next) => {
    document.title = to.meta.title;

    next();
});

export default router;