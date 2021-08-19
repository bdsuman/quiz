<?php
session_start();
if(isset($_SESSION['uid']))
{
	header('location:home/');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/startmin.css" rel="stylesheet">
		<link rel="stylesheet" href="css/sweetalert.css">
		<script src="js/sweetalert.min.js"></script>
        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>
		<br>
		<br>
		<br>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-green">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" role="form">
                                <fieldset>
									<div align="center">		
									<img src="home/img/bank.png" class="img-rounded">
									</div>
                                    <div class="form-group input-group">
									<span class="input-group-addon">@</span>
                                        <input class="form-control" placeholder="username" name="uname" type="text" autofocus>
                                    </div>
                                    <div class="form-group input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" placeholder="Password" name="pass" type="password">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                   
								<button type="submit" name="login" class="btn btn-lg btn-primary btn-block"><i class="fa fa-sign-in fa-fw"></i> Login</button>
                                   
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </body>
</html>
<!-- hhghg -->




<?php
require_once "home/includes/config.php";
if(isset($_POST['login']))
{
$username = mysqli_real_escape_string($link,$_POST['uname']);
$password = mysqli_real_escape_string($link,$_POST['pass']);
$username = stripslashes($username);
$password = stripslashes($password);
$qry="SELECT * FROM `users` WHERE username='$username' AND password='$password' AND status='Active' Limit 1 ";	
$run=mysqli_query($link,$qry); 
$row =mysqli_num_rows($run);
if($row<1)
{
	echo "<script type='text/javascript'>
 swal({
      title: 'Warning!!!',
      text: 'Username or Password not match.',
      type: 'error'
    },
    function(){
		window.open('index.php','_self')
    });
		</script> ";
}
else 
{
	if($data=mysqli_fetch_assoc($run)){
	$user=$data['username'];
	$role=$data['role'];
	$_SESSION['uname']=$user;
	$_SESSION['role']=$role;
	header('location: home/');
	}
}
}

?>
