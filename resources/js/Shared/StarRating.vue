<template>
    <div class="d-flex">
        <i
            class="fas fa-star"
            v-for="star in fullStars"
            :key="'full' + star"
            @click="$emit('update:modelValue', star)"
        ></i>
        <i class="fas fa-star-half-alt" v-if="halfStar"></i>
        <i
            class="far fa-star"
            v-for="star in emptyStars"
            :key="'empty' + star"
            @click="$emit('update:modelValue', fullStars + star)"
        ></i>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: Number
    },
    emits: ['update:modelValue'],
    computed: {
        halfStar() {
            const fraction = Math.round((this.modelValue - Math.floor(this.modelValue)) * 100);
            // console.log(fraction);
            return fraction > 0 && fraction < 50;
        },
        fullStars() {
            // > 4.5 = 5 stars
            // 4.3 = 4 and half
            return Math.round(this.modelValue);
        },
        emptyStars() {
            // if rating would be 1.9, ceil(1.9) = 2, 5 - 2 = 3, render 3 empty stars
            return 5 - Math.ceil(this.modelValue);
        }
    }
};
</script>
<style scoped>
.fa, .far, .fas {
    color: #ff9200;
}
</style>
