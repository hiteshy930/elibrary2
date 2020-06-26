<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../book/book.css">
  <title>Document</title>
</head>
<body>
  <div id="book_div">
      <div id="back"> <a href="../admin/admin.php"> back</a></div>
      <h2 style="text-align: center;"><u>ADD A BOOK TO STORE</u></h2>
          <form action="../admin/admin.php" method="post" enctype="multipart/form-data">
            <div class="book">
              Book id :&emsp14;&emsp13;&emsp13;&emsp14;&emsp13;&emsp13;&emsp14;&emsp13; <input type="text" name="book_id" value="" placeholder="Enter your  book id" required>
            </div>
            <div class="book">
              Book Name :&emsp13;&emsp13; <input type="text" name="book_name" value="" placeholder="Enter your  book name" required>
            </div>
            <div class="book">
                Author Name : <input type="text" name="author_name" value="" placeholder="Enter book author name" required>
            </div>
            <div class="book">
                Book Edition : <input type="text" name="book_edition" value="" placeholder="Enter book edition" required>
            </div>
            <div class="book">
              <label>  Publish Year :</label>&emsp13;  <input type="text" name="publish_year" value="" placeholder="Enter book publish year" required>
            </div>
            <div class="book">
                <label> Book Image :</label> &emsp13; <input type="file" name="book_image" value="" placeholder="Insert book user_image" >
            </div>
            <div class="book">
                <label> Upload book :</label> &emsp13; <input type="file" name="book_url" value="" placeholder="Upload book pdf here" accept="application/pdf">
                <p>&emsp14;only pdf format*</p>
            </div>
            <div class="book">
              <label> Select book category :</label>
                    <select name="category">
                    <option value="select">Select Category</option>
                    <option value="Inspiration">Inspiration</option>
                    <option value="Romance">Romance</option>
                    <option value="Thrill">Thrill</option>
                    <option value="Personal">Personal Development</option>
                    <option value="Story">Story</option>
                    <option value="Computer">Computer</option>
                    </select>
              </div>
            <input type="submit" name="add_book_form" value="Finish" style="width:100px; height: 40px; background-color:#86C232; color:white; position: relative; top:50px; left:400px;">

          </form>
    </div>
</body>
</html>
