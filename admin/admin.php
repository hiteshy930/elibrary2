<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="../admin/admin.css">
    <link href='https://fonts.googleapis.com/css?family=Aleo' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <title></title>
  </head>
  <body>
    <?php
    include '../database/db_conn.php';
    $conn = OpenCon();
  // use session here

    //create a function to see list of all user
    function see_list($conn){
                        $query="select * from user";
                        $result=$conn->query($query);
                        $count=0;
                        if ($result->num_rows > 0) {
                            echo "<h1>Total users count in database :</h1><br>";
                            echo "<table><tr><th>Name</th><th>Email-id</th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["name"]."</td><td>&emsp;".$row["email"]."</td></tr>";
                              $count++;
                            }
                            echo "</table>";
                            } else {
                            echo "0 results";
                          }
                          echo "<h2>Total users we have till now :".$count."</h2>";
      }

      //create a function to see list of all user
      function see_book_list($conn){
                          $query="select * from books";
                          $result=$conn->query($query);
                          $count=0;
                          if ($result->num_rows > 0) {
                              echo "<h1>Total Books available in database :</h1><br>";
                              echo "<table><tr><th>Book Id</th><th>&emsp;Book-Name</th><th>&emsp;Author-name</th><th>&emsp;Edition</th><th>&emsp;Publish-Year</th><th>&emsp;Book_image</th><th>&emsp;Book url</th></tr>";


                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                // $sql = "select book_image from books;"
                                // $res = mysqli_query($conn,$sql);
                                // $row = mysqli_fetch_array($res);

                                $image = $row['book_image'];
                                $image_src = "../book/book_images/".$image;
                                  // echo ' '.$image." ";
                                  // echo '<img src='.$image_src.'/>';
                                echo "<tr><td>".$row["book_id"]."</td><td>&emsp;".$row["book_name"]."</td><td>&emsp;".$row["author_name"]."</td><td>&emsp;".$row["book_edition"]."</td><td>&emsp;".$row["publish_year"]."</td><td>&emsp;<img src=".$image_src."></td><td>&emsp;".$row["book_url"]."</td></tr>";
                                $count++;
                              }
                              echo "</table>";
                              } else {
                              echo "0 results";
                            }
                            echo "<h2>Total Books we have till now :".$count."</h2>";
        }

        //   create function to add a book
           function add_book($conn, $book_id, $book_name,$author_name,$book_edition,$publish_year,$book_image,$book_url){
             $query="INSERT INTO books (book_id,book_name, author_name, book_edition, publish_year,book_image,book_url) VALUES ('$book_id','$book_name', '$author_name', '$book_edition', '$publish_year','$book_image','$book_url')";
             $result=$conn->query($query);
                 // output data of each row
                 if ($result === TRUE) {
                   echo "New book added successfully";
                 } else {
                   echo "Error: " . $result . "<br>" . $conn->error;
                 }
             }

             //   create function to remove a book
                function remove_book($conn, $book_id){
                  $query="DELETE from books where book_id='$book_id'";
                  $result=$conn->query($query);

                      if ($result === TRUE) {
                        echo "Book removed successfully";
                      } else {
                        echo "Error: " . $result . "<br>" . $conn->error;
                      }
                  }



              //create a function to delete  a book

              // create a function to edit detail of book -name, author , edition
              function edit_details($conn, $book_id, $book_name,$author_name,$book_edition,$publish_year){


                  $flag=0;
                if($book_name!=""){
                  $flag=1;
                  $query="UPDATE books SET book_name='$book_name' WHERE book_id='$book_id'";
                  $result=$conn->query($query);
                }
                if($author_name!=""){
                  $flag=1;
                  $query="UPDATE books SET author_name='$author_name' WHERE book_id='$book_id'";
                  $result=$conn->query($query);

                }
                if($book_edition!=""){
                  $flag=1;
                  $query="UPDATE books SET book_edition='$book_edition' WHERE book_id='$book_id'";
                  $result=$conn->query($query);

                }
                if($publish_year!=""){
                  $flag=1;
                  $query="UPDATE books SET publish_year='$publish_year' WHERE book_id='$book_id'";
                  $result=$conn->query($query);
                }

                if($flag!=0)
                  echo " Details updated successfully";
                else
                  echo "You didn't pass any value to field which can be update.";


            }


      ?>

        <div class="header">
                <div class="logo">
                  <a href="../index.html"><img style="width:100px; height:80px;" src="../elib_logo.jpg" alt=""></a>
                </div>
                <div class="menu">
                  <ul>
                    <li><a href="../index.html">Home</a> </li>
                    <li><a href="../About us\aboutus.html">About Us</a> </li>
                    <li><a href="../contactUs\contactus.html">Contact Us</a> </li>
                    <li><a href="../dashboard/dashboard.php">Dashboard</a></li>

                    <li><a href="../login/login.html">logout</a></li>
                  </ul>
                </div>
          </div>

        <div class="front_admin_div">
                    <div id="nav_bar">
                          <h2 style="font-family: 'Aleo'; position: relative;top:20px; left:20px;">Welcome!! admin <br>--------------------------------<br></h2>
                            <button  type="" name="refresh" value="" ><a href="../admin/admin.php">Refresh</a></button>
                        <!-- this button is for check total no. of users present till now. Here our function will execute through isset() in php code above (button) -->
                        <form method="POST">

                            <input  type="submit" name="see_list_button" value="Users list">

                              <input  type="submit" name="add_book_button" value="Add Book">

                              <input  type="submit" name="remove_book_button" value="Remove Book">

                                <input  type="submit" name="edit_book_button" value="Edit Book Details">

                                <input  type="submit" name="view_book_button" value="View Book Details">


                        </form>
                    </div>
                    <div id="desc_bar">
                      <h3><u>Your Actions will appear here:</u></h3>
                        <?php


                          // (button) use to trigger function
                          if(isset($_POST['see_list_button']))
                            see_list($conn);

  // (button) use to trigger add_book function
                            if(isset($_POST['add_book_button'])){
                              header("Location:../book/book_form.php ");
                            }
// add-book-form
                            if(isset($_POST['add_book_form'])){
                                      // echo "book added after form";
                                      $book_id=$_POST['book_id'];
                                     $book_name=$_POST['book_name'];
                                     $author_name=$_POST['author_name'];
                                     $book_edition=$_POST['book_edition'];
                                     $publish_year=$_POST['publish_year'];

                                      if(isset($_POST['add_book_form'])){
                                     $filename = $_FILES['book_image']['name'];
                                      $filename = str_replace(" ", "", $filename);
                                      $filetmpname = $_FILES['book_image']['tmp_name'];
                                       $filetmpname = str_replace(" ", "", $filetmpname);
                                      //folder where images will be uploaded
                                      $folder = '../book/book_images/';
                                      //function for saving the uploaded images in a specific folder
                                      move_uploaded_file($filetmpname, $folder.$filename);
                                      //inserting image details (ie image name) in the database
                                     //  $sql = "INSERT INTO books (book_image) VALUES ('$filename')";
                                     //  $qry = mysqli_query($conn, $sql);
                                     // printf("Error: %s\n", $qry);
                                     //  // if( $qry) {
                                      // echo "</br>image uploaded";
                                      // }
                                    }

                                    if(isset($_POST['add_book_form'])){
                                         $fileurl = $_FILES['book_url']['name'];
                                         $fileurl = str_replace(" ", "", $fileurl);
                                          $filetmpurl = $_FILES['book_url']['tmp_name'];
                                          $filetmpurl = str_replace(" ", "", $filetmpurl);

                                          //folder where images will be uploaded
                                          $folder = '../book/book_pdf/';
                                          //function for saving the uploaded images in a specific folder
                                          move_uploaded_file($filetmpurl, $folder.$fileurl);
                                          $fileurl="/book/book_pdf/".$fileurl;

                                    }

                                      add_book($conn,$book_id,$book_name,$author_name,$book_edition,$publish_year,$filename,$fileurl );
                                     echo "<br>";
                                    see_book_list($conn);
                              }

  //Remove book
                                  if(isset($_POST['remove_book_button'])){
                                        header("Location:../book/remove_book.php");
                                  }
                                   if(isset($_GET['remove_book_form'])){
                                         $book_id=$_GET['book_id'];
                                         remove_book($conn,$book_id);
                                         echo "<br>";
                                       see_book_list($conn);
                                     }
//view book list
                                     if(isset($_POST['view_book_button'])){
                                           see_book_list($conn);
                                      }

//edit book Details
                                  if(isset($_POST['edit_book_button'])){
                                        header("Location:../book/edit_book.php");
                                   }
                                   if(isset($_POST['edit_book_form'])){
                                           $book_id=$_POST['book_id'];
                                          $book_name=$_POST['book_name'];
                                          $author_name=$_POST['author_name'];
                                          $book_edition=$_POST['book_edition'];
                                          $publish_year=$_POST['publish_year'];

                                          edit_details($conn, $book_id, $book_name,$author_name,$book_edition,$publish_year);
                                       //   echo "<br>";
                                       // see_book_list($conn);
                                     }


                        ?>

                    </div>
        </div>
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
