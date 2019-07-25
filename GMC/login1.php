<?php
include("connection.php");

session_start();

$username = $password = "";
$username_err = $password_err = "";
if($_SERVER['REQUEST_METHOD']=='POST'){

	if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT serial_no FROM field_engineer WHERE username = '$username' and password = '$password'";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                  
                        
                            
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin_fe"] = true;
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $password;                    
                            
                            // Redirect user to welcome page
                            header("location: approve_task.php");
                        } 
                    
                 else{
                    // Display an error message if username doesn't exist
                    $password_err = "Username or password is wrong.";
                    $username="";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
   
    // Close connection
    mysqli_close($link);
	/*$username=$link->real_escape_string($_POST['username']);
	$password=$link->real_escape_string($_POST['password']);
	$email=$link->real_escape_string($_POST['email']);
	$sql="SELECT * FROM users WHERE username='$username' and password ='$password'";
	$result=mysqli_query($database,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active=$row['active'];
	$count=mysqli_num_rows($result);
	if($count==1){
		session_register("Login successful");
	}
	else{
session_register("Invalid");
	}*/
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
   
    <title>login</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="login1.php" method="post">
                        <label>Username</label>
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
     <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username" value="<?php echo $username; ?>">
     <p class="help-block"><?php echo $username_err; ?></p>
    </div>
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
    <p class="help-block"><?php echo $password_err; ?></p>
</div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>