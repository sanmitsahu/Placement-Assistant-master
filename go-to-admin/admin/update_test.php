<?php 
 //include('security.php');
include('db.php');
 include('includes/header.php');
 include('includes/navbar.php');
 //session_start();
 ?>

<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Update Test</a>
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">New Admins</h5>
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
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Remove Admin</h5>
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
                                <span class="text-nowrap">Since last week</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
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
                                <span class="text-nowrap">Since yesterday</span>
                            </p>
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
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
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






                    <?php 

                if (isset($_POST['updatebtn'])) {

                 $test_name = $_POST['updateuname'];

                $query = "SELECT * FROM tests_data WHERE test_name = '$test_name' ";
                 $query_run = mysqli_query($connection,$query);

                  foreach ($query_run as $row) {
                 ?>
                    <form method="POST" action="verify.php">

                        <div class="form-group">
                            <label>Test Id</label>
                            <input class="form-control" placeholder="" type="text" name='test_id'
                                value="<?php echo $row['test_id'];?>" readonly>

                        </div>

                        <div class="form-group">
                            <label>Test Name</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-portrait"></i><span>
                                </div>
                                <input class="form-control" placeholder="" type="text" name="test_name"
                                    value="<?php echo $row['test_name'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="" type="text" name="pass"
                                    value="<?php echo $row['pass'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-home"></i></span>
                                </div>
                                <input class="form-control" placeholder="" type="text" name="departmentname"
                                    value="<?php echo $row['department'];?>" disabled>
									<input type="hidden" name="department" value="<?php echo $row['department'];?>">
									
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
						  <div class="form-group">
                            <label>Max Attempt per User</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                                <input class="form-control" placeholder="" type="number" name="max_attempt"
                                    value="<?php echo $row['max_attempt'];?>" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="index.php">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                            <button type="submit" class="btn btn-outline-primary" name="updatetest">Update</button>
                        </div>
                        <input type="hidden" value="<?php /*echo $row['usertype'];*/?>" name="type">
                    </form>
                    <?php 
                }

               
              }
              else
              	{  
				   
				  //echo $_SESSION['status'];
				   	   ?>
                    <a href="addtest.php"><button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Back</button></a> <?php 
				   			   	
				
				   
          		}

 ?>









                </div>
            </div>
        </div>

        <!--end register form-->



    </div>
    <!--end fluid container -->

















    <?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>