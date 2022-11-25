<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-flex justify-content-between">
            <router-link class="navbar-brand" :to="{name: 'bookables'}">Bookables</router-link>
            <router-link class="navbar-brand" :to="{name: 'basket'}">
                <span class="btn btn-outline position-relative">
                    Basket
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ numberOfItemsInBasket }}<span class="visually-hidden">Basket</span>
                    </span>
                </span>
            </router-link>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    computed: {
        numberOfItemsInBasket() {
            console.log(this.$store.getters.itemInBasket)
            return this.$store.getters.itemInBasket;
        }
    }
}
</script>

<style>
</style>
