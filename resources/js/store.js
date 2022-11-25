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
        },
        removeFromBasket(state, payload) {
            state.basket.items = state.basket.items.filter(item => item.bookable.id !== payload.id);
        }
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
