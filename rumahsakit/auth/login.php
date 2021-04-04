<?php 
require_once '../_config/config.php';

if(isset($_SESSION['user'])):
    echo "
    <script>window.location='".base_url()."';</script>
";
else:
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Rumah Sakit</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>/_assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div align="center" style="margin-top: 25rem;">
                    <?php  

                        if(isset($_POST['login'])){
                            $user = trim(mysqli_real_escape_string($con, $_POST['username']));
                            $pass = sha1(mysqli_real_escape_string($con, $_POST['password']));
                            $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND PASSWORD = '$pass'") or die (mysqli_error($con));
                            if(mysqli_num_rows($sql_login) > 0){
                                $_SESSION['user'] = $user;
                                echo "
                                    <script>
                                        window.location='".base_url()."'
                                    </script>
                                ";
                            }else{
                                $alert=true;
                            }
                        }

                    ?>

                    <?php if (isset($alert)) { ?>
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="alert alert-danger">
                                    <a href="" class="close" data-dismis="alert" aria-label="close">&times;</a>
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">
                                        <strong>Login gagal</strong> Username / Password salah
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <form action="" method="post" class="navbar-form">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" name="username" class="form-control" placeholder="Username" autofocus="on" required>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="input-group">
                            <button class="btn btn-secondary" type="submit" name="login">Login</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>

<?php endif; ?>