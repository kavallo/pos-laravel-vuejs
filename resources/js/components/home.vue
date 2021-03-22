<template>
    <div>
        <!-- Main content -->
        <section class="content mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Dashboard Short Overview </h3>
                </div>
                <div class="card-body">
                    <h2>Welcome to Dashboard</h2>
                    <p>Congratulations, {{ this.$store.getters.auth.user.name }}!</p>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
</template>
<script>
export default {

}
</script>
<style>
    
</style>