<?php

  $HOSTNAME = 'localhost';
  $USERNAME = 'root';
  $PASSWORD = '';
  $DATABASE = 'nilai_mhs';

  $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

  // Check Connection
  if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

?>