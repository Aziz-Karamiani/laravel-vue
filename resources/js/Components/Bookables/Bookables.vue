<template>
    <div class="container">
        <bookable-list-item title="First Villa" content="Some quick example text to build on the card title and make up the bulk of the card's content." :price="1000"></bookable-list-item>
        <bookable-list-item title="First Villa2" content="Some quick example text to build on the card title and make up the bulk of the card's content2." :price="2000"></bookable-list-item>
        <bookable-list-item title="First Villa3" content="Some quick example text to build on the card title and make up the bulk of the card's content3." :price="3000"></bookable-list-item>
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem.vue";
export default {
    components: {
        BookableListItem
    }
}
</script>

<style>
</style>
