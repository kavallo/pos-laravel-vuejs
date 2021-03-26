<template>
    <div class="card-body">
        <p class="login-box-msg">Login to start your session</p>
        <alert-error v-if="form.errors.has('error')" :form="form" message=""></alert-error>

        <form @submit.prevent="login" @keydown="form.onKeydown($event)">

            <div class="input-group mb-3">
                <input type="email" v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <has-error :form="form" field="email"></has-error>
            </div>
            <div class="input-group mb-3">
                <input type="password" v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <has-error :form="form" field="password"></has-error>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="icheck-primary">
                        <router-link :to="{ name: 'forgotten.password' }">Forgotten Password?</router-link>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary btn-block" :disabled="form.busy">Login</button>
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
                password: ''
            })
        }
    },
    methods: {
        login() {
            this.$store.dispatch('spinner', true)
            this.form.post('/login')
            .then(response => {
                AppStorage.storeToken(response.data.access_token)
                this.$store.dispatch('auth')
                this.$router.push({ name: 'home' })
                this.$store.dispatch('spinner', false)
                swal('', 'Successfully Logged In!', 'success')
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