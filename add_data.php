<?php

require_once './conn.php';

  $nama = $_POST['nama'];
  $mata_kuliah = $_POST['mata_kuliah'];
  $grade = $_POST['grade'];
  if ($grade == "A") {
    $nilai_rata_rata = "4.00";
  } else if ($grade == "B") {
    $nilai_rata_rata = "3.00";  
  } else if ($grade == "C") {
    $nilai_rata_rata = "2.00";  
  } else if ($grade == "D") {
    $nilai_rata_rata = "1.00";  
  } else if ($grade == "E") {
    $nilai_rata_rata = "0";  
  }

  mysqli_query($conn, "INSERT INTO nilai VALUES (NULL, '$nama', '$mata_kuliah', '$grade', $nilai_rata_rata)");

  header("location: ./index.php")
?>