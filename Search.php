
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Book Search Page </title> 
   <link href="startPage.css" rel="stylesheet">

  </head>
    <body>
        <div class="Borrow">
            <form action="getSearch.php" method="POST" >
            <h3> <span style="font-size:25px;">Search For A Book<span><br>Select The Specific Critria</h3>

            <table   style=" margin-left:230px;">

            <tr>
               <td><span style="margin-left:5px; font-size:23px;">Search</span></td>
               <td><select name = "target" style="width:190px; margin-left:10px;">
                    <option value="BookAuthor";> <span>Book Author </span></option>
                    <option value="PublicationYear";><span>Publication Year </span></option>
                    <option value="ISBN";><span>ISBN </span></option>
                </select></td>
                <td> <input type="text" name='value_search'> </td>
            </tr>
                </table>
                <button type="submit" name='Search' style="width:100px; margin-left:120px;">search</button>
            </form>
            
        </div>

    </body>
    <script>   
    </script>
</html>
