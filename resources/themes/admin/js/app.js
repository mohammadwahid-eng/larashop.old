/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

import { createApp } from 'vue';

const app = createApp({});

app.component('product-metabox', require('./components/Product/MetaBox.vue').default);

app.mount("#app");
