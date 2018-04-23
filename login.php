<?php
    require('./templates/header.php');
    $user = new \App\Controller\UserController();
    $user->login();
?>

<div id="content">
    <div class="errors-area">

        <?php
        if ($flash->hasMessages($flash::ERROR)) {
            $flash->display();
        }
        ?>

    </div>

    <div class="panel">
        <div class="panel-header">
            <h3>Login Page</h3>
        </div>
        <div class="panel-body">
            <form action="/login.php" method="POST">

                <div class="form-item">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email..." value="<?= old('email')?>">
                </div>
                <div class="form-item">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password...">
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>

                <div class="form-item">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require("./templates/footer.php"); ?>
