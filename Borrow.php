<?php

session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['Borrow'])){
  $bookName=mysqli_real_escape_string($db,$_POST['bookName']);
  $returnDate=mysqli_real_escape_string($db,$_POST['returnDate']);
  if(!empty($bookName)&&!empty($returnDate)){
    $check_query = "SELECT * FROM books WHERE bookname='$bookName'";
    $res = mysqli_fetch_assoc(mysqli_query($db,$check_query));
    if($res){
      //eldonia tmam patrially
      $numberofcopies=$res["numberofcopies"];
      if($numberofcopies>0){
        //you may be able to borrow
        
        $today = date('Y-m-d');
        if($returnDate>=$today){
          $numberofcopies--;
          $query = "UPDATE books SET numberofcopies='$numberofcopies' WHERE bookname='$bookName' ";
          mysqli_query($db,$query);
          $_SESSION['Borrow']="Book borrowed successfully";
          $username=$_SESSION['username'];
          $query="INSERT INTO borrowtable(borrower,bookName,returnDate) VALUES('$username','$bookName','$returnDate')";
          mysqli_query($db,$query);
        }
        else{
          //invalid date, u can't borrow.
          $_SESSION['Borrow']="Invalid date !";
        }
      }
      else{
        //Sorry, no copies available
        $_SESSION['Borrow']="Sorry, no copies available :(";
      }
  }
      
    else{
      //mfeesh ketab bel2sm dah
      $_SESSION['Borrow']="There is no matching for this name";
    }
 }
  else{
    //elform mesh kamlah
    $_SESSION['Borrow']="please fill all fields !";
  }
  header('location: StudentPage.php');
}



?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Borrow Book Page </title> 
   <link href="startPage.css" rel="stylesheet">
 
  </head>

    <body>
        <div class="Borrow">
        <h3> <span style="font-size:25px;"> Borrow A Book <span><br>Write the Book Name And The the Return Date Below</h3>

            <form action="Borrow.php" name="Borrow" method="POST">

            <table  style=" margin-left:220px;">
							
                            <tr>
                               <td><span style="font-size:23px;">Book Name</span></td>
                               <td><input type="text" name="bookName"/></td>
                            </tr>
                
                            <tr>
                               <td><span  style=" margin-left:15px; font-size:23px;" >Return Date</span></td> 
                                <td><input type="date" name="returnDate" style="width:190px;"> </td>
                            </tr>
                           
                          
                        </table>
                        

    <button type="submit" name="Borrow" style="width:100px; margin-left:90px;">Borrow</button>
    
            </form>
        </div>

    </body>
  
</html>