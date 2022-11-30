<?php
//connection a la base de données
  include_once"connect.php";
  $id = $_GET["id"];

  $req = mysqli_query($bdd, "DELETE FROM student WHERE id = $id");


  header("location:index.php");
?>