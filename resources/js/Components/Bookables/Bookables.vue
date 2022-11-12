<template>
    <div class="container mt-2">
        <div class="spinner-border text-secondary" role="status" v-if="loading">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div v-else class="row">
            <bookable-list-item class="col-md-4" v-for="bookable in bookables"
                                :title="bookable.title"
                                :content="bookable.content"
                                :price="bookable.price"></bookable-list-item>
        </div>
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem.vue";

export default {
    components: {
        BookableListItem
    },
    data() {
        return {
            loading: false,
            bookables: null
        }
    },

    mounted() {
        this.loading = true;
        axios.get('/api/bookables').then(response => {
            this.bookables = response.data
            this.loading = false;
        });
    }
}
</script>

<style>
</style>
