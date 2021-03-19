<?php 
 //include('security.php');
 include('includes/header.php');
 include('includes/navbar.php');
 
 ?>
         <div class="col">
                                      <!-- Button trigger modal -->
                                <div class="col-lg-10 align-self-end" align="center">
                    <h1 class="text-uppercase text-white font-weight-bold"> All Tests </h1>
                </div>
 
              </div>

 
  <?php 
  include('includes/navbarend.php'); 
  ?>




                <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Add Department</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
               <form method="POST" action="verify.php" enctype="multipart/form-data">

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-portrait"></i><span>
                    </div>
                    <input class="form-control" placeholder="Enter Department Name" type="text" name="deptname" required="">
                  </div>
                </div>


            

                  <div class="form-group">
                   
                    <div class="custom-file">

                      <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" name="deptfile">
                      <label class="custom-file-label" for="inputGroupFile01">Choose Depertment Image</label>
                    </div>
                
                  </div>

               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-outline-primary" name="adddept">Add</button>
                  </div>
                  </form>

                        </div>
                      </div>
                    </div>
                  </div>
              <!--end model-->



<!-- Header -->
    <div class="header bg-gradient-primary pb-4 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
 
             <div class="col mt-5">
                        <?php 

                              if (isset($_SESSION['success']) && $_SESSION['success'] != '')
                              {
                                
                               echo  '<div class="alert alert-success" role="alert"> '.$_SESSION['success'].' </div>';
                              unset($_SESSION['success']);
                               }
                              if (isset($_SESSION['status']) && $_SESSION['status'] != '')
                               {
                                echo  '<div class="alert alert-danger" role="alert"> '.$_SESSION['status'].' </div>';
                              unset($_SESSION['status']);
                               }


                                ?>
                                  </div>

                      


          
        </div> <!-- end header body -->
      </div>
    </div>
       <!-- start Table section-->





    <div class="container-fluid pb-8 pt-5">
     
  

   <!-- Card stats --> 
        
          <div class="row align-item-center">


            <?php 
?>

            </div><!-- end row-->
            


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$rowCount = count($_POST["users"]);
for($i=0;$i<$rowCount;$i++) {
mysqli_query($conn, "DELETE FROM tests_data WHERE test_id='" . $_POST["users"][$i] . "'");
}
echo '<script type="text/javascript">
  location.replace("http://localhost:8080/Placement-Assistant-master/dashboard/crud/all_tests.php")
</script>';
?>
  <?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>
