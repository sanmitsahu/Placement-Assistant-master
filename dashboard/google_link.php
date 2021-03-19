<?php 
//session_start();
include('includes/header.php');
error_reporting(E_ALL);
 
 include('includes/navbar.php');
 include('db.php');
 ?>

 <?php

$primary_key="";

if($_SESSION['username']){
    $primary_key = $_SESSION['username'];
}


?>


  <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Profile</a>
 <?php include('includes/navbarend.php'); ?>
    <!-- Header -->
<!DOCTYPE html>
<meta charset = "UTF-8" />
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello Jesse</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="#!" class="btn btn-info">profile Picture</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--7">
      <div class="row">
        
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="container">
        <!-- Navigation -->

        
      <div class="py-5 text-center">
        <legend>Resume</legend>
      </div>

<div class="row justify-content-xl-center">

        <div class="col-md-8 order-md-1">
         
           
          <form class="needs-validation cst-bclass" id ="qwerq" method="post" action="data_fetch.php" enctype="multipart/form-data"  novalidate>
            


				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
                
 				<div class="form-group ">

 					<input type="button" value="Download auto-generated resume"  onclick="window.open('patemplate.php')" />

 						



			    </div>
              <br>
              <hr style="height:2px;border-width:0;color:gray;background-color:gray">
               				<div class="form-group ">
					<label class="control-label col-md-3 col-sm-3 col-xs-3" for="unq478"><b>Instructions</b></label>

					<p>****************</p>
					<br>
					<p>Write down Instructions</p>
					<br>
					<p>****************</p>

			    </div>
              <br>
              <hr style="height:2px;border-width:0;color:gray;background-color:gray">
              
               	<div class="form-group ">
               		<span>Upload Link of your Resume:</span>
						<input type="text" name="link" placeholder='Enter the link' required>
               		

			    </div>
              
              
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
              
              

		        <div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 text-center">
						<button type="submit" class="btn btn-outline-primary btn-block submit" name="submit_link"  value="submit">Submit</button>
					</div>
				</div>
          </form>
               
        </div>
      </div>



</div>
         </div>
        </div>
      </div>
  
        </div>

   <?php 
 //include('includes/script.php');
 include('includes/footer.php');
 ?>       