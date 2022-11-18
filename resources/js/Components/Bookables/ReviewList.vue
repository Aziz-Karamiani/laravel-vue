<template>
    <div class="my-3 d-none d-md-block border-start border-3 border-gray-700 p-3">
        <h5 class="text-secondary font-weight-bolder">Review List...</h5>
        <div v-if="reviews !== null">
            <div class="border-bottom border-2 pt-2" v-for="(review, index) in reviews" :key="index">
                <div class="row">
                    <div class="col-md-6 fw-bold text-dark">Review Title</div>
                    <div class="col-md-6 justify-content-end">
                        <star-rating v-model="review.rating"></star-rating>
                    </div>
                </div>
                <div class="row">
                    <span>{{ review.created_at }}</span>
                </div>
                <div class="row py-2 text-secondary">
                    <p>{{ review.content }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "../../Shared/StarRating.vue";

export default {
    name: "ReviewList",
    components: {
      StarRating
    },
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
