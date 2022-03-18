<template>
    <div>
        <the-navbar></the-navbar>
        <div class="container">
            <div class="row">
                <post-card v-for="post of posts" :key="post.id" :post="post" class="col-5 mb-5"></post-card>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import TheNavbar from '../components/TheNavbar.vue';
import PostCard from '../components/PostCard.vue';

export default {
    components: {
        TheNavbar,
        PostCard,
    },
    data() {
        return {
            posts: []
        }
    },
    methods: {
        async getPosts() {
            // axios.get("http://127.0.0.1:8000/api/posts")
            //     .then(response => {
            //         this.posts = response.data;
            //     });

            const response = await axios.get("http://127.0.0.1:8000/api/posts");
            this.posts = response.data;
        }
    },
    mounted() {
        this.getPosts();
    }
}
</script>

<style lang="sass" scoped>

</style>