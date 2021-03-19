<?php 
 include('security.php');
 include('includes/header.php');
 include('includes/navbar.php');
   
 
 ?>
<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Companies</a>

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
                                    <h5 class="card-title text-upperc ase text-muted mb-0">Admin Registered</h5>
                                    <?php 

                      $query = "SELECT username FROM register ORDER BY username";
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">Company Registered</h5>
                                    <span class="h2 font-weight-bold mb-0">2,356</span>
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
                        <div class="col-sm-4">
                            <h3 class="mb-0">Student Records</h3>
                        </div>
                        <!-- <div class="col">
                  <span>Start Time</span>
                  <input type="datetime-local" name="search_start" id="search_start" placeholder="Start Time " class="form-control">
                </div>
                <div class="col">
                  <span>End Time</span>
                  <input type="datetime-local" name="search_end" id="search_end" placeholder="End Time " class="form-control">
                </div>-->
                        



                    </div>
                </div>

                <div id="result" class="table-responsive">

              
                    <table class="table align-items-center table-flush display" id="results-table" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">UserName</th>
                                <th scope="col">TEST ID</th>
                                <th scope="col">SCORE</th>
                                <th scope="col">ENDTIME</th>
                                <th scope="col">STARTTIME</th>

                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div><!-- card-header-->






            <!-- pagination section -->


        </div>
    </div>




<?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>
 <script>
 $('#results-table').DataTable({
	 
      processing: true,
	    paging: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'get_results.php'
      },
      
      columns: [
         { data: 'user_name'},
		  { data: 'testid' },
		   { data: 'score' },
         { data: 'end_time' },
		
        
         
         { data: 'start_time' },
      ],
      columnDefs: [ {
        targets: [0], // column index (start from 0)
        orderable: false, // set orderable false for selected columns
     },
     {className:"user_name",targets:[0]},
     
     ]
   });
   </script>