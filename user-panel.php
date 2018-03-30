<?php
    require('./templates/header.php');
    if(!checkLogin())
        redirect();
?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-8 col-lg-offset-2">
            <h3>User Panel</h3>
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
