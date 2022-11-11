<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <router-link class="navbar-brand mr-auto" :to="{name: 'main'}">Home</router-link>
            <router-link class="nav-link" :to="{name: 'bookables'}">Bookables</router-link>
            <router-link class="nav-link" :to="{name: 'about'}">About</router-link>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
</script>

<style>
</style>
