<template>
    <div class="container">
        <div v-if="alreadyReviewed">
            <h3 class="p-3">You already have a review!.</h3>
        </div>
        <div v-else>
            <div class="form-group my-3">
                <label for="rating">Make a vote (1 is worth and 5 is the best.)</label>
                <star-rating v-model="review.rating" id="rating" class="fa-3x"></star-rating>
            </div>
            <div class="form-group">
                <label for="content">Content Review: </label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"
                          placeholder="Content...." v-model="review.content"></textarea>
            </div>
            <button class="btn btn-primary w-100 mt-3" @click="submit">Submit</button>
        </div>
    </div>
</template>

<script>
import StarRating from "../../Shared/StarRating.vue";

export default {
    name: "Review",
    components: {
        StarRating
    },
    data() {
        return {
            review: {
                id: null,
                rating: 5,
                content: null
            },
            existingReview: null,
            booking: null
        }
    },
    created() {
        this.review.id = this.$route.params.review;
        axios.get(`/api/reviews/${this.review.id}`)
            .then(response => {
                this.existingReview = response.data.data
            })
            .catch(error => {
                if (error.response && error.response.status && error.response.status === 404) {
                    axios.get(`/api/bookings/review/${this.$route.params.review}`)
                        .then(response => {
                            this.booking = response.data
                        })
                }
            }).then(() => {
        });
    },
    computed: {
        alreadyReviewed() {
            return this.existingReview !== null;
        }
    },
    methods: {
        submit() {
            axios.post(`/api/reviews`, this.review).then(response => {

            }).catch(error => {
            })
        }
    }
}
</script>

<style scoped>

</style>
