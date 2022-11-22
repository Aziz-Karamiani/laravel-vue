import './bootstrap';
import {createApp} from 'vue';
import { createStore } from 'vuex'
import Index from './Components/Index.vue'
import router from './router/index.js';
import s from './store.js'

const store = createStore(s);

createApp({
    components: {
        Index
    }
}).use(router).use(store).mount("#app");
