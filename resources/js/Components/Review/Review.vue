<template>
    <div class="container">
        <div class="form-group my-3">
            <label for="rating">Make a vote (1 is worth and 5 is the best.)</label>
            <star-rating v-model="review.rating" id="rating" class="fa-3x"></star-rating>
        </div>
        <div class="form-group">
            <label for="content">Content Review: </label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"
                      placeholder="Content...." v-model="review.content"></textarea>
        </div>
        <button class="btn btn-primary w-100 mt-3">Submit</button>
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
                rating: 5,
                content: null
            }
        }
    }
}
</script>

<style scoped>

</style>
