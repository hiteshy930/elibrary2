<?php
 // Check if the form is submitted
 include ('../database/db_conn.php');
 $conn=OpenCon();
 if ( isset( $_POST['login'] ) ) {
    // retrieve the form data by using the element's name attributes value as key
    $firstname = $_POST['username'];
    $pass = $_POST['password'];


     // display the results
     echo '<h3>Form GET Method</h3>';
    //  echo 'Your name is ' . $email . ' ' . $password;
      if($firstname=='admin' && $pass=='admin'){
        session_start();
        $blankimage="../login/blank_img.png";
        $_SESSION['user_image']=$blankimage;
        $_SESSION['user_first_name']=$firstname;

        header("Location: ../admin/admin.php");
      }
      else{
        //get username and password from table
        $sql = "SELECT * from user where email = '$firstname' and password = '$pass'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count == 1){
                echo "<h1><center> Login successful </center></h1>";
                session_start();
                $_SESSION['user_first_name']=$row['name'];
                $_SESSION['user_image']="../login/blank_img.png";
                header("Location: ../dashboard/dashboard.php");
            }
            else{
                echo "<h1> Login failed. Invalid username or password.</h1>";
            }
        }
      exit;
    }
 ?>
