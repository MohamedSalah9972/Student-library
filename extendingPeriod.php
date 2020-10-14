<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['updatePeriod'])){
  $bookname=mysqli_real_escape_string($db,$_POST['bookname']);
  $newdate=mysqli_real_escape_string($db,$_POST['newdate']);
  $user = $_SESSION['username'];
  if(!empty($bookname)&&!empty($newdate)){
  	$query = "SELECT * FROM borrowtable WHERE bookname='$bookname'AND borrower='$user' ORDER BY returnDate LIMIT 1";
    $res = mysqli_fetch_assoc(mysqli_query($db,$query));
    if($res && $res['returnDate']<$newdate){
    	$oldDate = $res['returnDate'];
   		$query = "UPDATE borrowtable SET returnDate ='$newdate' WHERE bookname='$bookname' AND borrower='$user' AND returnDate='$oldDate' ";
   		mysqli_query($db,$query);
   		$_SESSION['Extending_msg'] = "Date extended successfully";
    }
    else{
    	$_SESSION['Extending_msg'] = "something went wrong";
    }
  }else{
  	$_SESSION['Extending_msg'] = "Please fill all fields";
  }
  header('location: studentPage.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" >
		<title> Extending Period </title> 
		<link href="startPage.css" rel="stylesheet">
	</head>

	<body>

		<div class="Extending">
			<form action="extendingPeriod.php" method="POST">
				<table   style=" margin-left:150px;">
	            <tr>
	               <td><span style="margin-left:50px;">Book name</span></td> 
	               <td><input type="text" name="bookname" style="width:200px"/> </td>
               </tr>
               <tr>
	               <td><span style="margin-left:40px;">New date</span></td>
	               <td><input type="date" name="newdate" style="width:200px" /> </td>
	            </tr>
	            </table>
	            <button type = 'submit' name = 'updatePeriod' style="width:200px; margin-left:150px; height: 35px">Update period</button>

            </form>
		</div>
	</body>
</html>