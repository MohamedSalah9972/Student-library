<?php
if(isset($_COOKIE['username'])){
  $username = $_COOKIE['username'];
  $role = $_COOKIE['role'];
  session_start();
  $_SESSION['username'] = $username;
  $_SESSION['role'] = $role;
  if($role == 'admin')
    header('location: adminpage.php');
  else 
    header('location: studentpage.php');
}

?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8" >
   <title> Student Library </title> 
   <link href="index.css" rel="stylesheet">
  </head>
   <body >
       
          <div class ="nav">
              <div class="s">
          <h2>Student Library<img src=img/book_icon.png class="icon"></h2>
           </div>
               <ul class="lin">
                  <a href="index.php" style="color:rgb(22, 84, 95);"><li>Home</li></a>
                  <a href="#"onclick="data(1)" style="color:rgb(22, 84, 95);"><li> Contuct Us </li></a>
                  <a href="#"onclick="data(2)" style="color:rgb(22, 84, 95);"><li >Registration</li></a>
                  <a href="#"onclick="data(3)" style="color:rgb(22, 84, 95);"><li>Login</li></a>
                </ul>
          </div>
          <hr>
          <br>
          
<div class="category">
    <br>
        <h2>Categories</h2>
        <ul>
          <li><a href="#" onclick="data(4)" style="color:rgb(22, 84, 95);">Web Design</a></li>
            <li><a href="#" onclick="data(5)" style="color:rgb(22, 84, 95);">Data Structure and Algorithms</a></li>
            <li><a href="#" onclick="data(6)" style="color:rgb(22, 84, 95);">DataBases</a></li>
            <li><a href="#" onclick="data(7)" style="color:rgb(22, 84, 95);">Information System</a></li>
            <li><a href="#" onclick="data(8)" style="color:rgb(22, 84, 95);">Math</a></li>
            <li><a href="#" onclick="data(9)" style="color:rgb(22, 84, 95);">Physics</a></li>
            <li><a href="#"onclick="data(10)" style="color:rgb(22, 84, 95);">statistics</a></li>
            <li><a href="#"onclick="getOther()" style="color:rgb(22, 84, 95);">Other</a></li>
        </ul>
    </div>

    <div class="bestSeller">
      <br>
              <h2>Most borrowed</h2>
                <ul>
                    <li>Data Structures Using C++</li>
                    <li>Process Mining</li>
                    <li>HTML5 & CSS3 for </li>
                    <li>Principles Of Physics For XI</li>
                    <li>Handcrafted CSS</li>
              </ul>
            </div>
    
           
           
        
    <div id="about" > <?php 
    
          session_start();
            if(isset($_SESSION['success']) && $_SESSION['success'] == 'Wrong'){
              echo "<p style = 'margin-top:150px;'> </p>";

              foreach ($_SESSION['error'] as $error) {
                echo '<li style="  color:red; font-size:30px;">' . "$error" . '</li>' . '<br>';
              echo '<br><br><br><br><br><br>';

              }
              session_unset();
              session_destroy();
            }
            else{
             
              session_unset();
              session_destroy();
            }
            
          ?>  <div>  
      <script src="index.js"></script>
      <script src="other.js"></script>
         
    </body>
</html>

