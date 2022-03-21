<template>
    <div>
        <the-navbar></the-navbar>
        <div class="container">
          <router-view></router-view>
        </div>
    </div>
</template>

<script>
import TheNavbar from '../components/TheNavbar.vue';

export default {
    components: {
        TheNavbar,
    },
    
}
</script>

<style lang="sass" scoped>

</style>