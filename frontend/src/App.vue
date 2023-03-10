<script setup lang="ts">
import {RouterLink, RouterView} from "vue-router";
</script>

<template>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <RouterLink class="nav-link active" to="/">Home</RouterLink>
                </li>
            </ul>
        </div>
    </nav>
    <RouterView/>
</template>

<style scoped>

</style>
