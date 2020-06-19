<?php
 // include('../database/db_conn.php');
function retrieve($conn){
    $sql = "select book_image from books where book_name='$book_name'and book_edition='$book_edition'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $image = $row['name'];
    $image_src = "../book".$image;
}
?>
