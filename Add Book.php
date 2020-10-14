<?php
session_start();
$errors = array();
$msg = "";
$db = mysqli_connect('localhost', 'root', '', 'registration');
if(isset($_POST['addBook'])){
  $bookname = mysqli_real_escape_string($db,$_POST['Bookname']);
  $author = mysqli_real_escape_string($db,$_POST['author']);
  $isbn = mysqli_real_escape_string($db,$_POST['isbn']);
  $category = mysqli_real_escape_string($db,$_POST['category']);
  $PublicationYear = mysqli_real_escape_string($db,$_POST['PublicationYear']);
  $numberofcopies = mysqli_real_escape_string($db,$_POST['numberofcopies']);
  $image = $isbn . $_FILES['image']['name'];
  if(empty($bookname))
    array_push($errors, "bookname is required");
  if(empty($author))
    array_push($errors, "author name is required");
  if(empty($isbn))
    array_push($errors, "ISBN is required");
  if(empty($PublicationYear))
    array_push($errors, "Publication year is required");
   if(empty($numberofcopies))
    array_push($errors, "Number of copies is required");
  if(!empty($numberofcopies) && !( is_numeric($numberofcopies) && $numberofcopies>=0))
    array_push($errors, "Number of copies must be postive integer");
  if(empty($image))
    array_push($errors, "book cover is required");

  if(count($errors)==0){
      $check_query = "SELECT * FROM books WHERE isbn='$isbn' OR bookname='$bookname' LIMIT 1";
      $res = mysqli_fetch_assoc(mysqli_query($db,$check_query));
      if($res){
        array_push($errors, "ISBN or book name already exists");
        $_SESSION['adding_msg'] = $errors;
        header('location: AdminPage.php');
        exit;
      }
      $target = "coverBook/" . basename($image);
      $query = "INSERT INTO books (bookname,isbn,author,publicationyear,category, bookcover,numberofcopies) VALUES ('$bookname', '$isbn','$author','$PublicationYear','$category', '$image','$numberofcopies')";
      mysqli_query($db,$query);
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          $_SESSION['adding_msg'] = array("Book added successfully");
      }else{
          $_SESSION['adding_msg'] = array("Failed to add book");
      }

       header('location: AdminPage.php');
    }
    else{
       $_SESSION['adding_msg'] = $errors;
       header('location: AdminPage.php');
        exit;
    }
   
}
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Add Book Page </title> 
   <link href="startPage.css" rel="stylesheet">
  
  </head>

    <body>
        <div class="AddBook">
        <h3> <span style="font-size:25px;"> Add A Book<span><br>Write The Book Info Below</h3>

            <form action="Add Book.php" name="addBook" method="POST" enctype="multipart/form-data">
         
            <table   style=" margin-left:300px;">
							    <input type="hidden" name="size" value="1000000">

            <tr>
               <td><span style="margin-left:-85px;">Book Name</span></td>
                <td><input type="text" name="Bookname"/> </td>
            </tr> 

            <tr>
               <td><span style="margin-left:-130px;">ISBN</span></td>
                <td><input type="text" name="isbn"/> </td>
            </tr> 
                
            <tr>
              <td><span style="margin-left:-120px;">Author</span></td> 
              <td><input type="text" name="author"/> </td>
            </tr>

          
                            
            <tr>
                <td><span style="margin-left:-35px;">Publication Year</span></td>
                <td><input type="text" name="PublicationYear"/> </td>
            </tr>
              <tr>
              <td><span style="margin-left:-33px;">Number of copies</span></td> 
              <td><input type="text" name="numberofcopies"/> </td>
            </tr>
                
            <tr>
             <td><span style="margin-left:-100px; ">Category</span> </td>
             <td><select name="category" style=" width:195px;  margin-left:20px; " > 
             <option value="Web">Web Design</option>
             <option value="DsAlgo">Data Structure and Algorithms</option>
             <option value="DB">DataBases</option>
             <option value="IS">Information System</option>
             <option value="Math">Math</option>
             <option value="Physics">Physics</option>
             <option value="Statistics">Statistics</option>
             <option value="Other">Other</option>
             </select></td>
            </tr>
                
            <tr>
              <td><span style="margin-left:-70px;">Choose cover</span></td>
                <td><input type="file" name="image" style="width: 200px; height: 30px; "> </td>
             </tr>
                
    </table>

        <button type = "submit" name = "addBook" style="margin-left:180px; width:100px;">Add</button>
            </form>
        </div>
        
    </body>
   
</html>