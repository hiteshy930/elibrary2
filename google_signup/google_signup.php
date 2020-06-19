<link rel="stylesheet" href="../google_signup/google_signup_card.css">
<?php
require_once '../vendor/autoload.php';
include '../database/db_conn.php';

// init configuration
$clientID = '188251814450-qdot7pflbs4ao5oo8tfke8cb885v5rvu.apps.googleusercontent.com';
$clientSecret = 'x_oUhZ6gEfX5jSqJtzKPpGGn';
$redirectUri = 'https://localhost/elibrary2/google_signup/google_signup.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  session_start();
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  $_SESSION['user_first_name']=$name;
  $_SESSION['email']=$email;
  $conn=OpenCon();

  $sql_u = "SELECT * FROM user WHERE username='$name'";
  	$sql_e = "SELECT * FROM user WHERE email='$email'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  echo '<script>alert("sorry.. username already taken")</script>';
      header("Location:../login/login.html");
  	}else if(mysqli_num_rows($res_e) > 0){
  	  echo '<script>alert("sorry ... email already taken")</script>';
        header("Location:../login/login.html");
  	}else{
           $query = "INSERT INTO user (name, email,password,conpass)
      	    	  VALUES ('$name', '$email','$name@123','$name@123')";
           $results = mysqli_query($conn, $query);

              echo "<div class='redirect_card'><h1>Account created successfully !!</br>Your Password is : 'username'@123</h1></br><img src='timer.gif'></img> <h3>You will be redirected to dashboard in next 5 seconds...</h3></div>";
              header("Refresh:5; url=https://localhost/elibrary2/dashboard/dashboard.php");

  	    }



  // now you can use this profile info to create account in your website and make user logged in.
} else {
    echo '<h4 align="center">click below link to continue...</h4>';
  echo ' <div align="center"><a href='.$client->createAuthUrl().'>Google signup</a>';
}
?>
