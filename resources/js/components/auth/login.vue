<template>
    <div class="login-page">
        <div class="login-box">
            <div class="card card-outline card-primary mb-1">
                <div class="card-header text-center">
                    <a href="#">
                    <img src="#" alt="POS" width="50" height="50" class="d-inline-block align-top">
                    <span class="h1 font-weight-bold"> POS </span>
                    </a>
                </div>
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
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary btn-block" :disabled="form.busy">Login</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-1">
                        <a href="#">I forgot my password</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: new Form({
                email: '',
                password: '',
                remember: false
            })
        }
    },
    methods: {
        login() {
            this.form.post('/api/auth/login')
            .then(response => {
                AppStorage.store_token(response.data.access_token)
                this.$router.push({ name: 'home' })
                toastr.success('Logged In.')
            })
            .catch(error => {
                
            })
        }
    }
}
</script>
<style>
    
</style>