<?php 
include('security.php'); 
  //session_start();
 include('includes/header.php');
 include('includes/navbar.php');
 ?>
<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Dashboard</a>
<?php include('includes/navbarend.php'); ?>

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
                                    <h5 class="card-title text-uppercase text-muted mb-0">Heading</h5>
                                    <span class="h2 font-weight-bold mb-0">350,897</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                    <span class="h2 font-weight-bold mb-0">2,356</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                <span class="text-nowrap"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Heading</h5>
                                    <span class="h2 font-weight-bold mb-0">924</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                <span class="text-nowrap"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Heading</h5>
                                    <span class="h2 font-weight-bold mb-0">49.65%</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap"></span>
                            </p>
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
                            <h3 class="mb-0">Test Records</h3>
                        </div>
                      

                    </div>
<div class="modal fade" id="exampleModalCenter_file" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">ADD THE CSV FILE</h5>
                                    <button type="button" class="close file" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <!-- Table -->


                                    <form method="POST" action="verify.php" enctype='multipart/form-data'>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-portrait"></i><span>
                                                </div>
                                                <input class="form-control" type="file" name="file"
                                                    required="">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="download.php?name=users_data.csv"<button type="button" class="btn btn-outline-primary">
                                        sample
                                    </button></a>
                                            <button type="submit" class="btn btn-outline-primary"
                                                name="add_many_tests">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
                                    <button type="button" class="close single" data-dismiss="modal" aria-label="Close">
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
                                                <input class="form-control" placeholder="Test Id" type="text" name="test_id"
                                                    required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Test Name" type="text"
                                                    name="test_name" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Password" type="password"
                                                    name="pass" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Confirm Password"
                                                    type="password" name="confirmpass" required="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Department" type="text"
                                                    name="department" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>No of Ques</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-pencil-square"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="" type="number" name="no_of_ques"
                                                    value="<?php echo $row['no_of_ques'];?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Time Limit</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-pencil-square-o"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="" type="number" name="time_limit"
                                                    value="<?php echo $row['time_limit'];?>" >
                                            </div>
                                        </div>

                                            <div class="form-group">
                                            <label>Min Marks</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-pencil-square-o"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="" type="number" name="min_marks"
                                                    value="<?php echo $row['min_marks'];?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Tests Created</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-pencil-square-o"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="" type="number" name="test_created"
                                                    value="<?php echo $row['test_created'];?>" >
                                            </div>
                                        </div>
  
                                        

                                        

                                        <div class="modal-footer">
                                            
                                            <button type="submit" class="btn btn-outline-primary"
                                                name="addtest">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end register form-->



                </div><!-- card-header-->



                <div class="table-responsive">

                
                    <table class="table align-items-center table-flush display" id="users_data" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Test Id</th>
                                <th scope="col">Test Name</th>
                                <th scope="col">Password</th>
                                <th scope="col">Department</th>
                                <th scope="col">No of Ques</th>
                                <th scope="col">Time Limit</th>
                                <th scope="col">Min Marks</th>
                                <th scope="col">Test Created</th>
								<th scope="col">Max attempt for users</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>



            </div>
        </div>
    </div>











    <?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>
 <script>
  $('#users_data').DataTable({
      processing: true,
        paging: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'get_test_data.php'
      },
      
      columns: [
         { data: 'test_id'},
          { data: 'test_name' },
         { data: 'pass' },
        
        
         
          { data: 'department' },
         { data: 'no_of_ques' },
         { data: 'time_limit' },
         { data: 'min_marks' },
         { data: 'test_created' },
		 { data: 'max_attempt' },
        
        
         
         { data: 'action' },
      ],
      columnDefs: [ {
        targets: [3,4,9], // column index (start from 0)
        orderable: false, // set orderable false for selected columns
     },
     {className:"user_name",targets:[0]},
     
     ]
   });
 
 </script>