<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8" >
   <title> Student Page </title> 
   <link href="index.css" rel="stylesheet">
  </head>
   <body >
       
          <div class ="nav">
              <div class="s">
          <h2>Student Library<img src = img/book_icon.png class="icon"></h2>
           </div>
               <ul class="lin">
               <a href="StudentPage.php" style="color:rgb(22, 84, 95);"><li>Home</li></a>
                  <a href="#"onclick="student(1)" style="color:rgb(22, 84, 95);"><li> Contuct Us </li></a>
                  <a href="#"onclick="student(2)" style="color:rgb(22, 84, 95);"><li >Student Options</li></a>
                  <a href="logout.php" style="color:rgb(22, 84, 95);"><li>LogOut</li></a>
                </ul>
          </div>
          <hr>
          <br>
          
         

<div class="category">
    <br>
        <h2>Categories</h2>
        <ul>
          <li><a href="#"onclick="data(4)" style="color:rgb(22, 84, 95);">Web Design</a></li>
            <li><a href="#"onclick="data(5)" style="color:rgb(22, 84, 95);">Data Structure and Algorithms</a></li>
            <li><a href="#"onclick="data(6)" style="color:rgb(22, 84, 95);">DataBases</a></li>
            <li><a href="#"onclick="data(7)" style="color:rgb(22, 84, 95);">Information System</a></li>
            <li><a href="#"onclick="data(8)" style="color:rgb(22, 84, 95);">Math</a></li>
            <li><a href="#"onclick="data(9)" style="color:rgb(22, 84, 95);">Physics</a></li>
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
    if(isset($_POST['Search']))
      {
              include('printResults.php');
      } 
      if(isset($_SESSION['success'])){
          echo "<p style = 'font-size:35px;height :100px; color:rgb(22, 84, 95);'>".  $_SESSION['success'] . "</p>"; 
          unset($_SESSION['success']);
        }
      if(isset($_SESSION['Borrow'])){
        echo "<p style = 'font-size:35px;height :100px; color:rgb(22, 84, 95);'>" .  $_SESSION['Borrow'] . "</p>";
        unset($_SESSION['Borrow']);
        }

        if(isset($_SESSION['Return'])){
          echo "<p style = 'font-size:35px;height :100px; color:rgb(22, 84, 95);'>" .  $_SESSION['Return'] . "</p>"; 
          unset($_SESSION['Return']);
        }
        if(isset($_SESSION['Extending_msg'])){
          echo "<p style = 'font-size:35px;height :100px; color:rgb(22, 84, 95);'>" .  $_SESSION['Extending_msg'] . "</p>"; 
          unset($_SESSION['Extending_msg']);
        }

        ?>

    </div> 
        

    <script src="index.js" ></script>
    <script src="student.js" ></script>
    <script src="studentOption.js" ></script>
    <script src="Extending.js" ></script>
    <script src="other.js" ></script>



       
     
         
    </body>
</html>

