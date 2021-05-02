<template lang="">
    <div>
        <!-- loading spinner -->
        <!-- <spinner v-if="this.$store.getters.spinner"></spinner> -->

        <div class="wrapper" v-if="this.$store.getters.auth.check">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-primary" style="background-image: linear-gradient(0deg, #000041 0%, rgba(19,28,117,0.74) 100%);">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                <!-- Profile Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a @click.prevent="logout" class="nav-link" href=""> <i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>

                </ul>
            </nav>
            <!-- /.navbar -->

            <side-bar></side-bar>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- component matched by the route will render here -->
                <router-view></router-view>
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer bg-dark" style="background-image: linear-gradient(0deg, #000041 0%, rgba(19,28,117,0.74) 100%) !important;">
                <div class="container">
                <!-- To the right -->
                <div class="float-md-right text-white">
                    Developed By <a href="https://facebook.com/abdulmajidcse/" target="_blank" class="text-white font-weight-bold border-bottom text-uppercase"> Abdul Majid </a>
                </div>
                <!-- Default to the left -->
                <span> 2021 &copy; All Rights Reserved by POS.</span>
                </div>
            </footer>
        </div>
        <div v-else>
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
// import Spinner from '../spinner'
import Sidebar from './templates/sidebar'
export default {
    methods: {
        logout() {
            axios.post('/logout')
            .then(response => {
               this.$store.dispatch('logout')
                this.$router.push({ name: 'login' })
            })
            .catch(error => {
                this.$store.dispatch('logout')
                this.$router.push({ name: 'login' })
            })
        },
    },
    created() {
        this.$store.dispatch('auth')
    },
    components: {
        'side-bar': Sidebar,
        // 'spinner' : Spinner
    }
}
</script>
<style lang="">
    
</style>