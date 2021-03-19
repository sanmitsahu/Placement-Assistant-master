<?php 
 include('security.php'); 
 include('includes/header.php');
 include('includes/navbar.php');
 
 ?>
<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Student Applications</a>

<?php include('includes/navbarend.php'); ?>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
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
    
      <!-- Modal content-->
      <div style="padding-left: 10px;padding-right: 20px;" class="card shadow">
        <div class="card-header border-0">
            <h3>Add filter parameters</h3>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          
        </div>
        <div>
            <form class="needs-validation cst-bclass" id="qwerq" method ="post" action="testgetsummary.php" enctype="multipart/form-data" >
            
            <div style="padding-left: 10px;" class="row mb-2">CGPI above : <input type="number"  min="1" max="10"  class="ml-2"  id="searchBycgpi" ></div>
            <div style="padding-left: 10px;" class="row mb-2"> Programme : <select class="ml-2" id="searchByName"><option selected></option><option >B. Tech</option><option>M. Tech</option></select></div> 
            <!-- <div class="row mb-2"> Programme :      <input type="checkbox" name="vehicle1" id="searchByName[]">
                                                    <label for="vehicle1"> B. Tech</label><br>
                                                    <input type="checkbox" name="vehicle2" id="searchByName[]">
                                                    <label for="vehicle2"> M. Tech</label><br></div>  -->
                <div style="padding-left: 10px;" class="row mb-2"> Department : <select class="ml-2" id="searchByGender"><option selected></option>                  
                    <option >Computer</option>
                    <option >Mechanical</option>
                    <option >Electronics</option>
                    <option >I.T.</option>
                    <option >EXTC</option>
                  </select></div>
                  <!-- <button id="deleteButton">Delete</button></div>  -->
<!--             <div class=" mb-2">Add skill filters: <div class="add_skill_wrap" id="add_skill_wrap"></div>                           <div class="input-group-btn" > <div class="mb-3">	<span ><input id="skill" value="S" name="skill[]" type="text"></span>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm ovrdbtn btn-outline-danger remove_field_1" type="button"><i class="fa fa-minus" style="font-size:8px"></i></button></div><div class="mb-3">	<span ><input id="skill" value="S" name="skill[]" type="text"></span>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm ovrdbtn btn-outline-danger remove_field_1" type="button"><i class="fa fa-minus" style="font-size:8px"></i></button></div>
								&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success ovrdbtn btn-sm add_field_button_1"  type="button"><i class="fa fa-plus"style="font-size:10px"></i>
                                </button>
				            </div></div> -->
            </form>
        </div>
<!--         <div>
          <button type="button" id="apply_filters" name="apply_filters" class="btn btn-default">Apply filters</button>
        </div> -->
      </div>
      
    </div>
  </div>
    <div class="row">

        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <?php if (isset($_GET['ref'])) { ?>
                            <h1 class="mb-0">Student Application details for Company Reference number : <?php echo  $_GET["ref"] ?></h1>
                            <?php }
                            else { ?>
                            <h1 class="mb-0">Company Reference number invalid/not found!!</h1>
                            <?php } ?>
                        </div>


                    </div>
                </div>
                <div class="card-body">
                    
    <!-- card-header-->
                <div class="table-responsive">
                      <!-- <button type="button" class="btn mb-4 ml-9 btn-outline-primary btn-lg" data-toggle="modal" data-target="#myModal">Add filters</button> -->
                    <table class="table align-items-center table-flush display" id="resume_summary" cellspacing="0" width="100%">
                        <thead class="thead-light">
<!--                           <button id="selectall">selectall</button></div> 
                        <button id="selectnone">selectnone</button></div> -->
                            <tr>
<!--                                 <th scope="col"><button id="selectall">selectall</button></div> 
                        <button id="selectnone">selectnone</button></div> </th> -->
                                <th scope="col">Name</th>
                                <th scope="col">Email ID</th>
                                <th scope="col">Programme</th>
                                <th scope="col">Roll Number</th>
                                <th scope="col">Department</th>
                                <th scope="col">Technical Skills</th>
                                <th scope="col">Number of Internships</th>
								<th scope="col">SSC/ICSE</th>
								<th scope="col">HSC</th>
                                <th scope="col">SY</th>
								<th scope="col">TY</th>
                                <th scope="col">LY</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email ID</th>
                                <th scope="col">Programme</th>
                                <th scope="col">Roll Number</th>
                                <th scope="col">Department</th>
                                <th scope="col">Technical Skills</th>
                                <th scope="col">Number of Internships</th>
								<th scope="col">SSC/ICSE</th>
								<th scope="col">HSC</th>
                                <th scope="col">SY</th>
								<th scope="col">TY</th>
                                <th scope="col">LY</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

<button class="btn  btn-success mt-5 ml-8" type="button" onclick="companystatus('<?php echo $_GET['ref']?>')">Add Company to submitted</button>
                </div>
<!--onclick="updateModal( \''.$row['Ref_no'].'\')"-->




            </div>
        </div>


    </div>
	<br><br>
<script type="text/javascript">
   function companystatus(x)
  {
      //alert(x);

        if (confirm("Do you want to change status of Company with reference number "+x+" to submitted ? ")) {
            $.post('verify.php',{status_company:x},function(returnedData){  
                //console.log(returnedData);
                //dataTable.draw();
                     window.location.href="companies.php";
            }).fail(function(){});

            //alert("deleted");
        } 
        else {
            //alert("cancelled");
        }

  }             
$(document).ready(function() {
    //console.log("hello");
    var x ='<?php echo $_GET["ref"]?>';
    //console.log(x);
    if (x==""){
        //console.log("x");
    }
    //alert(x);
    $(document).keydown(function(e){
  var key = e.charCode || e.keyCode;
  if (key == 13) {
    e.preventDefault();
  } else {
   
  }    
});
      var selected = [];
  var dataTable = $('#resume_summary').DataTable({



      'processing': true,
        'paging': true,
      'serverSide': true,
      'destroy':true,
      'serverMethod': 'post',
     
      
    //'searching': false, // Remove default Search Control
    'ajax': {
       'url':'applicationgetsummary.php',
       'data': function(data){
          // Read values
          var gender = $('#searchByGender').val();
          var name = $('#searchByName').val();
          var cgpi = $('#searchBycgpi').val();

            data.ref_no=x;

          // Append to data
          data.searchByGender = gender;
          data.searchByName = name;
          data.searchBycgpi = cgpi;
           console.log(data);
       }
    },
    // "rowCallback": function( row, data ) {
    //         if ( $.inArray(data.Email, selected) !== -1 ) {
    //             $(row).addClass('selected');
    //         }
    //     },
    
    'columns': [
        { data: 'Name'},
        { data: 'Email' },
        { data: 'prog' },
        { data: 'rollno' },
        { data: 'dept' },
        { data: 'Technical_skills' },
        { data: 'num_internships' },
        { data: 'SSCICSE' },
        { data: 'HSC' },
        { data: 'SY' },
        { data: 'TY' },
        { data: 'LY' },
    ],

        dom: 'Bfrtip',
        select: true,
          select: {
        style:    'os'
        //selector: 'td:not(:last-child)'
    },
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
        ]
     //      columnDefs: [ {
     //    targets: [5,6,7,8,9,10,11], // column index (start from 0)
     //    orderable: false, // set orderable false for selected columns
     // },
     // //{className:"user_name",targets:[0]},
     
     // ],
          // initComplete: function () {
          //       dataTable.buttons().container()
          //         .appendTo( $('.col-sm-6:eq(0)', dataTable.table().container() ) );
          //     }

  });
  // $('#resume_summary').on('click', 'tr', function () {
  //       var Email = this.Email;
  //       var index = $.inArray(Email, selected);
 
  //       if ( index === -1 ) {
  //           selected.push( Email );
  //       } else {
  //           selected.splice( index, 1 );
  //       }
 
  //       $(this).toggleClass('selected');
  //   } );
//     $('#resume_summary').on('click', '#selectnone', function () {
//         // var Email = this.Email;
//         // var index = $.inArray(Email, selected);

//         // while(selected.length>=0)
//         // {
//         //   if( index === 1 )
//         //   {
//         //     selected.pop( Email );
//         //     $(this).toggleClass('selected');
//         //     selected.length-=1;
//         //   }

//         // }
//         alert('hi');
 
//         // if ( index === -1 ) {
//         //     selected.push( Email );
//         // } else {
//         //     selected.splice( index, 1 );
//         // }
 
// //         dataTable.rows({
// // page: 'current'
// // }).deselect();
//     } );

    //   $('#deleteButton').click(function() {
    //     if (dataTable.rows({
    //             selected: true
    //         }).count() > 0) {
    //         dataTable.rows().deselect();
    //         return;
    //     }

    //     dataTable.rows().select();
    // });
  // $('#select_all').on('click',function(){
  //   selected.splice( 0, selected.length );

  // });

  // dataTable.buttons().container()
  //   .appendTo( $('.col-sm-6:eq(0)', dataTable.dataTable().container() ) );

  $('#searchByName').change(function(){
    dataTable.draw();
  });

  $('#searchByGender').change(function(){
    dataTable.draw();
  });
    $('#searchBycgpi').change(function(){
//            if (e.keyCode == 13) {
//         dataTable.fnFilter( this.value );
  //  }
    dataTable.draw();
  });
         $('#searchBycgpi').keyup(function(){
//                 if (e.keyCode == 13) {
//         dataTable.fnFilter( this.value );
  //  }
    dataTable.draw();
  });


    


    
    
    
    
    
    
    
    
    
    
    var max_fields_1     = 25; //maximum input boxes allowed
    var wrapper_1           = $(".add_skill_wrap"); //Fields wrapper
    var add_button_1      = $(".add_field_button_1"); //Add button ID
    
    var x1 = 1; //initlal text box count
    $(add_button_1).click(function(e){ //on add input button click
        e.preventDefault();
        if(x1 < max_fields_1){ //max input box allowed
            x1++; //text box increment
            $(wrapper_1).append('<div class="mb-3"> <span ><input id="skill" value="S" name="skill[]" type="text"></span>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm ovrdbtn btn-outline-danger remove_field_1" type="button"><i class="fa fa-minus" style="font-size:8px"></i></button></div>'); //add input box
        }
    });
    
    $(wrapper_1).on("click",".remove_field_1", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x1--;
    });
       
})

    </script>
    <?php 
 include('includes/script.php');
 include('includes/footer.php');
 ?>