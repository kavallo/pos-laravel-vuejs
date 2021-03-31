<template>
    <div>
        <!-- Main content -->
        <section class="content mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Category List </h3>
                    <router-link :to="{ name: 'categories.create' }" class="btn btn-sm btn-primary float-right">
                        Add New
                    </router-link>
                </div>
                <div class="card-body">
                    Category List
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
            category_list: '',
        }
    },
    methods: {
        
        categories() {
            axios.get('/categories')
            .then(response => {
                this.category_list = response.data.data
            })
        },
    },
    mounted() {
        this.categories()
    }
}
</script>
<style>
    
</style>