<?php
$db = mysqli_connect('localhost', 'root', '', 'registration');
$query="SELECT * FROM books WHERE author = '$%@#@'";

if(isset($_POST['Search'])){
  $target = $_POST['target'];
  $value_search = mysqli_real_escape_string($db,$_POST['value_search']);
  if($target=='BookAuthor'){
    $query = "SELECT * FROM books WHERE author LIKE '%$value_search%'";
  }elseif($target=='PublicationYear'){
    $query = "SELECT * FROM books WHERE publicationyear LIKE '%$value_search%'";
  }else {
    $query = "SELECT * FROM books WHERE isbn LIKE '%$value_search%'";
  }
}

$result = mysqli_query($db,$query);

?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" >
   <title> Book Search Page </title> 
  <link href="Books.css" rel="stylesheet">

  </head>
    <body>
        <table align="center">
            <!-- First row of images and information about book-->
            <h3>Results</h3>
           <?php
                  $counter = 1;
                  while($row = mysqli_fetch_array($result)){
                      if($counter%2==1){
                          echo '<tr>
                                  <td>
                                  <p class="BookInfo"><b>Book name : </b>'. $row['bookname']. '</p>
                                      <img  src="coverBook/'. $row['bookcover'] . '"><br/>
                                      <p class="BookInfo"><b>Author : </b>' . $row['author'] . '</p> 
                                      <p class="BookInfo"><b>Publication year : </b>' . $row['publicationyear'] . '</p>
                                      <p class="BookInfo"><b>ISBN : </b>' . $row['isbn'] . '</p>
                                  </td>';
                      }else{
                          echo '<td>
                                  <p class="BookInfo"><b>Book name : </b>'. $row['bookname']. '</p>
                                      <img  src="coverBook/'. $row['bookcover'] . '"><br/>
                                      <p class="BookInfo"><b>Author : </b>' . $row['author'] . '</p> 
                                      <p class="BookInfo"><b>Publication year : </b>' . $row['publicationyear'] . '</p>
                                      <p class="BookInfo"><b>ISBN : </b>' . $row['isbn'] . '</p>
                                  </td>
                              </tr>';
                      }
                      $counter++;
                  }
                  if($counter%2==0 && $counter!=1){
                      echo '</tr>';
                  }
               
            ?>
        </table>

    </body>
    <script>   
    </script>
</html>
