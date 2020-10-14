
  
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Student Options Page </title> 
   <link href="admin.css" rel="stylesheet">

  </head>
  
        <table align="center">
          
            <tr>
                <td>
                   <h3><span>Borrow</span> A Book</h3><br>
                    <img  src="img/borrow.png"
                    style="   filter: invert(100%); -webkit-filter:invert(100%);"><br/> 
                 <a href="#"onclick="StudentOption(1)" > <button>Borrow</button> </a>

             
                <td>
                <h3><span>Return</span> A Book</h3><br><br>
                 <img 
                 src="img/return.png" style="  height:135px;
                    filter: invert(100%); -webkit-filter:invert(100%);"><br>
                  <a href="#"onclick="StudentOption(2)" ><button>Return</button> </a>
                </td>
            </tr>
            <tr>
                <td>
                <h3><span>Search</span> For Book </h3><br><br>
                <img src="img/search_book.png"><br>
                <a href="#"onclick="StudentOption(3)" ><button>Search</button> </a>
                </td>
                <td>
                <h3  ><span>Update</span> Your Deatails</h3><br><br>
                <img src="img/update_deatails.png"><br>
                <a href="#"onclick="StudentOption(4)" ><button>Update</button></a>
            </tr>
            <tr>
                <td>
                <h3 ><span >Extend period</span>  </h3><br><br>
                <img src="img/extend.jpg"><br>
                <a href="#"onclick="getExtending()" ><button style = "width: 120px; height: 25px; margin-left: auto;">Extend Period</button> </a>
                </td>
             </tr>
        </table>
        <!--End of Table  -->

    </body>
</html>