<template>
    <UsersRender v-if="users.length > 0" :users="users"/>
</template>

<script lang="ts">
import UsersRender from "@/components/Users/UsersRender.vue";

export default {
    name: "UserContainer",
    components: {UsersRender},
    data() {
        return {
            users: []
        }
    },

    created() {
        this.fetchData()
    },

    methods: {
        async fetchData() {
            const url = 'http://localhost/'
            let res = await (await fetch(url)).json();
            this.users = res.users;
        }
    }
}
</script>

<style scoped>

</style>