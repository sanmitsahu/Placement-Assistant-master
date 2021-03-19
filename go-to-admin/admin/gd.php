<?php 
 include('security.php');
 include('includes/header.php');
 include('includes/navbar.php');
 
 ?>
         <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">GD and Interview</a>
   
    <?php include('includes/navbarend.php'); ?>


<!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">

          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-upperc ase text-muted mb-0">Total GD</h5>
                      <?php 

                      $query = "SELECT id FROM gd_hr where type='gd' ORDER BY id";
                      $query_run = mysqli_query($connection,$query);
                      $row = mysqli_num_rows($query_run);
                      echo ' <span class="h2 font-weight-bold mb-0"> '.$row. '</span>';
                       ?>
                     
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total HR</h5>
                       <?php 

                      $query = "SELECT id FROM gd_hr where type='hr' ORDER BY id";
                      $query_run = mysqli_query($connection,$query);
                      $row = mysqli_num_rows($query_run);
                      echo ' <span class="h2 font-weight-bold mb-0"> '.$row. '</span>';
                       ?>
                     
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Student Registered</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>

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


          </div>
        </div>
      </div>
    </div>

        <!-- start Table section-->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
				    <div class="row align-items-center">
						<!-- Button trigger modal -->
                <div class="col">
                  <h3 class="mb-0">GD Record</h3>
                </div>
                  <div class="col text-right">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                     <i class="ni ni-fat-add">&nbsp;</i>Add GD 
                    </button>
                  </div>
				  <div class="col text-right">
                     <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenterhr">
                     <i class="ni ni-fat-add">&nbsp;</i>Add HR 
                    </button>
                  </div>

                 
            </div> 
<br><br>			

                   <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New GD Quastion</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                    <div class="modal-body">



                <!-- Table -->
      
            
                   <form method="POST" action="verify.php">

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-portrait"></i><span>
                    </div>
                    <input class="form-control" placeholder="ENTER GD QUESTION OR TOPIC" type="text" name="gd_title" required="">
                  </div>
                </div>

                 <!--<div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="Link" type="text" name="gd_link" required="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <textarea class="form-control" placeholder="Points" name="gd_point" required=""></textarea> 
                  </div>
                </div>-->

 		           <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-outline-primary" name="gd_btn">Add</button>
                  </div>
                  </form>
                </div>
              </div>
              </div><!--end register form-->


                




              	</div>
                

               

                     
                      <div class="table-responsive">

                  
              <table class="table align-items-center table-flush" id="hr-gd-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Id</th>
                    
                    <th scope="col">Type</th>
					<th scope="col">RESPONSES</th>
                    <th scope="col">Question</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                
              </table>
            </div>
              

                          
                        
       


            <!-- pagination section -->
            <!-- end card footer-->

            </div>
          </div>
      </div>
      


                 

            <!-- start 2 Table section-->
   
      <!-- Table -->
      



                      <!-- Modal -->
                <div class="modal fade" id="exampleModalCenterhr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitlehr" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitlehr">Add HR Interview Question</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                    <div class="modal-body">



                <!-- Table 2 -->
      
            
                   <form method="POST" action="verify.php">

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-portrait"></i><span>
                    </div>
                    <textarea class="form-control" placeholder="Question"  name="hr_question" required=""></textarea> 
                  </div>
                </div>

                <!-- <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <textarea class="form-control" placeholder="Answer"  name="hr_answer" required=""></textarea> 
                  </div>
                </div>
-->
               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-outline-primary" name="hr_btn">Add</button>
                  </div>
                  </form>
                </div>
              </div>
              </div><!--end register form-->
                




                </div>
                </div><!-- card-header-->

          
                     
         



    <!--second table end-->
  <?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>
 <script>
  $('#hr-gd-table').DataTable({
      processing: true,
	    paging: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'get_gdhr_data.php'
      },
      
      columns: [
         { data: 'id'},
		  { data: 'type' },
		   { data: 'response_count' },
         { data: 'question' },
		
        
         
         { data: 'action' },
      ],
      columnDefs: [ {
        targets: [2,4], // column index (start from 0)
        orderable: false, // set orderable false for selected columns
     },
     {className:"user_name",targets:[0]},
     
     ]
   });
   </script>