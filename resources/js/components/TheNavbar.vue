<template>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand ms-auto" href="/login">Login</a>
            <a class="navbar-brand" href="/register">Register</a>
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
        }
    },
    mounted() {
        this.routes = this.$router.getRoutes().filter((route) => !!route.meta.linkText);
    }
}
</script>

<style lang="scss" scoped>

</style>