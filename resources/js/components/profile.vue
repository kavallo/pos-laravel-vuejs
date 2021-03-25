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
                        <alert-error v-if="form.errors.has('error')" :form="form" message="">Something went wrong!</alert-error>
                        <alert-success :form="form" message=""> {{ message }} </alert-success>

                        <div v-if="this.$store.getters.auth.user.photo" class="input-group mb-3">
                            <img :src="photoUrl" :alt="this.$store.getters.auth.user.name" style="height: 200px; max-width: 100%;">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" @change="profilePhoto" class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </div>
                            </div>
                            <has-error :form="form" field="photo"></has-error>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </div>
                            </div>
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <p>If you want to change password, Fill in these password field.</p>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <input type="password" v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('old_password') }" placeholder="Old Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    <has-error :form="form" field="old_password"></has-error>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('new_password') }" placeholder="New Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    <has-error :form="form" field="new_password"></has-error>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" v-model="form.new_password_confirmation" class="form-control" :class="{ 'is-invalid': form.errors.has('new_password_confirmation') }" placeholder="Confirm Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
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
                _method: 'put',
                photo: null,
                name: this.$store.getters.auth.user.name,
                email: this.$store.getters.auth.user.email,
                old_password: '',
                new_password: '',
                new_password_confirmation: '',
            }),
            photoUrl: `${appUrl}/${this.$store.getters.auth.user.photo}`,
            progress: '',
            message: '',
        }
    },
    methods: {
        profilePhoto(e) {
            this.form.photo = e.target.files[0]
        },

        profile() {
            this.$store.dispatch('spinner', true)
            this.form.post('/profile', {
                // object to formdata
                transformRequest: (data, headers) => serialize(data),
                // progress in %
                onUploadProgress: e => {
                    this.progress = Math.round( (e.loaded * 100) / e.total )
                }
            })
            .then(response => {
                this.$store.dispatch('auth')
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