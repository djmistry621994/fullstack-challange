<template>
    <main>
        <!--        <api-test></api-test>-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h4>{{ $t('messages.users') }}</h4>
                </div>
                <div class="col-md-12">
                    <UsersContainer/>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup lang="ts">
import UsersContainer from "@/components/Users/UsersContainer.vue";
</script>

<style>

</style>