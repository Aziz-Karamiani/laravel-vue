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
    }
}
