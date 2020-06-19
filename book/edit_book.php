<link rel="stylesheet" href="../book/book.css">
<?php
  //edit book Details
    echo '<div id="book_div">
      <div id="back"> <a href="../admin/admin.php"> back</a></div>
      <h2 style="text-align: center;"><u>Edit Book Details</u></h2>
          <form action="../admin/admin.php" method="post" enctype="multipart/form-data">
            <div class="book">
              <label>Book id<label style="color:red;">&emsp13;*</label></label> :&emsp14;&emsp13;&emsp13;&emsp14;&emsp13; <input type="text" name="book_id" value="" placeholder="Enter your  book id" required>
            </div>
            <div class="book">
              Book Name :&emsp13;&emsp13; <input type="text" name="book_name" value="" placeholder="Enter your  book name" >
            </div>
            <div class="book">
                Author Name : <input type="text" name="author_name" value="" placeholder="Enter book author name" >
            </div>
            <div class="book">
                Book Edition : <input type="text" name="book_edition" value="" placeholder="Enter book edition" >
            </div>
            <div class="book">
              <label>  Publish Year :</label>&emsp13;  <input type="text" name="publish_year" value="" placeholder="Enter book publish year" >
            </div>'.
            // <div class="book">
            //     <label> Book Image :</label> &emsp13; <input type="file" name="book_image" value="" placeholder="Insert book user_image" >
            // </div>
            // <div class="book">
            //     <label> Upload book :</label> &emsp13; <input type="file" name="book_url" value="" placeholder="Upload book pdf here" accept="application/pdf">
            //     <br>only pdf format*</br>
            // </div>
            '<input type="submit" name="edit_book_form" value="Finish" style="width:100px; height: 40px; background-color:#86C232; color:white; position: relative; top:50px; left:400px;">

          </form>
    </div>';

 ?>
