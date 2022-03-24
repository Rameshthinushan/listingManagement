<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dataStore";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
{

  die("Connection failed: " . mysqli_connect_error());
  
}

else

{
      $sql = "CREATE TABLE stocks (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,updateTime VARCHAR(50) NOT NULL,Sku VARCHAR (255) NOT NULL,Quantity VARCHAR (255) NOT NULL)";

        if(mysqli_query($conn, $sql)){

            echo "table create success ful";

          }else{

            echo "error :". mysqli_error($conn);

          }
}