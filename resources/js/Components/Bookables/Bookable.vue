<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card" v-if="bookable !== null">
                    <div class="card-header bg-info text-white fw-bold">{{ bookable.title }}</div>
                    <div class="card-body">
                        <p class="card-text">{{ bookable.content }}</p>
                    </div>
                </div>
                <review-list :bookable-id="this.$route.params.bookable"></review-list>
            </div>
            <div class="col-md-4">
                <availability :bookable-id="this.$route.params.bookable" v-on:availability="checkPrice"
                              class="mb-3"></availability>
                <transition name="fade">
                    <price-break-down v-if="price" :price="price" class="mb-4"></price-break-down>
                </transition>

                <transition name="fade">
                    <button class="btn btn-outline-secondary w-100" v-if="price" @click="addToBasket">Book Now</button>
                </transition>

                <transition name="fade">
                    <button class="btn btn-outline-secondary w-100 my-2" v-if="price" @click="removeFromBasket">Remove From Basket</button>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
import Availability from "./Availability.vue";
import PriceBreakDown from "./PriceBreakDown.vue";
import ReviewList from "./ReviewList.vue";

export default {
    components: {
        Availability,
        ReviewList,
        PriceBreakDown
    },
    data() {
        return {
            bookable: null,
            price: null,
        }
    },

    mounted() {
        axios.get(`/api/bookables/${this.$route.params.bookable}`).then(response => {
            this.bookable = response.data.data
        });
    },

    methods: {
        checkPrice(availability) {
            if (!availability) {
                this.price = null;
                return;
            }

            axios
                .get(
                    `/api/bookables/${this.bookable.id}/price?from=${this.$store.state.searchQuery.from}&to=${this.$store.state.searchQuery.to}`
                )
                .then(response => {
                    this.price = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        addToBasket() {
            this.$store.dispatch('addToBasket', {
                bookable: this.bookable,
                price: this.price,
                dates: this.$store.state.searchQuery
            });
        },
        removeFromBasket() {
            this.$store.dispatch('removeFromBasket', this.bookable);
        }
    }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from, .fade-leave-to {
    opacity: 0;
}
</style>
