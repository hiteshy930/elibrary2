<link rel="stylesheet" href="../google_signup/google_signup_card.css">
<?php
include '../database/db_conn.php';
 // Check if the form is submitted
 if ( isset( $_POST['signup'] ) ) {
    // retrieve the form data by using the element's name attributes value as key
    $name = $_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $conpass = $_POST['conpass'];
    if($pass!=$conpass)
    {
      echo '<script>alert("Password mismatched ! Try again.")</script>';
        header("Refresh:1; url=https://localhost/elibrary2/signup/signup.html");
    }else{
      //insert data to database
            $conn=OpenCon();
            $sql_u = "SELECT * FROM user WHERE name='$name'";
            	$sql_e = "SELECT * FROM user WHERE email='$email'";
            	$res_u = mysqli_query($conn, $sql_u);
            	$res_e = mysqli_query($conn, $sql_e);

            	if (mysqli_num_rows($res_u) > 0) {
            	  echo '<script>alert("sorry.. username already taken")</script>';
                // header("Location:../login/login.html");
                header("Refresh:0; url=https://localhost/elibrary2/signup/signup.html");
            	}else if(mysqli_num_rows($res_e) > 0){
            	  echo '<script>alert("sorry ... email already taken")</script>';
                  // header("Location:../login/login.html");
                  header("Refresh:1; url=https://localhost/elibrary2/signup/signup.html");
            	}else{
                      $query = "INSERT INTO user (name, email,password,conpass)
                           VALUES ('$name', '$email','$pass','$conpass')";
                      $results = mysqli_query($conn, $query);
                      echo "<div class='redirect_card'><h1>Congratulations!!!</br>Account created successfully !!</h1></br><img src='../google_signup/timer.gif'></img> <h3>You will be redirected to <b> login page</b> in next 5 seconds...</h3></div>";
                      header("Refresh:5; url=https://localhost/elibrary2/login/login.html");
                }
        }
      exit;
    }else{
      echo 'else executed';
    }
 ?>
