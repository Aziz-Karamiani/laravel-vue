export default {
    state() {
        return {
            searchQuery: {
                from: null,
                to: null,
            }
        }
    },
    mutations: {
        saveQuery(state, sq) {
            state.searchQuery = sq;
        }
    },
    actions: {
        saveToLocalStorage (context, payload) {
            context.commit('saveQuery', payload);
            localStorage.setItem('saveQuery', JSON.stringify(payload));
        },
        getFromLocalStorage (context) {
            const lastSearch = localStorage.getItem('saveQuery');
            if (lastSearch) {
                context.commit('saveQuery', JSON.parse(lastSearch));
            }
        }
    }
}
