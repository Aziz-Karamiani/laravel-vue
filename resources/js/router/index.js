import Bookables from "../Components/Bookables/Bookables.vue";
import Bookable from "../Components/Bookables/Bookable.vue";
import { createRouter,createWebHistory} from 'vue-router'

const routes = [
    {
        'path': '/',
        'component': Bookables,
        'name': "bookables"
    },
    {
        'path': '/bookables/:bookable',
        'component': Bookable,
        'name': "bookable"
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

export default router
