<template>
    <div>
        <div v-if="show_modal" class="modal fade show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display:block">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ title }}</h5>
                        <button type="button" @click="OpenCloseFun()" class="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ weather }}</h5>
                        <h6>{{ weather_description }}</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="OpenCloseFun()" class="btn btn-default">{{ $t('Close') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import emitter from "@/main";
import type {User} from "@/interfaces/User";

export default {
    name: 'WeatherModal',
    data() {
        return {
            show_modal: false,
            title: '',
            weather: '',
            weather_description: '',
        }
    },
    mounted() {
        emitter.on("open-weather", ((event: any) => {
            this.title = event.user.name;
            this.weather = event.user.weather;
            this.weather_description = event.user.weather_description;
            this.show_modal = true;
        }).bind(this));
    },
    methods: {
        OpenCloseFun() {
            this.show_modal = false;
        },
    },

}
</script>