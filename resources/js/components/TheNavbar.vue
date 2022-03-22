<template>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand ms-auto" href="/login" v-if="!user"> Login </a>
            <a class="navbar-brand ms-auto" href="/admin" v-else> {{ user.name }} </a>
            <a class="navbar-brand" v-if="!user" href="/register">Register</a>
            <div v-for="route in routes" :key="route.path">
                <router-link class="navbar-brand" :to="route.path">{{ route.meta.linkText }}</router-link>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            routes: [],
            user: null,
        }
    },
    methods: {
        getUser() {
            axios.get("/api/user")
            .then(response => {
                this.user = response.data;

                localStorage.setItem('user', JSON.stringify(response.data))
            })
            .catch((er) => {
                console.error('User not logged');

                localStorage.removeItem("user");
            });
        }
    },
    mounted() {
        this.routes = this.$router.getRoutes().filter((route) => !!route.meta.linkText);

        this.getUser();
    }
}
</script>

<style lang="scss" scoped>

</style>