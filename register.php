<?php include('server.php') ?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Registration Page</title> 
   <link href="startPage.css" rel="stylesheet">

  </head>


<body>
    <div class="RegisterForm">
      <form action="Register.php" method="post">
        
      <p> Fill All The Required Fields Below To Register Your Account !!</p>
      <table   style=" margin-left:150px;">
							
            <tr>
							 <td><span style="margin-left:1px;">* Username</span></td>
               <td><input type="username" name="username" required /></td>
            </tr>

            <tr>
               <td><span >* Password</span></td> 
                <td><input type="password" name="password1" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"/> </td>
            </tr>

            <tr>
               <td><span style="margin-left:80px;">* Confirm Password</span></td>
               <td><input type="password" name="password2"/> </td>
            </tr> 
            
            <tr>
               <td><span style="margin-left:-35px;">* Mail</span></td>
               <td><input type="mail" name="email" required autocomplete="off"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="**@example.com"/> </td>
            </tr>

            <tr>
               <td><span style="margin-left:58px;">* Phone Number</span></td>
               <td><input type="text" name="phone" required /> </td>
            </tr>

            <tr>
             <td><span style="margin-left:-20px; ">* LogAs</span> </td>
             <td><select name="role" style=" width:195px;  margin-left:20px; " > 
             <option value="admin">Admin</option>
             <option value="student">Student</option>
             </select></td>
            </tr>

             <tr>
                
						<td>	<button type = "submit" name = "rgstr" style=" width:100px; "  >Register</button></td>
<!--         <td> <button  onclick="clearInput()" style=" width:100px; ">Reset</button> </td>
 -->
                 </td>
						 </tr>
							 
          </table>
          
        </form>

                 
            
        </div>



</body>
<script>
</script>
</html>