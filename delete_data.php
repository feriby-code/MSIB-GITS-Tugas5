<?php

require_once './conn.php';

$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM nilai WHERE id = $id");

header('location: ./index.php');

?>
