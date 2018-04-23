<?php
require("./templates/header.php");
$user = new \App\Controller\UserController();
$user->register();

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
                    <h3>Register Page</h3>
                </div>
                <div class="panel-body">
                    <form action="/register.php" method="POST">
                        <div class="form-item">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Your name..." value="<?= old('name') ?>">
                        </div>
                        <div class="form-item">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Email..." value="<?= old('email')?>">
                        </div>
                        <div class="form-item">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password...">
                        </div>
                        <div class="form-item">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Retype Password...">
                        </div>
                        <div class="form-item">
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
<?php require("./templates/footer.php"); ?>