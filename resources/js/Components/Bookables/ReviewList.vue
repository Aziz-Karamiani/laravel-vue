<template>
    <div class="py-3 d-none d-md-block">
        <h5 class="text-secondary font-weight-bolder">Review List...</h5>
        <div class="border-bottom pt-2" v-for="(review, index) in reviews" :key="index">
            <div class="row">
                <div class="col-md-6">Review Title</div>
                <div class="col-md-6">{{ review.rating }}</div>
            </div>
            <div class="row">
                <span>{{ review.created_at }}</span>
            </div>
            <div class="row py-2">
                <p>{{ review.content }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ReviewList",
    props: {
        bookableId: String,
    },
    data() {
        return {
            reviews: null
        }
    },
    created() {
        axios
            .get(
                `/api/bookables/${this.bookableId}/reviews`
            )
            .then(response => {
                this.reviews = response.data.data;
            });
    }
}
</script>

<style scoped>

</style>
