<template>
    <div class="py-3 d-none d-md-block">
        <h5 class="text-secondary font-weight-bolder">Review List...</h5>
        <div class="border-bottom pt-2" v-for="n in 5" :key="n">
            <div class="row">
                <div class="col-md-6">Review Title</div>
                <div class="col-md-6">Review Rate</div>
            </div>
            <div class="row">
                <span>45 Minutes ago.</span>
            </div>
            <div class="row py-2">
                <p>Review Content</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ReviewList",
    data() {
        return {}
    }
}
</script>

<style scoped>

</style>
