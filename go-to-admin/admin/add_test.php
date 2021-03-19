<?php 
 include('security.php');
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
            



<html>
<head>
<title>Edit Multiple User</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="to_db.php">
<div style="width:500px;">
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center">
<tr class="tableheader">
<td>Edit User</td>
</tr>

<tr>
<td>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr>
<td><label>Test Id</label></td>
<td><input type="hidden" name="test_id" class="txtField" value="<?php echo $row[$i]['test_id']; ?>"><input type="text" name="test_id[]" class="txtField" placeholder="Test Id"></td>
</tr>
<td><label>Test Name</label></td>
<td><input type="text" name="test_name" class="txtField" placeholder="Test Name"></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><input type="password" name="pass" class="txtField" placeholder="Password "></td>
</tr>
<td><label>Department</label></td>
<td><input type="text" name="department" class="txtField" placeholder="Department"></td>
</tr>
<td><label>Number of Questions</label></td>
<td><input type="text" name="no_of_ques" class="txtField" placeholder="Number of Questions in Test"></td>
</tr>
<td><label>Time Limit</label></td>
<td><input type="text" name="time_limit" class="txtField" placeholder="Time Limit"></td>
</tr>
<td><label>Minimum Marks</label></td>
<td><input type="text" name="min_marks" class="txtField" placeholder="Minimum Marks"></td>
</tr>
<td><label>Number of Tests </label></td>
<td><input type="text" name="test_created" class="txtField" placeholder="Number of Tests "></td>
</tr>

</table>
</td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>

</tr>
</table>
</div>
</form>
</body></html>
  

  <?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>
