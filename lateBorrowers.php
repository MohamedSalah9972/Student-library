<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['lateBorrowers'])){
  $borrower=mysqli_real_escape_string($db,$_SESSION['borrower']);
  $bookname=mysqli_real_escape_string($db,$_SESSION['bookname']);
  $returnDate=mysqli_real_escape_string($db,$_SESSION['returnDate']);
  $query = "SELECT email FROM users WHERE username='$borrower'";
  $result = mysqli_fetch_assoc(mysqli_query($db,$query));
  $email = $result['email'];
  $msg = '<html>You are late for returning ' . $bookname . ' book.<br> Your return date is '.$returnDate . '<br>';
  $msg .= "Please return the book today <br><br> best regards </html>";



	
require('PHPMailer.php');
require('Exception.php');
require('SMTP.php');


  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;
  $mail->IsHTML(true);
  $mail->Username = 'mohamed.hendy9972@gmail.com';
  $mail->Password = '7111999ms';
  $mail->SetFrom('mohamed.hendy9972@gmail.com');
  $mail->Subject = 'Late return warning';
  $mail->Body ="$msg";
  $mail->AddAddress("$email");

  if(!$mail->Send()) {
      $_SESSION['success'] = "Failed to send mail";
   } else {
      $_SESSION['success'] = "Message has been sent";
   }

 header('location:adminPage.php');
}

$today = date('Y-m-d');
$query = "SELECT * FROM borrowtable WHERE returnDate < '$today'";
$All =   mysqli_query($db,$query);
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Student Options Page </title> 
   <link href="startPage.css" rel="stylesheet">
        <link href="Books.css" rel = "stylesheet">

  </head>
  <body>
  	<div class="late">
  		<form action="lateBorrowers.php" method="POST">
  			<table>
          <?php
            if(mysqli_num_rows($All)!=0){
              echo "<tr>
            <th>Borrower</th>
            <th>Book name</th>
            <th>Return date</th>
            <th>Action</th>
          </tr>";
            }
            else {
              echo "<p style='font-size:35px;'>There are no late borrowers </p>";
            }
          ?>
          
          <?php
          //<input type="date" name="newdate" style="width:200px" />
          while($row = mysqli_fetch_array($All)){
            $_SESSION['borrower'] = $row['borrower'];
            $_SESSION['bookname'] = $row['bookName'];
            $_SESSION['returnDate'] = $row['returnDate'];
            echo '<tr>
                    <td>'.$row['borrower'] . '</td>
                    <td>'.$row['bookName']. '</td>
                    <td> ' . $row['returnDate'] . '</td>
                    <td>' ."<button type = 'submit' name = 'lateBorrowers' style='width:200px; margin-left:150px; height: 35px'>Send mail</button>" . '</td>'.'
                  </tr> ';
          }
        ?>
  			</table>
  		</form>
  	</div>

  </body>
</html>