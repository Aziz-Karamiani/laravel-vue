<template>
    <div class="container" v-if="bookable !== null">
        <h2>{{ bookable.title }}</h2>
        <p>{{ bookable.content }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bookable: null,
        }
    },

    mounted() {
        axios.get(`/api/bookables/${this.$route.params.bookable}`).then(response => {
            this.bookable = response.data
        });
    }
}
</script>

<style>
</style>
