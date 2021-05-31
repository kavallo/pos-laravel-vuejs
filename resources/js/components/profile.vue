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
                        <alert-error v-if="form.errors.has('error')" :form="form" message=""></alert-error>
                        <div v-if="this.photoUrl" class="input-group mb-3">
                            <img :src="this.photoUrl" :alt="this.$store.getters.auth.user.name" style="height: 200px; max-width: 100%;">
                        </div>
                        <div class="form-group">
                            <label> Photo </label>
                            <input type="file" @change="profilePhoto" class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
                            <has-error :form="form" field="photo"></has-error>
                        </div>
                        <div class="form-group">
                            <label> Name <span class="text-danger">*</span> </label>
                            <input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Name">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <label> Email <span class="text-danger">*</span> </label>
                            <input type="email" v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Email">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <p>If you want to change password, Fill in these password field.</p>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label> Old Password </label>
                                    <input type="password" v-model="form.old_password" class="form-control" :class="{ 'is-invalid': form.errors.has('old_password') }" placeholder="Old Password">
                                    <has-error :form="form" field="old_password"></has-error>
                                </div>
                                <div class="form-group">
                                    <label> New Password </label>
                                    <input type="password" v-model="form.new_password" class="form-control" :class="{ 'is-invalid': form.errors.has('new_password') }" placeholder="New Password">
                                    <has-error :form="form" field="new_password"></has-error>
                                </div>
                                <div class="form-group">
                                    <label> Confirm Password </label>
                                    <input type="password" v-model="form.new_password_confirmation" class="form-control" placeholder="Confirm Password">
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
                photo: '',
                name: this.$store.getters.auth.user.name,
                email: this.$store.getters.auth.user.email,
                old_password: '',
                new_password: '',
                new_password_confirmation: '',
            }),
            photoUrl: this.$store.getters.auth.user.photo ? `${AppStorage.appUrl}/${this.$store.getters.auth.user.photo}` : '',
            progress: ''
        }
    },
    methods: {
        profilePhoto(e) {
            this.form.photo = e.target.files[0]
            this.photoUrl = URL.createObjectURL(this.form.photo)
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
                this.$store.dispatch('spinner', false)
                swal('', response.data.status, 'success')
                this.form.old_password = 
                this.form.new_password = 
                this.form.new_password_confirmation = 
                this.form.photo = ''
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