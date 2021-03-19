<?php 
 include('security.php');
 include('includes/header.php');
 include('includes/navbar.php');
 
 ?>


<!--link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"-->


         <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Companies</a>
   
    <?php include('includes/navbarend.php'); ?>






<?php 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(array_key_exists("error",$_GET))
{
    if($_GET["error"]==101)
    {
        $error="Couldn't add the company details. <br> A company with the entered reference number already exists";
    }
    
}

?>


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
                <div class="col">
                  <h3 class="mb-0">Companies' Records</h3>
                </div>
                  <div class="col text-right">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                     <i class="ni ni-fat-add">&nbsp;</i>Add Company 
                    </button>
                  </div>
            </div>  

                
                
                
                
                
                   <!-- Modal -->
                <div class="modal fade" id="updation" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="updationTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="updationTitle">Update Company data</h5>
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
                             

           
                      
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                   <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Company</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                    <div class="modal-body">
        
      	
                <!-- Table -->
      
            
                   <form method="POST" action="verify.php" id ="companymodal" method="post" enctype="multipart/form-data"  >

                <div class="form-group">
                    
                  <div class="input-group input-group-alternative mb-3">
                      
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-portrait"></i><span>
                </div>
                    <input class="form-control" placeholder="Company reference number" type="text" name="refno" required="">
                  </div>
                </div>

                 <div class="form-group">
                     <div class="mb-1">Date of Announcement:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar " ></i></span>
                    </div>
                    <input class="form-control" type="date" name="doa"  id="doa" required="" >
                  </div>
                </div>
                      
                 <div class="form-group">
                     <div class="mb-1">For Batch:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-university " ></i></span>
                    </div>
                                   <?php
              
              $currently_selected = date('Y') ; 
              $earliest_year = 2000; 
              $latest_year = date('Y') + 5; 
              echo '<select class=" form-control" name="batch" value="$batch">';             
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
                
                echo'<option value="'.$i.'"'.($i === ($currently_selected) ? ' selected="selected"' : '').'>'.$i.'</option>';
              }
              echo'</select>';
              ?>
                  </div>
                </div>
                      
                      
             


                      
                 <div class="form-group">
                     <div class="mb-1">Category : </div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-book" ></i></span>
                    </div>
                      <select name="categ"  class="form-control"  id="categ" required="" >
                          <option value="Non-Dream">Non-Dream</option>
                          <option value="Dream">Dream</option>
                          <option value="Super-Dream">Super-Dream</option>
                      
                      </select>
                    
                  </div>
                </div>
                      
                      
                      
                      
                 <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="Company's name" name="name"  id="name" required="" >
                  </div>
                </div>
                      
                 <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="Company's Address" name="addr"  id="addr" required="" >
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" >
                  </div>
                </div>
                      
                      
                <div class="form-group">
                    <div class="mb-1">Last date to register:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-hourglass"></i></span>
                    </div>
                    <input class="form-control" type="datetime-local" name="regdate" required="">
                  </div>
                </div>
                      
                      
                <div class="form-group">
                    <div class="mb-1">Upload main document:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-file-word"></i></span>
                    </div>
                    <input class="form-control" type="file" name="maindoc[]" required="">
                  </div>
                </div>
                      
                      


                      
                <div class="form-group">
                    <div class="mb-1">Upload attachments:</div>
                    
                    <div class="input_fields_wrap_1">

   
                        
                    </div>
                        <div class="input-group-btn" width=10px> 
                            &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success ovrdbtn add_field_button_1" type="button"><i class="fa fa-plus"></i>
                            </button>
                        </div> 

                </div>
                      
                      
 		           <div class="modal-footer">
                       <button type="button" class="btn btn-danger" id="clear" onclick="document.getElementById('companymodal').reset();">Clear</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-outline-primary" name="add_company">Add</button>
                  </div>
                  </form>
                </div>
              </div>
              </div><!--end register form-->

              	</div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                    
                      
                      
                      
                      
                      
                      
                      
                      
                      
                <div id="error1" style="color:#f23a3a;" ><?php echo $error; ?></div><br>      
                      
                </div><!-- card-header-->

          
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                     
                      <div class="table-responsive  ">

 
              <table class="table align-items-center table-flush display" id="company_data">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Company Reference number</th>
                    <th scope="col">Registration deadline</th>
                    <th scope="col">Status</th>
                    <th scope="col">View/Edit data</th>
                    <th scope="col">Process now</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Announcement Date</th>
                    <th scope="col">For Batch</th>
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

            
            
            
            

            

            
            
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script-->
      
      <script type="text/javascript">
          //document.getElementsByName('traverse1[]').length

         
  
   function add_update_attach()
    {
          //  document.getElementById("hide_it01").setAttribute("hidden",true);
            //document.getElementById("hide_it01").removeAttribute("hidden");
                               
    
	//var max_fields_5     = 25; //maximum input boxes allowed
	var wrapper_5   		= $(".input_fields_wrap_5"); //Fields wrapper
	var add_button_5      = $(".add_field_button_5"); //Add button ID
	
	//var x5 = 1; //initlal text box count
        //on add input button click
	//	if(x5 < max_fields_5){ //max input box allowed
	//		x5++; //text box increment
			$(wrapper_5).append('	         <div><br>      <input type="text" id="traverse7"  class="form-control" value="traverse" name="traverse7[]" hidden>             <div class="input-group input-group-alternative mb-1">                    <div class="input-group-prepend">                      <span class="input-group-text"><i class="fa fa-folder"></i></span>                    </div>                    <input class="form-control" type="file" name="attach[]" required="">                    <div id="error2" name="error2[]" style="color:#f23a3a;" ><?php// echo $error2; ?></div>&nbsp;&nbsp;&nbsp;<div><button onclick="remov_update_attach(this)" class="btn ovrdbtn btn-outline-danger remove_field_5" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div>                  </div></div>   '); //add input box

    //}

    }
          
          
          
        function add_update_main()
          {
                //document.getElementById("add_main").setAttribute("hidden",true);

	var wrapper_6   		= $(".input_fields_wrap_6"); //Fields wrapper
	var add_button_6      = $(".add_field_button_6"); //Add button ID
	
			$(wrapper_6).append('	                                          <div>       <input class="form-control" type="file" id="maindoc" name="maindoc[]"required="">         <input type="text" id="traverse6"  class="form-control" value="traverse" name="traverse6[]" hidden>                                      </div>'); //add input box
	
          }

          function deleteModal(x)
          {
              //alert(x);

                if (confirm("Do you want to delete Company with reference number "+x+" permanently ? ")) {
                    $.post('verify.php',{delete_company:x},function(returnedData){  
                        //console.log(returnedData);
                        dataTable.draw();

                    }).fail(function(){});

                    //alert("deleted");
                } 
                else {
                    //alert("cancelled");
                }
                
          }
    function remov_update_attach($this)
          {
             var xar=$($this).parent().parent().parent('div').find( "#traverse7" ).val();
              
            //$.post('c_data.php',{delete_doc:xar},function(returnedData){  console.log( );}).fail(function(){console.log("error");});
              //alert(xar);
              if(xar!="traverse"){
            if (confirm("Do you want to delete "+xar+" permanently ? ")) {
                $.post('verify.php',{delete_doc:xar},function(returnedData){  $($this).parent().parent().parent('div').remove();}).fail(function(){console.log("delete doc error");});
                 
                //alert("deleted");
            } 
            else {
                //alert("cancelled");
            }
              }
	
          }
          
    function remov_update_main($this)
          {
                //document.getElementById("add_main").removeAttribute("hidden");
            var refr=$("#ucompanymodal").find( "#refno" ).val();
            var xar=$($this).parent().parent('div').find( "#traverse6" ).val();
              if(xar!="traverse"){
                if (confirm("Do you want to delete "+xar+" permanently ? ")) {
                    $.post('verify.php',{delete_doc:xar,stat:1,ref:refr},function(returnedData){  
                        $(".remove_field_6").parent('div').remove(); 
                        add_update_main();
                        document.getElementById("close_update").setAttribute("hidden",true);
                        //document.getElementById("close_update1").setAttribute("hidden",true);

                    }).fail(function(){console.log("delete doc error");});

                    //alert("deleted");
                } 
                else {
                    //alert("cancelled");
                }
                }
	            //user click on remove text
             // alert(xar);
             // $.post('c_data.php',{delete_doc:xar},function(returnedData){  console.log( );}).fail(function(){console.log("error");});

	
          }
          
          
          
    
    function updateModal(data)
{
   // console.log(data)

    $.post('c_data.php',{data:data},function(returnedData){  document.getElementById("add_update_form").innerHTML = returnedData;}).fail(function(){console.log("update load error");});
    
    //document.getElementById("demo").innerHTML = "Paragraph changed!"
   //you can do anything with data, or pass more data to this function. i set this data to modal header for example
  // $("#myModal .modal-title").html(data)
   $("#updation").modal();
}
   

   
    var dataTable = $('#company_data').DataTable({
      processing: true,
        paging: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'get_companies.php'
      },
      dom: 'Bfrtip',
         //dom: 'frtipB',
          lengthMenu: [[ 50, 100, 500,1000,2000], [ 50, 100, 500,1000,2000]],
        buttons: [ 
                    {
                text: 'Get selected data',
                action: function () {
                    var count = table.rows( { selected: true } ).count();
                    // var Email = this.Email;
                    // selected.push(Email);
                    // console.log(selected);
 
                    events.prepend( '<div>'+count+' row(s) selected</div>' );
                }
            },
            {
                text: 'Select all',
                action: function () {
                    dataTable.rows().select();
                }
            },
            {
                text: 'Select none',
                action: function () {
                    dataTable.rows().deselect();
                }
            },
            'copy','excel', 'csv', 'pdf', 'pageLength'
        ],
        select: true,
      columns: [
          { data: 'Company_name'},
          { data: 'Ref_no' },
          { data: 'Reg_deadline' },
          { data: 'status' },
          { data: 'View/Edit_data' },
          { data: 'Process_now' },
          { data: 'Delete' },
          { data: 'Announcement_date' },
          { data: 'year' },

      ],
      columnDefs: [ {
        targets: [0,1,2,3,7,8], 
        orderable: true, 
     },
                   {
        targets: [4,5,6], 
        orderable: false, 
     },

     
     ]
   });
          
          
          
          
          
$(document).ready(function() {


    var start = 2000;
    var end = new Date().getFullYear();
    var start = end-5;
    var options = "";
    for(var year = start ; year <=(end+5); year++){
      options += "<option>"+ year +"</option>";
    }
		//document.getElementsByClassName("year")[document.getElementsByClassName("year").length-1].innerHTML = options;
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
	var max_fields_1     = 25; //maximum input boxes allowed
	var wrapper_1   		= $(".input_fields_wrap_1"); //Fields wrapper
	var add_button_1      = $(".add_field_button_1"); //Add button ID
	
	var x1 = 1; //initlal text box count
	$(add_button_1).click(function(e){ //on add input button click
		e.preventDefault();
		if(x1 < max_fields_1){ //max input box allowed
			x1++; //text box increment
			$(wrapper_1).append('	         <div><br>                <div class="input-group input-group-alternative mb-1">                    <div class="input-group-prepend">                      <span class="input-group-text"><i class="fa fa-folder"></i></span>                    </div>                    <input class="form-control" type="file" name="attach[]" required="">                    <div id="error2" name="error2[]" style="color:#f23a3a;" ><?php// echo $error2; ?></div>&nbsp;&nbsp;&nbsp;<div><button class="btn ovrdbtn btn-outline-danger remove_field_1" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div>                  </div></div>   '); //add input box
		}
	});
	
	$(wrapper_1).on("click",".remove_field_1", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent().parent().parent('div').remove(); x1--;
	});
    
    
      
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        var wrapper_3   		= $(".input_fields_wrap_3"); //Fields wrapper

        $(wrapper_3).on("click",".remove_field_3", function(e){ //user click on remove text
            
            e.preventDefault(); $(this).parent('div').remove(); 
            $(wrapper_3).append('	<input class="form-control" type="file" name="maindoc[]" required="">	'); //add input box
        });
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
    
    
    
    
    
  /*
  
  
  
                          </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <form action="verify.php" method="POST">
                            <input type="hidden" name="companyname" value="<?php echo $row['company_name'];?>">
                              <!-- Button trigger modal -->
                              <button type="submit" class="dropdown-item" name="approve_status">
                              <i class="ni ni-fat-add">&nbsp;</i>Approve
                             </button>
                           </form>

                           <form action="verify.php" method="POST">
                            <input type="hidden" name="companyname" value="<?php echo $row['company_name'];?>">
                              <!-- Button trigger modal -->
                              <button type="submit" class="dropdown-item" name="reject_status">
                              <i class="ni ni-fat-add">&nbsp;</i>Reject
                             </button>
                           </form>

                           <form action="verify.php" method="POST">
                            <input type="hidden" name="delcomp" value="<?php echo $row['company_name'];?>">
                            <button type="submit" class="dropdown-item" name="deletecomp">
                             <i class="ni ni-fat-remove">&nbsp;</i>Remove
                            </button> 
                        </form>
                        </div>
  
  
  
  
  
  
  
  
  
  
  
  */  

    
    

	

    
})
    </script>
                  
  <?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>