<template>
    <div>
        <div class="card">
            <img :src="`https://unsplash.it/600/300?image=${post.image}`" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">{{ post.content }}</p>
                <p class="card-text">By: {{ post.user.name }}</p>
                <p class="card-text">{{ post.category.categoryName }}</p>
                <span class="card-text" v-for="tag of post.tags" :key="tag.id">#{{ tag.tag_name }}</span> <br>
                <router-link :to="{ name:'posts.show', params: { post: post.slug } }" >Details</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: Object,
    }
}
</script>

<style lang="scss" scoped>

</style>