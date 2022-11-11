<template>
    <div>
        <div>
            <router-link :to="{name: 'main'}">Home</router-link>
            <router-link :to="{name: 'about'}">About</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
</script>

<style>
</style>
