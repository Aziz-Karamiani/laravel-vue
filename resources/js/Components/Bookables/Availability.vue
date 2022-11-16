<template>
    <div>
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Check Availability
            <span v-if="noAvailability" class="text-danger">(NOT AVAILABLE)</span>
            <span v-if="hasAvailability" class="text-success">(AVAILABLE)</span>
        </h6>
        <div class="card">
            <div class="card-body">
                <form action="#" method="post" class="row">
                    <div class="form-group col-md-6 mb-1">
                        <label for="from" class="form-label">From</label>
                        <input type="text" class="form-control form-control-sm" id="from" v-model="from"
                               placeholder="Start date"
                               :class="[{'is-invalid': errorFor('from')}]">
                        <div class="invalid-feedback"
                             v-for="(error, index) in this.errorFor('from')"
                             :key="'from' + index">{{ error }}
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-1">
                        <label for="to" class="form-label">To</label>
                        <input type="text" class="form-control form-control-sm" id="to" v-model="to"
                               placeholder="End date"
                               :class="[{'is-invalid': errorFor('to')}]">
                        <div class="invalid-feedback"
                             v-for="(error, index) in this.errorFor('to')"
                             :key="'to' + index">{{ error }}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block m-1 w-100" @click="check"
                            :disabled="loading">Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        bookableId: String,
    },
    data() {
        return {
            from: null,
            to: null,
            loading: false,
            status: null,
            errors: null
        }
    },
    methods: {
        check() {
            this.loading = true;
            this.errors = null;
            axios
                .get(
                    `/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`
                )
                .then(response => {
                    this.status = response.status;
                })
                .catch(error => {
                    if (422 === error.response.status) {
                        this.errors = error.response.data.errors;
                    }
                    this.status = error.response.status;
                })
                .then(() => (this.loading = false));
        },
        errorFor(field) {
            return this.hasErrors && this.errors[field] ? this.errors[field] : null;
        }
    },
    computed: {
        hasErrors() {
            return 422 === this.status && this.errors !== null;
        },
        hasAvailability() {
            return 200 === this.status;
        },
        noAvailability() {
            return 404 === this.status;
        }
    }
}
</script>

<style scoped>
label {
    font-size: 0.7rem;
    text-transform: uppercase;
    color: gray;
    font-weight: bolder;
}

.is-invalid {
    border-color: #b22222;
    background-image: none;
}

.invalid-feedback {
    color: #b22222;
}
</style>
