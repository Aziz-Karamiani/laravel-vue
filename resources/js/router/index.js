import Bookables from "../Components/Bookables/Bookables.vue";
import Bookable from "../Components/Bookables/Bookable.vue";
import Review from "../Components/Review/Review.vue";
import Basket from "../Components/Basket.vue";
import {createRouter, createWebHistory} from 'vue-router'

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
    },
    {
        'path': '/reviews/:review',
        'component': Review,
        'name': "review"
    },
    {
        'path': '/basket',
        'component': Basket,
        'name': "basket"
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

export default router
