<template>
    <div>
        <div class="card m-1">
            <div class="card-body">
                <router-link class="link" :to="{name: 'bookable', params: {bookable: id}}">Bookables</router-link>
                <h5 class="card-title">{{ title }}</h5>
                <p class="card-text">{{ content }}</p>
                <a href="#" class="btn btn-primary">Book: {{ id }}</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        content: String,
        id: Number
    }
}
</script>

<style>
</style>
