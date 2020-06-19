<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link href='https://fonts.googleapis.com/css?family=Aleo' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bungee Shade" >
    <link rel="stylesheet" href="../dashboard/dashboard.css">
    <title></title>

  </head>
  <body>

    <?php
      include ('../google_login/config.php');


      ?>
    <div class="header">
      <div class="logo">
        <a href="index.html"><img style="width:100px; height:80px;" src="../elib_logo.jpg" alt=""></a>
      </div>
      <div class="menu">
        <ul>
          <li><a href="../index.html">Home</a> </li>
          <li><a href="../About us\aboutus.html">About Us</a> </li>
          <li><a href="../contactus\contactus.html">Contact Us</a> </li>
          <li><a href="../dashboard/dashboard.php"><?php echo 'Hi ! '.$_SESSION['user_first_name'].'<img src='.$_SESSION["user_image"].'>'; ?></a></li>
          <li><a href="../google_login/logout.php">Logout</a></li>
        </ul>
      </div>
    </div>

    <div class="front_div">

      <?php

        //for loop to generate cards for each entry into SQLiteDatabase
        //create a function to see list of all user
        // function see_book_list($conn){
        include '../database/db_conn.php';
        $conn=OpenCon();


                            $query="select * from books";
                            $result=$conn->query($query);
                            $count=0;
                            if ($result->num_rows > 0) {
                                echo "";
                              //  echo "<table><tr><th>Name</th><th>Author name</th><th>Edition</th><th>Publish-Year</th><th>Book_image</th></tr>";


                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                  // $sql = "select book_image from books;"
                                  // $res = mysqli_query($conn,$sql);
                                  // $row = mysqli_fetch_array($res);

                                  $image = $row['book_image'];
                                  $image_src = "../book/book_images/".$image;
                                  $fileurl=$row['book_url'];

                            echo '<div class="card">'
                            // we can make below div tag dynamic mark it new or not
                                  .'<div style="background-color: red; width:50px;"><p>&emsp13;New</p></div>
                                    <img class="card-img-top" src='.$image_src.'>
                                        <div class="card-body">
                                              <h3 class="card-title">'.$row["book_name"].' : '.$row["book_id"].'</h3>
                                                  <p class="card-text"><b>'.$row["book_name"].'</b> edition '.$row["book_edition"].' written by<b> '.$row["author_name"].'</b> published in '.$row["publish_year"].'.</br></br>Read it out:</p>
                                                  </br> <a href=https://localhost/elibrary2/'.$row["book_url"].' class="btn-primary">Start Reading</a>
                                        </div>
                                  </div>';

                                  $count++;
                                }
                                echo "</table>";
                                } else {
                                echo "0 results";
                              }

                              echo '<div class="dashboard_console">
                              <h2>&emsp13;Total Books we have till now : '.$count.'&emsp13;</h2>
                              </div>';
          // }


       ?>




    <div class="footer">

        <div id="footer_div1">
          <ul class="footer_ul">
            <li class="footer_li"><img src="../footer/home_footer.png" alt=""><a href="index.html">Home</a> </li>
            <li class="footer_li"><img src="../footer/About_footer.png" alt=""><a href="About us\aboutus.html">About Us</a> </li>
            <li class="footer_li"><img src="../footer/news_footer.png" alt=""><a href="">News Letter</a> </li>
            <li class="footer_li"><img src="../footer/contact_footer.png" alt=""><a href="contactus\contactus.html">Contact Us</a></li>
          </ul>
        </div>
        <div id="footer_div2" >
          <ul class="footer_ul">
            <li class="footer_li" style="color: white;">Links with me: </li>
            <li class="footer_li"><img src="../footer/linkedin.png" alt=""> <a href="https://www.linkedin.com/in/hitesh-yadav-063096b8/">: Follow on LinkedIn</a> </li>
            <li class="footer_li"><img src="../footer/HE_logo.png" alt=""> <a href="https://www.hackerearth.com/@hiteshy930">: Follow on HackerEarth</a> </li>
            <li class="footer_li"><img src="../footer/HR_logo.png" alt=""> <a href="https://www.hackerrank.com/hiteshy930">: Follow on HackerRank</a> </li>
          </ul>
        </div>

    </div>


  </body>

</html>
