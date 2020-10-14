<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
  if(isset($_POST['update']))
  {
    $password_1 = mysqli_real_escape_string($db,$_POST['password1']);
    $password_2 = mysqli_real_escape_string($db,$_POST['password2']);
    $email = mysqli_real_escape_string($db,$_POST['mail']);
    unset($_POST['update']);
    if(!empty($password_1))
    {
            if($password_1 != $password_2)
            {
                 $_SESSION['update_error'] = 'The two passwords do not match';
            }
            else {
              if(!empty($email))
              {
                      $_SESSION['pass'] = $password_1;
                      $password = md5($password_1);
                      $username = $_SESSION['username'];
                      $check_query = "SELECT * FROM users WHERE email='$email'";
                      $res = mysqli_fetch_assoc(mysqli_query($db,$check_query));
                      if($res)
                      {
                         $_SESSION['update_error'] = 'This mail already exists';
                         if($_SESSION['role']=='admin')
                          header('location: adminPage.php');
                        else 
                          header('location: studentPage.php');
                        exit;
                      }
                      $query = "UPDATE users SET Password='$password', email= '$email' WHERE username='$username'";
                      mysqli_query($db,$query);

              }
              else{
                      $password = md5($password_1);
                      $username = $_SESSION['username'];
                      $query = "UPDATE users SET password='$password' WHERE username='$username' ";
                      mysqli_query($db,$query);
              }
            }
          }
      
    elseif (!empty($email))
    {
              $username = $_SESSION['username'];
              $check_query = "SELECT * FROM users WHERE email='$email'";
              $res = mysqli_fetch_assoc(mysqli_query($db,$check_query));
              if($res)
              {
                     $_SESSION['update_error'] = $res;
                     if($_SESSION['role']=='admin')
                      header('location: adminPage.php');
                    else 
                      header('location: studentPage.php');
                    exit;
              }
              $query = "UPDATE users SET email='$email' WHERE username='$username'";
              mysqli_query($db,$query);
              $_SESSION['update_error'] = $email;
              if (mysqli_query($db, $query)) {
                $_SESSION['update_error'] = "Record updated successfully";
              } else {
                $_SESSION['update_error']= "Error updating record: " . mysqli_error($db);
              }

        }
     
      mysqli_close($db);
      if($_SESSION['role']=='admin')
        header('location: adminPage.php');
      else 
        header('location: studentPage.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> user Details Page </title> 
   <link href="startPage.css" rel="stylesheet">
   
  
  </head>

    <body>
        <div class="details">
            <form action="UpdateUserDetails.php" method="post">
            <h3> <span style="font-size:25px;"> Update User Details <span><br>Write An Existing Username and The New Info Below</h3>
             
            <table   style=" margin-left:150px;">

            <tr>
               <td><span style="margin-left:50px;">New Password</span></td> 
                <td><input type="password" name="password1"/  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"> </td>
            </tr>

            <tr>
               <td><span style="margin-left:80px;">Confirm Password</span></td>
               <td><input type="password" name="password2"/> </td>
            </tr> 
            
            <tr>
               <td><span style="margin-left:-10px;">E-Mail</span></td>
               <td><input type="mail" name="mail" autocomplete="off"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="**@example.com"/> </td>
            </tr>

                </table>

      <button type = 'submit' name = 'update' style="width:100px; margin-left:150px;">Update</button>
            </form>
        </div>
</body>
</html>