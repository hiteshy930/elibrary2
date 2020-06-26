<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link href='https://fonts.googleapis.com/css?family=Aleo' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bungee Shade" >
    <link rel="stylesheet" href="../dashboard/dashboard.css">
    <link rel="stylesheet" href="../index.css">
    <title></title>


  </head>
  <body>

    <?php
      include ('../google_login/config.php');


      ?>
    <div class="header">
      <div class="logo">
        <a href="../index.html"><img style="width:100px; height:80px;" src="../elib_logo.jpg" alt=""></a>
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
        // dashboard_search
        echo '</br><div class="dashboard_search">
            <form method="GET">
            <div class="form_search">
                   <input type="text" name="book_search" value="" placeholder="Search all books" autofocus>
                   <input type="submit" name="search" value="Search">
                   <input type="submit" name="all_books" value="All Books">
            </div>
            </form>
        </div>';

        echo '<div class="div_category"><form method="POST">
                <select name="category">
                <option value="select">Select Category</option>
                <option value="Inspiration">Inspiration</option>
                <option value="Romance">Romance</option>
                <option value="Thrill">Thrill</option>
                <option value="Personal">Personal Development</option>
                <option value="Story">Story</option>
                  <option value="Computer">Computer</option>

                </select>
                <input type="submit" name="submit_category" value="Find Books" />
              </form>
            </div>';

        function send_user_data_php($conn,$book_id,$username){
                  $query="INSERT INTO readby (book_id,username) VALUES ('$book_id','$username')";
                  $results=$conn->query($query);
                  if ($results === TRUE) {
                    echo "insert into readby successfully";
                  } else {
                    echo "Error: " . $results . "<br>" . $conn->error;
                  }
        }
        function readByUser($conn,$book_id){
                    $query="SELECT * from readby where book_id='$book_id'";

                    $result=$conn->query($query);
                    if ($result->num_rows > 0) {
                            // output data of each row
                              while($row = $result->fetch_assoc()) {

                                      return $row["username"];

                              }
                        } else {
                        return 'None' ;
                      }
        }
        function display_books($conn,$query){
                    $result=$conn->query($query);
                    if ($result->num_rows > 0) {
                        echo "</br></br></br></br>";
                      //  echo "<table><tr><th>Name</th><th>Author name</th><th>Edition</th><th>Publish-Year</th><th>Book_image</th></tr>";


                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          // $sql = "select book_image from books;"
                          // $res = mysqli_query($conn,$sql);
                          // $row = mysqli_fetch_array($res);

                          $image = $row['book_image'];
                          $image_src = "../book/book_images/".$image;
                          $fileurl=$row['book_url'];
                          $readby=readByUser($conn,$row["book_id"]);
                    echo '<div class="card">'
                    // we can make below div tag dynamic mark it new or not
                          .'<div style="background-color: red; width:50px;"><p>&emsp13;New</p></div>
                            <a href=https://localhost/elibrary2/'.$row["book_url"].'><img class="card-img-top" src='.$image_src.'></a>
                                <div class="card-body">
                                      <h3 class="card-title">'.$row["book_name"].' : '.$row["book_id"].'</h3>
                                      <p class="card-text"><b> '.$row["author_name"].'</b></br>'.$row["publish_year"].'</p>
                                </div>'.
                                //<p class="card-readby"><b>Read by :&emsp13;'.$readby.'</b>,&emsp13;</p>
                          '</div>';
                        }
                        echo "</table>";
                        } else {
                        echo "0 results";
                      }
        }

        if(isset($_GET['search'])){
              $bookname=$_GET['book_search'];
              $query="SELECT * from books where book_name LIKE'%$bookname%'";
              display_books($conn,$query);

        }else if(isset($_POST['submit_category'])){
              $selected_cat = $_POST['category'];  // Storing Selected Value In Variable
              $query="SELECT * from books join category On category.book_id=books.book_id where book_category='$selected_cat'";
              display_books($conn,$query);

        }else if(isset($_GET['all_books']) || true ){

                            $query="select * from books";
                            $result=$conn->query($query);
                            $count=0;
                            if ($result->num_rows > 0) {
                                echo "</br></br></br></br>";
                              //  echo "<table><tr><th>Name</th><th>Author name</th><th>Edition</th><th>Publish-Year</th><th>Book_image</th></tr>";


                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                  // $sql = "select book_image from books;"
                                  // $res = mysqli_query($conn,$sql);
                                  // $row = mysqli_fetch_array($res);

                                  $image = $row['book_image'];
                                  $image_src = "../book/book_images/".$image;
                                  $fileurl=$row['book_url'];
                                  $readby=readByUser($conn,$row["book_id"]);
                                    echo '<div class="card">'
                                    // we can make below div tag dynamic mark it new or not
                                          .'<div style="background-color: red; width:50px;"><p>&emsp13;New</p></div>

                                          <a href="https://localhost/elibrary2/'.$row["book_url"].'?clicked=true">  <img class="card-img-top" src='.$image_src.'></a>
                                                    <div class="card-body">
                                                      <h3 class="card-title">'.$row["book_name"].' : '.$row["book_id"].'</h3>
                                                          <p class="card-text"><b> '.$row["author_name"].'</b></br>'.$row["publish_year"].'</p>
                                                     </div>'.
                                                        // <p class="card-readby"><b>Read by :&emsp13;'.$readby.'</b>,&emsp13;</p>


                                        '</div>';
                                            //onclick="send_user_data_php('.$conn.','.$row["book_id"].','.$_SESSION[user_first_name].' onclick event on pressing image of book to store username to database
                                  $count++;
                                  // if(isset($_GET['clicked'])){
                                  //   $book_id=$row["book_id"];
                                  //   $username=$_SESSION['user_first_name'];
                                  //    send_user_data_php($conn,$book_id,$username);
                                  //
                                  // }
                                }


                                echo "</table>";
                                } else {
                                echo "0 results";
                              }

                              echo '<div class="dashboard_console">
                              <h2>&emsp13;Total Books: '.$count.'&emsp13;</br></br></h2>
                              </div>';


           }



       ?>





    <div class="footer_db">

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
