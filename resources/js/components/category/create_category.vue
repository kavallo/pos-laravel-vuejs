<template>
    <div>
        <!-- Main content -->
        <section class="content mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Add New Category </h3>
                    <router-link :to="{ name: 'category.index' }" class="btn btn-sm btn-primary float-right">
                        Category List
                    </router-link>
                </div>
                <div class="card-body">
                    <form @submit.prevent="createCategory" @keydown="form.onKeydown($event)">
                        <alert-error v-if="form.errors.has('error')" :form="form" message=""></alert-error>
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select class="form-control">
                                <option selected disabled value="">Select a Category</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category Name <span class="text-danger">*</span> </label>
                            <input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Category Name">
                            <has-error :form="form" field="name"></has-error>
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
                parent_id: '',
                name: ''
            }),
        }
    },
    methods: {
        categories() {

        },
        createCategory() {
            this.$store.dispatch('spinner', true)
            this.form.post('/profile')
            .then(response => {
                this.$store.dispatch('spinner', false)
                this.$router.push({ name: 'category.index' })
                swal('', response.data.status, 'success')
            })
            .catch(error => {
                this.$store.dispatch('spinner', false)
                swal('', 'Something Went Wrong!', 'error')
            })
        }
    },
    mounted() {

    }
}
</script>
<style>
    
</style>