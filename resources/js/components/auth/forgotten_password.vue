<template>
    <div class="card-body">
        <p class="login-box-msg">Forgotten Password?</p>
        <alert-error v-if="form.errors.has('error')" :form="form" message="">Something went wrong!</alert-error>
        <alert-success :form="form" message=""> {{ message }} </alert-success>

        <form @submit.prevent="forgotPassword" @keydown="form.onKeydown($event)">

            <div class="input-group mb-3">
                <input type="email" v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <has-error :form="form" field="email"></has-error>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="icheck-primary">
                        <router-link :to="{ name: 'login' }">Back to Login</router-link>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary btn-block" :disabled="form.busy">Next</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: new Form({
                email: '',
                url: `${appUrl}/auth/reset-password`
            }),
            message: ''
        }
    },
    methods: {
        forgotPassword() {
            this.$store.dispatch('spinner', true)
            this.form.post('/forgot-password')
            .then(response => {
                this.message = response.data.status
                this.$store.dispatch('spinner', false)
            })
            .catch(error => {
                this.$store.dispatch('spinner', false)
            })
        }
    }
}
</script>
<style>
    
</style>