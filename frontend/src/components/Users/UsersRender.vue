<template>
    <table class="table table-bordered">
        <thead v-once>
        <tr>
            <th>#</th>
            <th>{{ $t('messages.name') }}</th>
            <th>{{ $t('messages.email') }}</th>
            <th>{{ $t('messages.action') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
                <button class="btn btn-primary p-0" data-toggle="tooltip" :title="$t('messages.weather')" @click="openWeatherModal(user)">
                    <img :src="cloudy" alt="" style="width: 30px;">
                </button>
            </td>
        </tr>
        </tbody>
    </table>
    <WeatherModal/>
</template>

<script lang="ts">
import cloudy from "@/assets/icons/cloudy.svg";
import emitter from "@/main";
import type {User} from "@/interfaces/User";
import WeatherModal from "@/components/WeatherModal.vue";

export default {
    name: "UsersRender",
    components: {WeatherModal},
    props: ['users'],
    data() {
        return {
            cloudy: cloudy,
        }
    },
    methods: {
        async openWeatherModal(user: User) {
            const url = `http://localhost/users/${user.id}`;
            let res = await (await fetch(url)).json();
            emitter.emit('open-weather', {user: res.user})
        }
    }
}
</script>

<style scoped>

</style>