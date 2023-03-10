import "bootstrap/dist/css/bootstrap.min.css";

import {createApp} from "vue";
import {createI18n} from 'vue-i18n'
import {createPinia} from "pinia";


import App from "./App.vue";
import router from "./router";
import mitt from "mitt";

import en_messages from "./lang/en/messages.json";

import "./assets/main.css";

const messages = {
    en: {
        messages: en_messages
    }
}

const i18n = createI18n({
    locale: 'en',
    fallbackLocale: 'en',
    messages
})

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.use(i18n);

const emitter = mitt();
export default emitter;

app.mount("#app");

import "bootstrap/dist/js/bootstrap.js";