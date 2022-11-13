<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div v-if="bookable !== null">
                        <h2 class="card-title">{{ bookable.title }}</h2>
                        <p class="card-text">{{ bookable.content }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            Availability
        </div>
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
            this.bookable = response.data.data
        });
    }
}
</script>

<style>
</style>
