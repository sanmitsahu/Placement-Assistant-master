<?php 
 include('security.php'); 
  //session_start();
 include('includes/header.php');
 include('includes/navbar.php');
 ?>

 <?php
  header('Location:student_manager.php');
  ?>
<script>
    window.location.href = "./student_manager.php";
</script>