<template>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-8">
                <div class="card" v-if="bookable !== null">
                    <div class="card-header">{{ bookable.title }}</div>
                    <div class="card-body">
                        <p class="card-text">{{ bookable.content }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <availability></availability>
            </div>
        </div>
    </div>
</template>

<script>
import Availability from "./Availability.vue";

export default {
    components: {
      Availability
    },
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
