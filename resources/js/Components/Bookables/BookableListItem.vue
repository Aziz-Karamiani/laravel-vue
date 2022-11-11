<template>
    <div class="card m-2">
        <div class="card-body">
            <h5 class="card-title">{{ title }}</h5>
            <p class="card-text">{{ content }}</p>
            <a href="#" class="btn btn-primary">Book: {{ price }}</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        content: String,
        price: Number
    }
}
</script>

<style>
</style>
