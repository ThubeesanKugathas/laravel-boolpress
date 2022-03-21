<template>
    <div>
        <the-navbar></the-navbar>
        <div class="container">
            <div class="row">
                <post-card v-for="post of posts" :key="post.id" :post="post" class="col-5 my-3 mx-auto"></post-card>
            </div>
        </div>

        <!-- <page-nav :pagination="pagination"></page-nav> -->

        <ul class="pagination m-0">
          <li class="page-item">
            <a
              class="page-link"
              @click="getPosts(pagination.current_page - 1)"
              >Previous</a
            >
          </li>
          <li
            class="page-item"
            v-for="page in pagination.last_page"
            :key="page"
          >
            <a class="page-link" @click="getPosts(page)">{{ page }}</a>
          </li>
          <li class="page-item">
            <a
              class="page-link"
              @click="getPosts(pagination.current_page + 1)"
              >Next</a
            >
          </li>
        </ul>

    </div>
</template>

<script>
import axios from "axios";
import TheNavbar from '../components/TheNavbar.vue';
import PostCard from '../components/PostCard.vue';
import PageNav from '../components/PageNav.vue';

export default {
    components: {
        TheNavbar,
        PostCard,
        PageNav,
    },
    data() {
        return {
            posts: [],
            pagination: {},
        }
    },
    methods: {
        async getPosts(page = 1) {
            // axios.get("http://127.0.0.1:8000/api/posts")
            //     .then(response => {
            //         this.posts = response.data;
            //     });
            if (page< 1 ) {
                page = 1;
            } 

            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }

            const response = await axios.get("http://127.0.0.1:8000/api/posts?page=" + page);
            this.pagination = response.data;
            this.posts = response.data.data;
        },
    },
    mounted() {
        this.getPosts();
    }
}
</script>

<style lang="sass" scoped>

</style>