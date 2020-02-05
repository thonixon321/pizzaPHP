<?php

//connect to database (url, username, password, db name) this is
//using mySql_i (could use PDO - PHP object notation in future)
$conn = mysqli_connect('localhost', 'tom', '123', 'ninja_pizza');

//check connection
if (!$conn){
  echo 'connection error: '. mysqli_connect_error();
}
?>