<template>
    <div class="">
        <h1 class="card-title">{{ post.title }}</h1>
        <img :src="post.image" class="card-img-top" alt="">
        <p class="card-text">Content: {{ post.content }}</p>
        <p class="card-text">By: {{ post.user.name }}</p>
        <p class="card-text">{{ post.category.categoryName }}</p>
        <span class="card-text" v-for="tag of post.tags" :key="tag.id">#{{ tag.tag_name }}</span> <br>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            post: {}
        }
    },
    methods: {
        async getPosts() {
            try {
                const response = await axios.get("/api/posts/" + this.$route.params.post);
    
                this.post = response.data;
            } catch(er) {
                // manda alla pagina di errore in caso non riesca a ricevere i dati
                this.$router.replace({
                    name: "error"
                });
            }
        }
    },
    mounted() {
        this.getPosts();
        console.log(this.post);
    }
}
</script>

<style lang="scss" scoped>
    img {
        width: 500px;
    }
</style>