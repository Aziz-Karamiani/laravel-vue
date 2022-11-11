import App from '../Components/App.vue';
import About from '../Components/About.vue';
import Bookables from "../Components/Bookables/Bookables.vue";
import { createRouter,createWebHistory} from 'vue-router'

const routes = [
    {
        'path': '/',
        'component': App,
        'name': 'main'
    },
    {
        'path': '/about',
        'component': About,
        'name': "about"
    },
    {
        'path': '/bookables',
        'component': Bookables,
        'name': "bookables"
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

export default router
