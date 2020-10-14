<?php
session_start();

 if (isset($_COOKIE['username'])) {
 	setcookie('username','',time()-7000);
 	setcookie('password','',time()-7000);
 	setcookie('role','',time()-7000);

  echo "string";
}
header('location: index.php');