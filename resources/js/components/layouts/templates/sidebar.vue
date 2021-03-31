<template lang="">
    <div>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: linear-gradient(0deg, #000041 0%, rgba(19,28,117,0.74) 100%) !important;">
            <!-- Brand Logo -->
            <router-link :to="{ name: 'home' }" class="brand-link">
                <img src="/static-uploads/pos.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                            <router-link :to="{ name: 'profile' }" class="nav-link" :class="{ 'active' : this.$route.name == 'profile' }">
                                <i class="nav-icon fa fa-user"></i>
                                <p>Profile</p>
                            </router-link>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" :class="{ 'active' : this.$route.meta.groupName == 'category' }" href="#" id="category" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Category
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="dropdown-menu w-100" style="background: none;" aria-labelledby="category">
                                <li class="nav-item">
                                    <router-link :to="{ name: 'category.create' }" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                     <router-link :to="{ name: 'category.index' }" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category List</p>
                                    </router-link>
                                </li>
                            </ul>
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