<template>
    <div class="container">
        <bookable-list-item :title="this.bookable1.title"
                            :content="this.bookable1.content"
                            :price="1000"></bookable-list-item>
        <bookable-list-item :title="this.bookable2.title"
                            :content="this.bookable2.content"
                            :price="2000"></bookable-list-item>
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem.vue";

export default {
    components: {
        BookableListItem
    },
    data() {
        return {
            bookable1: {
                "title": "Very cheep villa.",
                "content": "This is a Very cheep villa.",
                "price": 15000
            },
            bookable2: {
                "title": "Very cheep villa1.",
                "content": "This is a Very cheep villa1.",
                "price": 15000
            },
        }
    },

    mounted() {
        setTimeout(() => {
            this.bookable1.title = "Very expensive villa";
            this.bookable2.title = "Very expensive villa1";
        }, 5000)
    }
}
</script>

<style>
</style>
