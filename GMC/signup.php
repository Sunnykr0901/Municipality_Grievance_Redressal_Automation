<?php
include("connection.php");
session_start();
$username = $password = $address = $phone_no = "";
$username_err = $password_err = $address_err = $phone_no_err = "";
if($_SERVER['REQUEST_METHOD']=='POST'){

	if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    }
    else{
    	$sql = "SELECT username FROM citizen WHERE username = ?";
    	if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter your address.";   
    }
    else{
    	$address=trim($_POST["address"]);
    }
    if(empty(trim($_POST["phone_no"]))){
        $phone_no_err = "Please enter your mobile no.";   
    }
    else{
    	$phone_no=trim($_POST["phone_no"]);
    }
    if(empty($username_err) && empty($password_err) && empty($address_err) && empty($phone_no_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO citizen (username, password,address,phone_no,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11,c12,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12) VALUES (?, ?,?,?,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password,$param_address,$param_phone_no);
            
            // Set parameters
            
            $param_username = $username;
            $param_password = $password;
            $param_address = $address;
            $param_phone_no = $phone_no;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
               $_SESSION["loggedin_citizen"] = true;
               $_SESSION["username"] = $username;
                header("location: track.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
	/*$username=$link->real_escape_string($_POST['username']);
	$password=$link->real_escape_string($_POST['password']);
	$address=$link->real_escape_string($_POST['address']);
	$phone_no=$link->real_escape_string($_POST['phone_no']);
	if($username !="" || $password!="" || $address!="" || $phone_no!="" )
	{
		$sql="INSERT INTO citizen(username,password,address,phone_no) VALUES('$username','$password','$address','$phone_no')";
		if($link->query($sql)==true)
		$_SESSION['message']="Signup Successful";
	}
	else
		$_SESSION['message']="Fuck off";*/
	
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
                    <form action="signup.php" method="post">
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
<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
    <label>Address</label>
    <input type="address" name="address" id="address" class="form-control input-sm" placeholder="Address" value="<?php echo $address; ?>">
    <span class="help-block"><?php echo $address_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($phone_no_err)) ? 'has-error' : ''; ?>">
        <label>Phone No</label>
    <input type="phone_no" name="phone_no" id="phone_no" class="form-control input-sm" placeholder="Mobile No" value="<?php echo $phone_no; ?>">
    <span class="help-block"><?php echo $phone_no_err; ?></span>
    </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">SIGN UP</button>
                        
                        <div class="text-center"> Already Have an Account ?
  <a href="/GMC/login.php" class=""><span style="color: green;">Login</span></a>
</div>
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
