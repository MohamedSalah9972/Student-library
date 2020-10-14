<?php

session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['Return'])){
    $bookName=mysqli_real_escape_string($db,$_POST['bookName']);
    if(!empty($bookName)){
        $username=$_SESSION['username'];
        $check_query = "SELECT * FROM borrowtable WHERE bookName='$bookName' AND borrower='$username' LIMIT 1";
        $res = mysqli_fetch_assoc(mysqli_query($db,$check_query));
        if($res){
          $query="DELETE FROM borrowtable WHERE bookName='$bookName' AND borrower='$username' ORDER BY returnDate LIMIT 1";
          $res=mysqli_query($db,$query);
          $query = "SELECT * FROM books WHERE bookname='$bookName'";
          $res = mysqli_fetch_assoc(mysqli_query($db,$query));
          $numberofcopies=$res['numberofcopies']+1;
          $query = "UPDATE books SET numberofcopies='$numberofcopies' WHERE bookname='$bookName' ";
          mysqli_query($db,$query);
          $_SESSION['Return']='Book returned successfully';
        }
        else{
          //mafeesh ketab bel2sm dah mosta3ar
          $_SESSION['Return']='There is no borrowed book matching this name';
        }
    }
    else{
      $_SESSION['Return']='Book name is required';
    }
    header('location: StudentPage.php');
}

?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Return Book Page </title> 
   <link href="startPage.css" rel="stylesheet">
   <link href="admin.css" rel="stylesheet">
  </head>
<body>
        <div class="Return">
        <h3> <span style="font-size:25px;"> Return A Book  </span><br>Write The Book Name Below</h3>

            <form action="Return.php" name="Return" method="POST">

                <span>Book Name : </span><input type="text" name="bookName" ><br>
                <button type="submit" name="Return" style="width:100px; margin-left:170px;"> Return</button>
    
            </form>
        </div>
    </body>
    <script>
          
    </script>
</html>