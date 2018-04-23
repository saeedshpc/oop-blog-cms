<?php
    require('./templates/header.php');

    (new \App\Controller\MemberController())->changePassword();
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
            <h3>Change Password</h3>
        </div>
        <div class="panel-body">
            <form action="/user-panel.php" method="POST">

                <div class="form-item">
                    <label for="old_password">Old Password</label>
                    <input type="password" id="old_password" name="old_password" placeholder="Old Password...">
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
                    <button type="submit">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require("./templates/footer.php"); ?>
