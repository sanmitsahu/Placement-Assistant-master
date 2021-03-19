<?php 
 include('security.php');
 include('includes/header.php');
 include('includes/navbar.php');
 
 ?>


<!--link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"-->


         <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Student Manager</a>
   
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
                      echo ' <span class="h2 font-weight-bold mb-0"> '.$row.'</span>';
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






                   <!-- Modal -->
                <div class="modal fade" id="updation" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="updationTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="updationTitle">Student Placement details</h5>
                          <button type="button" id="close_update1" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                <div class="modal-body" id="add_update_form">
        
      	
                <!-- Table -->
      
            
                    
                    
                </div>
              </div>
              </div><!--end register form-->

              	</div>






       <!-- start Table section-->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
                
				    <div class="row align-items-center" >
	               <div id="register_user_message">
                       <?php  
//                       if ($_GET["message"]=="success")
//                       {
//                           echo "<p style='color:green;'>Users registered.</p>";
//                       }
                       ?>
                        </div>
                        		<form method='POST' action="verify.php" id="register_users" enctype='multipart/form-data'>
			<div align = "center">
				<div class="col text-right"><div align = "center"> <h3 class="mb-0">Upload Csv file of all users who are to be registered</h3></div>
					<div class="col"><input type='file' id="csv" name='file' /></div>
				<p>                  <div class="col text-right">
                     <button type="submit" class="btn btn-primary" name="register_user" id="register_submit">
                     <i class="ni ni-fat-add">&nbsp;</i>Add uploaded users  
                    </button>
                  </div>
                    
			</div>
		
                

            </div>  
                                    </form>

                
                
                					
                
                 
                
                

             
                      
                      
                      
                      
                      
                      
                      
                      
                      
                <div id="error1" style="color:#f23a3a;" ><?php echo $error; ?></div><br>      
                      
                </div><!-- card-header-->

          
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                     
                      <div class="table-responsive mt-5">

 
              <table class="table align-items-center  table-flush display" id="company_data">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Email ID</th>
                    <th scope="col">Form status</th>
                    <th scope="col">Placement category status</th>
                    <th scope="col">Company Reference number</th>
                    <th scope="col">Add placement detail</th>

                  </tr>
                </thead>
 
              </table>
            </div>
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
            <!-- pagination section
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div> end card footer-->


                    
                    
                    
                    
                    
                    
          </div>
        </div>
      </div>

            
            
            
            

            

          
      
      <script type="text/javascript">
 
    function placed_student(data)
{
   // console.log(data)

    $.post('s_data.php',{data:data},function(returnedData){  document.getElementById("add_update_form").innerHTML = returnedData;}).fail(function(){console.log("update load error");});
    
    //document.getElementById("demo").innerHTML = "Paragraph changed!"
   //you can do anything with data, or pass more data to this function. i set this data to modal header for example
  // $("#myModal .modal-title").html(data)
   $("#updation").modal();
}
          
    var table =  $('#company_data').DataTable({
      processing: true,
      paging: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'get_students.php'
      },
      
      columns: [
          { data: 'email_id'},

          { data: 'f_status' },
          { data: 'categ' },
          
          { data: 'Ref_no' },
          { data: 'add_detail' },
      ],
      columnDefs: [ {
        targets: [0,2,3], 
        orderable: true, 
     },
                   {
        targets: [1,4], 
        orderable: false, 
     },

     
     ],
        
    dom: 'Bfrtip',
         //dom: 'frtipB',
    select: true,
                  select: {
        style:    'os',
        selector: 'td:not(:last-child)'
    },
    "lengthMenu": [[ 50, 100, 500,1000,2000], [ 50, 100, 500,1000,2000]],
    buttons: [ 
                {
            text: 'Get selected data',
            action: function () {
                var count = table.rows( { selected: true } ).count();
                // var Email = this.Email;
                // selected.push(Email);
                 console.log(table.rows( { selected: true } ).data());

                events.prepend( '<div>'+count+' row(s) selected</div>' );
            }
        },
        {
            text: 'Select all',
            action: function () {
                table.rows().select();
            }
        },
        {
            text: 'Select none',
            action: function () {
                table.rows().deselect();
            }
        },
        'copy','excel', 'csv', 'pdf', 'pageLength'
    ]
        
   });
          
          
          
          
          
$(document).ready(function() {


   


    
    

	

    
})
    </script>
                  
  <?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>