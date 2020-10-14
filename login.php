<?php include('server.php');?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Login Page </title> 
   <link href="startPage.css" rel="stylesheet">
  </head>
<body>
    <div class="logForm">
      <form action="Login.php"  method = "POST">
            <p> Fill All The Required Fields Below To Login Your Account !!</p>

            <table   style=" margin-left:230px;">
							
            <td><span style="margin-left:1px;">* Username</span></td>
               <td><input type="username" name="username"/></td>
            </tr>


            <tr>
               <td><span >* Password</span></td> 
                <td><input type="password" name="password"/> </td>
            </tr>

             <tr>
             <td><span style="margin-left:-20px; ">* LogAs</span> </td>
             <td><select name="role" style=" width:195px;  margin-left:20px; " > 
             <option value="admin">Admin</option>
             <option value="student">Student</option>
             </select></td>
            </tr>
     </table>

              <input type="checkbox" name = "Remember" style="width:15px; height:15px;" ><p style="display:inline;">Remember Me</p><br>
						  <button  type="submit" name = "loginUser" style=" width:100px; margin-left:70px; ">Login</button>
     
        </form>
        </div>



</body>

</html>
