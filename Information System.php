<?php 
$db = mysqli_connect('localhost', 'root', '', 'registration');
$query = "SELECT * FROM books WHERE category='IS' ";
$result = mysqli_query($db,$query);
?>
<html>
    <head>
        <!--title of the website-->
        <title>Information System</title>
        <link href="Books.css" rel="stylesheet">
        <!------------------------>
    </head>
    <body>
        <!--Table for Books of web design -->
        <table align="center">
            <!-- First row of images and information about book-->
            <h3>Information system Category</h3>
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
                if($counter%2==0){
                    echo '</tr>';
                }
            ?>
        </table>
        <!--End of Table  -->
    </body>
</html>
