<template>
    <nav aria-label="Page navigation example" class="d-flex">
        <ul class="pagination mx-auto">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="page in pagination.last_page" :key="page" class="page-item">
                <a class="page-link" @click="$emit('changepage', page)">{{ page }}</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    props: {
        pagination: Object,
    }
}
</script>

<style>

</style>