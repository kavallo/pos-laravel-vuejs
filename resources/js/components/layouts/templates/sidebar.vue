<template lang="">
    <div>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: linear-gradient(0deg, #000041 0%, rgba(19,28,117,0.74) 100%) !important;">
            <!-- Brand Logo -->
            <router-link :to="{ name: 'home' }" class="brand-link">
                <img src="#" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light font-weight-bold">POS</span>
            </router-link>

            <!-- Sidebar -->
            <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <router-link :to="{ name: 'home' }" class="nav-link" :class="{ 'active' : this.$route.name == 'home' }">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </router-link>
                </li>

                <!-- Profile -->
                <li class="nav-item">
                    <router-link :to="{ name: 'about' }" class="nav-link" :class="{ 'active' : this.$route.name == 'about' }">
                        <i class="nav-icon fa fa-user"></i>
                        <p>About</p>
                    </router-link>
                </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>