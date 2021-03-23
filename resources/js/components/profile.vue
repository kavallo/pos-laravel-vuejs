<template>
    <div>
        <!-- Main content -->
        <section class="content mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Profile Information </h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="profile" @keydown="form.onKeydown($event)">
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
                        <button type="submit" class="btn btn-primary" :disabled="form.busy">Save</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: new Form({
                name: this.$store.getters.auth.user.name,
                email: this.$store.getters.auth.user.email,
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        profile() {
            this.$store.dispatch('spinner', true)
            this.form.post('/login')
            .then(response => {
                AppStorage.storeToken(response.data.access_token)
                this.$store.dispatch('auth')
                this.$router.push({ name: 'home' })
                toastr.success('Successfully Logged In!')
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