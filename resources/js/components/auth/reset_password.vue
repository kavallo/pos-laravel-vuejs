<template>
    <div class="card-body">
        <p class="login-box-msg">Reset Password</p>
        <alert-error v-if="form.errors.has('error')" :form="form" message=""></alert-error>

        <form @submit.prevent="resetPassword" @keydown="form.onKeydown($event)">
            <div class="input-group mb-3">
                <input type="email" v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Eamil">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <has-error :form="form" field="email"></has-error>
            </div>
            <div class="input-group mb-3">
                <input type="password" v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="New Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <has-error :form="form" field="password"></has-error>
            </div>
            <div class="input-group mb-3">
                <input type="password" v-model="form.password_confirmation" class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" placeholder="Confirm Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="icheck-primary">
                        <router-link :to="{ name: 'login' }">Back to Login</router-link>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary btn-block" :disabled="form.busy">Reset</button>
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
                email: this.$route.query.email,
                token: this.$route.params.token,
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        resetPassword() {
            this.$store.dispatch('spinner', true)
            this.form.post('/reset-password')
            .then(response => {
                this.$router.push({ name: 'login' })
                this.$store.dispatch('spinner', false)
                swal('', `${response.data.status} Now, Log In.`, 'success')
            })
            .catch(error => {
                this.$store.dispatch('spinner', false)
                swal('', 'Something Went Wrong!', 'error')
            })
        }
    }
}
</script>
<style>
    
</style>