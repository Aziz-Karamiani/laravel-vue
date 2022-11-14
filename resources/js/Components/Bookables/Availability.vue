<template>
    <div class="container">
        <div class="card">
            <div class="card-header">Availability</div>
            <div class="card-body">
                <form action="#" method="post" class="row">
                    <div class="form-group col-md-6 mb-1">
                        <label for="from" class="form-label">From</label>
                        <input type="text" class="form-control form-control-sm" id="from" v-model="from">
                    </div>
                    <div class="form-group col-md-6 mb-1">
                        <label for="to" class="form-label">To</label>
                        <input type="text" class="form-control form-control-sm" id="to" v-model="to">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block m-1 w-100">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
          from: null,
          to: null
        }
    }
}
</script>

<style>
</style>
