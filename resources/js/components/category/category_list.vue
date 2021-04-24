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
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr  v-for="category in category_list" :key="category.id">
                                <td> {{ category.name }} </td>
                                <td> {{ category.name }} </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-align-left"></i>
                                        </a>
                                    
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="">Edit</a>
                                        <a id="confirm" class="dropdown-item" href="">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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