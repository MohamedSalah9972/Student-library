<?php 
session_start();
$errors = array();
$msg = "";
$db = mysqli_connect('localhost', 'root', '', 'registration');
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
$subquery="";
if(isset($_POST['updateBook'])){
  $newname = mysqli_real_escape_string($db,$_POST['newname']);
  $author = mysqli_real_escape_string($db,$_POST['newauthor']);
  $isbn = mysqli_real_escape_string($db,$_POST['newisbn']);
  $oldisbn = mysqli_real_escape_string($db,$_POST['oldisbn']);
  $publicationyear = mysqli_real_escape_string($db,$_POST['newpublicationyear']);
  $numberofcopies = mysqli_real_escape_string($db,$_POST['numberofcopies']);
  $image = $isbn . $_FILES['image']['name'];
  if(!empty($numberofcopies) && !( is_numeric($numberofcopies) && $numberofcopies>=0))
    array_push($_SESSION['updateBook'], "Number of copies must be postive integer");

  if(!empty($oldisbn) && $_SESSION['updateBook']!="Number of copies must be postive integer"){
    $check_query = "SELECT * FROM books WHERE isbn='$oldisbn'";
    $res = mysqli_fetch_assoc(mysqli_query($db,$check_query));
    if($res){
              if(!empty($isbn)){
              $check_query = "SELECT * FROM books WHERE isbn='$isbn'";
              $res = mysqli_fetch_assoc(mysqli_query($db,$check_query));
              if($res)
              {
                $_SESSION['updateBook']="ISBN already exists";
                header('location: AdminPage.php');
                exit;
              }
              else{
                $query = "UPDATE books SET isbn='$isbn' WHERE isbn='$oldisbn'";
                mysqli_query($db,$query);
                $oldisbn=$isbn;
              }

            }
            if(!empty($newname)){
              $query = "UPDATE books SET bookname='$newname' WHERE isbn='$oldisbn'";
                mysqli_query($db,$query);
            }
            if(!empty($author)){
              $query = "UPDATE books SET author='$author' WHERE isbn='$oldisbn'";
                mysqli_query($db,$query);
            }
            if(!empty($publicationyear)){
              $query = "UPDATE books SET publicationyear='$publicationyear' WHERE isbn='$oldisbn'";
                mysqli_query($db,$query);
            }
            if(!empty($numberofcopies)){
              $query = "UPDATE books SET numberofcopies='$numberofcopies' WHERE isbn='$oldisbn'";
                mysqli_query($db,$query);
            }
            if(!empty($image)){
              $query = "SELECT bookcover FROM books WHERE isbn='$oldisbn'";
              $result = mysqli_query($db,$query);
              $oldImage = mysqli_fetch_array($result);
              $oldImage = "coverBook/".$oldImage['bookcover'];
              unlink($oldImage); //delete old cover
              $target = "coverBook/" . basename($image);
              $query = "UPDATE books SET bookcover='$image' WHERE isbn='$oldisbn'";
              mysqli_query($db,$query);
              move_uploaded_file($_FILES['image']['tmp_name'], $target);
            }
            $_SESSION['updateBook']="Book updated successfully";
            header('location: AdminPage.php');

  }
  else{
    $_SESSION['updateBook']="Old ISBN doesn't exist";
    header('location: AdminPage.php');
  }
    }
    else{

       if($_SESSION['updateBook']=="Number of copies must be postive integer")
        $_SESSION['updateBook'] = "Number of copies must be postive integer";

      if(empty($oldisbn))
        $_SESSION['updateBook'] .= "<br> Old ISBN is required";

      header('location: AdminPage.php');

    }

  
}




?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Update Book Page </title> 
   <link href="startPage.css" rel="stylesheet">
 
  </head>
<body>
    <div class="updateBookForm">
      <form action="updateBook.php" name="updateBook" method="POST" enctype="multipart/form-data" >
      
      
      <h3> <span style="font-size:25px;"> Update Book <span><br>Write The Name Of Existing Book and The New Info Below</h3>

      <table   style=" margin-left:300px;">
             <input type="hidden" name="size" value="1000000">
              
             <tr>
                 <td><span style="margin-left:-105px;">Old ISBN</span></td>
                  <td><input type="text" name="oldisbn"/> </td>
              </tr> 

             <tr>
                 <td><span style="margin-left:-130px;">ISBN</span></td>
                  <td><input type="text" name="newisbn"/> </td>
              </tr> 

              <tr>
               <td><span style="margin-left:-90px;">New name</span></td>
               <td><input type="text" name="newname"/></td>
              </tr>
                  
              <tr>
                <td><span style="margin-left:-120px;">Author</span></td> 
                <td><input type="text" name="newauthor"/> </td>
              </tr>
                  
              
                              
              <tr>
                  <td><span style="margin-left:-35px;">Publication Year</span></td>
                  <td><input type="text" name="newpublicationyear"/> </td>
              </tr>

              <tr>
                  <td><span style="margin-left:-33px;">Number of copies</span></td>
                  <td><input type="text" name="numberofcopies"/> </td>
              </tr>
                  
                  
              <tr>
                  <td><span style="margin-left:-70px;">Book Cover</span></td>
                  <td><input type="file" name="image" style="width:200px; height:23px; background-color:rgba(23, 64, 84,0.93);" > </td>
               </tr>
                  
      </table>
            
          <button type="submit" name="updateBook" style="margin-left:180px; width:100px;"> Update</button>
          
        </form>
        </div>



</body>
<script>
      
</script>
</html>