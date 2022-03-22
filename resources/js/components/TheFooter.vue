<template>
  <div>
      <h3 v-if="user">Benvenuto {{ user.name }}</h3>
  </div>
</template>

<script>
export default {
    data() {
        return {
            user: null
        }
    },
    methods: {
        getStoredData() {
            const storedUser = localStorage.getItem('user');

            if(storedUser) {
                this.user = JSON.parse(storedUser);
            } else {
                this.user = null;
            }
        }
    },
    mounted() {
        this.getStoredData();
    }
}
</script>

<style>

</style>