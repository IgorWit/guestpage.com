<?php
/**
 * Created by PhpStorm.
 * User: Daisy
 * Date: 3/20/2019
 * Time: 10:29 PM
 */
session_start();
if(isset($_SESSION['user_session'])!="")
{
	header("Location: homepage.php");
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>Login Form</title>
</head>
<body>
<div class="signin-form">
	<div class="container small-container">
       <form class="form-signin" method="post" id="login-form">
        <h2 class="form-signin-heading">Log In</h2><hr />
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
        <span id="check-e"></span>
        </div>
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
     	<hr />
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="btn-login" id="btn-login">
    		<i class="fa fa-lock" aria-hidden="true"></i> &nbsp; Sign In
			</button> 
        </div>
      </form>
    </div>
</div>
    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/ee309940e2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>