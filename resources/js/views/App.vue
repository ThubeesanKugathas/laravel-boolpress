<template>
    <div>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand ms-auto" href="/login">Login</a>
                <a class="navbar-brand" href="/register">Register</a>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col" v-for="post of posts" :key="post.id" >
                    {{ post.title }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    components: {
        
    },
    data() {
        return {
            posts: []
        }
    },
    methods: {
        getPosts() {
            axios.get("http://127.0.0.1:8000/api/posts")
                .then(response => {
                    this.posts = response.data;
                });
        }
    },
    mounted() {
        this.getPosts();
    }
}
</script>

<style lang="sass" scoped>

</style>