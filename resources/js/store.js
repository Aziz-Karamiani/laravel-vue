export default {
    state() {
        return {
            searchQuery: {
                from: null,
                to: null,
            },
            basket: {
                items: [],
            }
        }
    },
    mutations: {
        saveQuery(state, sq) {
            state.searchQuery = sq;
        },
        addToBasket(state, payload) {
            state.basket.items.push(payload);
            localStorage.setItem('basket', JSON.stringify(state.basket));
        },
        removeFromBasket(state, payload) {
            state.basket.items = state.basket.items.filter(item => item.bookable.id !== payload.id);
        },
        setBasket(state, payload) {
            state.basket = payload;
        },
    },
    actions: {
        saveToLocalStorage(context, payload) {
            context.commit('saveQuery', payload);
            localStorage.setItem('saveQuery', JSON.stringify(payload));
        },
        getFromLocalStorage(context) {
            const lastSearch = localStorage.getItem('saveQuery');
            if (lastSearch) {
                context.commit('saveQuery', JSON.parse(lastSearch));
            }

            const basket = localStorage.getItem('basket');
            if (basket) {
                context.commit('setBasket', JSON.parse(basket));
            }
        },
        addToBasket(context, payload) {
            context.commit('addToBasket', payload);
        },
        removeFromBasket(context, payload) {
            context.commit('removeFromBasket', payload);
        }
    },
    getters: {
        itemInBasket(state) {
            return state.basket.items.length
        }
    }
}
