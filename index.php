<?php
		
	// Initialize the session
            session_start();
      
			
			// Include config file
			require_once "database/db_config.php";
			
			// Define variables and initialize with empty values
			$username = $password = "";
			$username_err = $password_err = "";
			
			// Processing form data when form is submitted
		 if(isset($_POST['login']) && $_POST['login'] == "login")
  {
			
				// Check if username is empty
				if(empty(trim($_POST["username"]))){
					$username_err = "Please enter username.";
				} else{
					$username = trim($_POST["username"]);
				}
				
				// Check if password is empty
				if(empty(trim($_POST["password"]))){
					$password_err = "Please enter your password.";
				} else{
					$password = trim($_POST["password"]);
				}
				
				// Validate credentials
				if(empty($username_err) && empty($password_err)){
					// Prepare a select statement
					$sql = "SELECT id,email,password,role FROM users WHERE email = ?";
					
					if($stmt = mysqli_prepare($db, $sql)){
						// Bind variables to the prepared statement as parameters
						mysqli_stmt_bind_param($stmt, "s", $param_username);
						
						// Set parameters
						$param_username = $username;
						
						// Attempt to execute the prepared statement
						if(mysqli_stmt_execute($stmt)){
							// Store result
							mysqli_stmt_store_result($stmt);
							
							// Check if username exists, if yes then verify password
							if(mysqli_stmt_num_rows($stmt) == 1){                    
								// Bind result variables
								mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$role);
								if(mysqli_stmt_fetch($stmt)){
									if($password === $hashed_password){
										// Password is correct, so start a new session
									
										// Store data in session variables
										$_SESSION["loggedin"] = true;
										$_SESSION["id"] = $id;
										$_SESSION["username"] = $username; 
										$_SESSION["role"] = $role;   
										
										// Redirect user to welcome page
										if($role === "Admin"){
										header("location: Admin/dashboardAdmin.php");
										exit();
										    
										}else if ($role === "Adminguest")
										{
										    header("location: dashboard.php");
										    exit;
										    
										}
										else if ($role === "Attendant")
										{
										    header("location: wahudumuView.php");
										    exit;	
										    
										}
										else if ($role === "mpishi")
										{
										    header("location: Admin/mpishi.php");
										    exit;	
										    
										}else{
										     header("location: wahudumuView.php");
										    exit;
										}
									} else{
										// Display an error message if password is not valid
										$password_err = "The password you entered was not valid.";
									}
								}
							} else{
								// Display an error message if username doesn't exist
								$username_err = "No account found with that username.";
							}
						} else{
							echo "Oops! Something went wrong. Please try again later.";
						}
					}
					
					// Close statement
				
				}
				
				// Close connection
				
			}
			?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - FOOD ORDER MANAGER</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Food Orders Managing System		
			</a>		
			
			<div class="nav-collapse">
				
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
				
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"">
					<label for="username">Email</label>
					<input type="text" id="username" name="username"  placeholder="xxx@system.com" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password"  placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button class="button btn btn-success btn-large" value="login" name="login">Sign In</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<div class="login-extra">
	<a href="#">Reset Password</a>
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>
