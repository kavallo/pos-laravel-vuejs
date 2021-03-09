<template>
    <div class="login-page">
        <div class="login-box">
            <div class="card card-outline card-primary mb-1">
                <div class="card-header text-center">
                    <a href="#">
                    <img src="#" alt="POS" width="50" height="50" class="d-inline-block align-top">
                    <span class="h1 font-weight-bold"> POS </span>
                    </a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Login to start your session</p>
    
                    <form method="POST" action="#">

                        <div class="input-group mb-3">
                            <input type="email" class="form-control"  required autocomplete="email" autofocus placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" autocomplete="current-password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-1">
                        <a href="#">I forgot my password</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style>
    
</style>