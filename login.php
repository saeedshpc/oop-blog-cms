<?php
    require('./templates/header.php');
    $user = new \App\Controller\UserController();
    $user->login();
?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-8 col-lg-offset-2">

            <?php
                if($flash->hasMessages($flash::ERROR)) {
                    $flash->display();
                }
            ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login Page</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <form class="form-horizontal" action="/login.php" method="post">
                                <div class="form-group">
                                    <label >Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email ..." value="<?= old('email') ?>">
                                </div>
                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password ..." value="<?= old('password') ?>">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->
