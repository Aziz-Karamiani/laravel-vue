<template>
    <div>
        <div class="card m-1">
            <div class="card-body">
                <h5 class="card-title">{{ title }}</h5>
                <p class="card-text">{{ content }}</p>
                <a href="#" class="btn btn-primary">Book: {{ price ?? 1000 }}</a>
            </div>
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
