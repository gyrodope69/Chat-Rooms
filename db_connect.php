
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database ="chatroom";
  
  // creating a database connection
  $conn = mysqli_connect( $servername , $username , $password , $database);

  if(!$conn)
  {
     die("Could not connect to".mysql_connect_error());
  }

?>