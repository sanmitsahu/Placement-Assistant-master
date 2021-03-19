<?php 
//include("security.php");
 include('includes/header.php');
 include('includes/navbar.php');
 //include('db.php');
 ?>
<?php
$primary_key="";
$Fname="";
$Lname="";
$Rno="";
$dept="";
$Email="";
$contact="";
$erro4="";

//print_r($_FILES);

//"vatsal.pathak003@somaiya.edu";
//$_SESSION['username']="s23@somaiya.edu";
if(isset($_SESSION['username'])){
    $primary_key = $_SESSION['username'];
}







if(array_key_exists("email",$_GET))

{
    if(!empty($_GET['email'])) {
    if($_GET['email']==1)   {
        $erro4 .= "Enter a valid somaiya Email ID!<br>";
    }
    else    {
        $erro4 = "";
    }
####if-else

}
}



    {
    
//echo $_SESSION['username'];
if($connection)

{
	echo "fetching data";

    $query="select * from `personal` where Email='$primary_key'";

    if( $result=mysqli_query($connection,$query))
    {
        
            
        
        if(mysqli_num_rows($result)>0)
        {
            
			//echo "query inside";

            //$qrun=mysqli_query($connection,$q);
            if(mysqli_num_rows($result)>0){
                while($row1=mysqli_fetch_array($result)){
				//	print_r( $row1);
					//echo "RESULT";
                    $Fname=$row1['Fname'];
                    $Lname=$row1['Lname'];
                    $Rno=$row1['Rno'];
                    $dept=$row1['dept'];
                    $Email=$row1['Email'];
                    $contact=$row1['contact'];
                    }
            }


        }
        
    }
    
        $out1="";
        $out2="";

        $q="select * from `resume` where Email='$primary_key'"; 
        $qrun=mysqli_query($connection,$q);
        if(mysqli_num_rows($qrun)>0){
         //   echo getcwd();
            while($row1=mysqli_fetch_array($qrun)){
                //echo "aaa";
                //echo $row2['coursect'];
                $out1.='	    <div><br>                                         			<div class="input-group control-group after-add-more">							Uploaded Resume:  &nbsp;<a href="viewfile.php?location='.$row1['resume'].' "><input type="file" id="resume"  class="form-control" name="resume[]" hidden>
         <input type="text" id="traverse1"  class="form-control" value="t" name="traverse1[]" hidden>
                <button class="btn  btn-outline-primary " type="button">view file</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn ovrdbtn btn-outline-danger remove_field_1" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button>                          </div> <div id="error_rs" name="error_rs" style="color:#f23a3a;padding-left:20px;" ><?php// echo $error2; ?></div></div>'; //add input box
        }
        }
    
        $q="select * from `picture` where Email='$primary_key'"; 
        $qrun=mysqli_query($connection,$q);
        if(mysqli_num_rows($qrun)>0){
            echo getcwd();
            while($row1=mysqli_fetch_array($qrun)){
                //echo "aaa";
                //echo $row2['coursect'];
                $out2.='	<div><br>                                         			<div class="input-group control-group after-add-more">							Uploaded Profile Picture:  &nbsp;<a href="viewfile.php?location='.$row1['picture'].' "><input type="file" id="picture"  class="form-control" name="picture[]" hidden>
         <input type="text" id="traverse2"  class="form-control" value="t" name="traverse2[]" hidden>
                <button class="btn  btn-outline-primary " type="button">view file</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn ovrdbtn btn-outline-danger remove_field_2" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button>                       </div> <div id="error_ra" name="error_ra" style="color:#f23a3a;padding-left:20px;" ><?php// echo $error2; ?></div></div> 	'; //add input box
        }
        }
    
    
   
        
}
    
    

else
{
  die("connection failed because ".mysqli_connect_error() );
}
    
    }

  
    
    
    

 


 ?>



  <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Profile</a>
 <?php include('includes/navbarend.php'); ?>
    <!-- Header -->

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
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="container">
        <!-- Navigation -->

        
      <div class="py-5 text-center">
        <legend>Personal Profile</legend>
      </div>
<div id="error" align="center"></div>
      <div class="row justify-content-xl-center">
          
        <div class="col-md-8 order-md-1">
          
           
          <form class="needs-validation cst-bclass" id="qwerq" method ="post" action="data_fetch.php" enctype="multipart/form-data" >
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control"  name="firstName"  id="firstName" value="<?php echo htmlspecialchars($Fname);?>" placeholder="Your First Name" required>
                <div id="error1" style="color:#f23a3a;" ><?php// echo $error1; ?></div>
                  <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo htmlspecialchars($Lname);?>" placeholder="Your Last Name" required>
                <div id="error2" style="color:#f23a3a;" ><?php global $erro2;echo $erro2; ?></div>
                  <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="rno">Roll Number</label>
              <div class="input-group">
                <input type="number" class="form-control" name="rno" id="rno" placeholder="Roll Number" value="<?php echo htmlspecialchars($Rno);?>" required>
                <div id="error3" style="color:#f23a3a;" ><?php global $erro3;echo $erro3; ?></div>
                  <div class="invalid-feedback" style="width: 100%;">
                  Your Roll Number is required.
                </div>
              </div>
            </div>


            <div class="mb-3">
              <label for="dpt">Department&nbsp</label>
  

                  <select class="form-control" name="dept" id="dept" id="sel1" >
                    <option <?php if($dept=='Computer'){ echo htmlspecialchars("selected");} ?>>Computer</option>
                    <option <?php if($dept=='Mechanical'){ echo htmlspecialchars("selected");} ?>>Mechanical</option>
                    <option <?php if($dept=='Electronics'){ echo htmlspecialchars("selected");} ?>>Electronics</option>
                    <option <?php if($dept=='I.T.'){ echo htmlspecialchars("selected");} ?>>I.T.</option>
                    <option <?php if($dept=='EXTC'){ echo htmlspecialchars("selected");} ?>>EXTC</option>
                  </select>
                            
            </div>

              
            <div class="mb-3">
              <label for="email">Somaiya Email ID<span class="text-muted"></span></label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($primary_key);?>" placeholder="you@somaiya.edu" readonly>
              <div id="error4" style="color:#f23a3a;" ><?php global $erro4; echo $erro4; ?></div>
                <div class="invalid-feedback">
                Please enter a valid email address .
              </div>
            </div>             

            <div class="mb-3">
              <label for="phn">Contact Number </label>
              <input type="tel" name="phn" class="form-control" id="phn" value="<?php echo htmlspecialchars($contact);?>" placeholder="Contact Number" pattern="[0-9]{10}" required>
                <div id="error5" style="color:#f23a3a;" ><?php global $erro5;echo $erro5; ?></div>
            </div>
              
              <div class="invalid-feedback">
                Please enter a valid Contact Number .
              </div>
              
              
              
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                
 				<div class="form-group ">
					<label class="control-label col-md-3 col-sm-3 col-xs-3" for="unq478"><b>Resume</b></label>
                    <div class="col-md-12 col-sm-12 col-xs-12 input_fields_wrap_1" id="unq478">
                        <?php global $out1;echo $out1; ?>
                        </div>
                    <br>
                        

                           <div class="input-group-btn" id="hide_it01" width=20px> 
								&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success ovrdbtn add_field_button_1" type="button"><i class="fa fa-plus"style="font-size:20px"></i>
                                </button>
				            </div>
			    </div>
              <br>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                
 				<div class="form-group ">
					<label class="control-label col-md-3 col-sm-3 col-xs-3" for="unq479"><b>Profile Picture</b></label>
                    <div class="col-md-12 col-sm-12 col-xs-12 input_fields_wrap_2" id="unq479">
                        <?php global $out2;echo $out2; ?>
                        </div>
                    <br>
                        

                           <div class="input-group-btn" id="hide_it02" width=20px> 
								&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success ovrdbtn add_field_button_2" type="button"><i class="fa fa-plus"style="font-size:20px"></i>
                                </button>
				            </div>
			    </div>
              <br>

            
            <hr class="mb-4">
            <button class=" col-md-6 mb-3 btn btn-primary btn-lg btn-block" name="submit_personal"  id="submit_personal" value="submit" type="submit">Save and Proceed</button>
          </form>
               
        </div>
      </div>
    
                
                
                
                
                
                


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="C:\Users\Administrator\Desktop\form\template\bootstrap-4.3.1-dist\js" ></script>
        <script src="form-validation.js"></script>
          </div>
        </div>
      </div>
        </div>
        
  <script type="text/javascript">
          if(document.getElementsByName('traverse1[]').length==1)
          {
              document.getElementById("hide_it01").setAttribute("hidden",true);
          }
            if(document.getElementsByName('traverse2[]').length==1)
          {
              document.getElementById("hide_it02").setAttribute("hidden",true);
          }
      	var max_fields_1     = 2; //maximum input boxes allowed
        var wrapper_1   		= $(".input_fields_wrap_1"); //Fields wrapper
        var add_button_1      = $(".add_field_button_1"); //Add button ID

        var x1 = 1; //initlal text box count
        $(add_button_1).click(function(e){ //on add input button click
            e.preventDefault();
            document.getElementById("hide_it01").setAttribute("hidden",true);
            //$(add_button_1).hide();
            if(x1 < max_fields_1){ //max input box allowed
                x1++; //text box increment
                $(wrapper_1).append('	<div><br>                                         			<div class="input-group control-group after-add-more">							Upload your Resume:  &nbsp;<input type="file" id="resume"  class="form-control" name="resume[]">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn ovrdbtn btn-outline-danger remove_field_1" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button>  <input type="text" id="traverse1"  class="form-control" value="traverse" name="traverse1[]" hidden>                         </div> <div id="error_rs" name="error_rs" style="color:#f23a3a;padding-left:20px;" ><?php// echo $error2; ?></div></div> 	'); //add input box
            }
          
        });

        $(wrapper_1).on("click",".remove_field_1", function(e){ //user click on remove text
            document.getElementById("hide_it01").removeAttribute("hidden");
            e.preventDefault(); $(this).parent().parent('div').remove(); x1--;
        });
      
      
      	var max_fields_2     = 2; //maximum input boxes allowed
        var wrapper_2   		= $(".input_fields_wrap_2"); //Fields wrapper
        var add_button_2      = $(".add_field_button_2"); //Add button ID

        var x2 = 1; //initlal text box count
        $(add_button_2).click(function(e){ //on add input button click
            e.preventDefault();
            document.getElementById("hide_it02").setAttribute("hidden",true);
            //$(add_button_1).hide();
            if(x2 < max_fields_2){ //max input box allowed
                x2++; //text box increment
                $(wrapper_2).append('	<div><br>                                         			<div class="input-group control-group after-add-more">							Upload your Profile Picture:  &nbsp;<input type="file" id="picture"  class="form-control" name="picture[]">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn ovrdbtn btn-outline-danger remove_field_2" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button>  <input type="text" id="traverse2"  class="form-control" value="traverse" name="traverse2[]" hidden>                         </div> <div id="error_ra" name="error_ra" style="color:#f23a3a;padding-left:20px;" ><?php// echo $error2; ?></div></div> 	'); //add input box
            }
          
        });

        $(wrapper_2).on("click",".remove_field_2", function(e){ //user click on remove text
            document.getElementById("hide_it02").removeAttribute("hidden");
            e.preventDefault(); $(this).parent().parent('div').remove(); x2--;
        });
      
      $("#qwerq").submit(function (e){
          
        //  e.preventDefault();
          var check=0;
          
          if($("#firstName").val() == "")
              {
                  var error="";
                  check=1;
                  error+= "<p >*First name cannot be empty.</p>";
                  $("#error1").html('<div style="color:#f23a3a;" class="alert " role="alert">'+error+'</div>');
                            

              }
          else
              {
                 $("#error1").remove(); 
              }
          if($("#lastName").val() == "")
              {
                  var error="";
                  check=1;
                  error+= "<p >*Last name cannot be empty.</p>";
                  $("#error2").html('<div style="color:#f23a3a;" class="alert " role="alert">'+error+'</div>');
              }
          else
              {
                 $("#error2").remove(); 
              }
          if($("#rno").val() == "")
              {
                  var error="";
                  check=1;
                  error+= "<p>*Roll number is required.</p>";
                  $("#error3").html('<div style="color:#f23a3a;" class="alert " role="alert">'+error+'</div>');
              }
          else
              {
                 $("#error3").remove(); 
              }
          if($("#email").val() == "")
              {
                  var error="";
                  check=1;
                  error+= "<p>*Somaiya Email ID is required.</p>";
                  $("#error4").html('<div style="color:#f23a3a;" class="alert " role="alert">'+error+'</div>');
              } 
          else
              {
                 $("#error4").remove(); 
              }
          if($("#phn").val() == "")
              {
                  var error="";
                  check=1;
                  error+= "<p>*Contact is required.</p>";
                  $("#error5").html('<div style="color:#f23a3a;" class="alert " role="alert">'+error+'</div>');
              }
          else
              {
                 $("#error5").remove(); 
              }
          
          
          $('input[name="resume[]"]').each(function() {
              var t=0;
              t=t+1;
            if( ($(this).val()=="") &&  $(this).parent().find("#traverse1").val()=="traverse" )
                {

                    var error="";
                //  check=1;
                    check=1;
                    error+= "<p style=\"margin:0px;padding-bottom:0px;padding-top:0px;\">*Resume is required.</p>";
                    //$("#error3").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');

                    $(this).parent().parent().find("#error_rs").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    //alert ("man"+t);
                }
              else
                { 
                 //  alert ("woman"+t);
                    $(this).parent().parent().find("#error_rs").empty();
                }
        });
          
          
          $('input[name="picture[]"]').each(function() {
              var t=0;
              t=t+1;
            if( ($(this).val()=="") &&  $(this).parent().find("#traverse2").val()=="traverse" )
                {

                    var error="";
                //  check=1;
                    check=1;
                    error+= "<p style=\"margin:0px;padding-bottom:0px;padding-top:0px;\">*Profile Picture is required.</p>";
                    //$("#error3").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');

                    $(this).parent().parent().find("#error_ra").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    //alert ("man"+t);
                }
              else
                { 
                 //  alert ("woman"+t);
                    $(this).parent().parent().find("#error_ra").empty();
                }
        });
              
          if(check!=1){
              //return false;

             $("#qwerq").submit();

          }
          else {
              return false;
          }
      });
          
    </script>  
          
  <?php 
 //include('includes/script.php');
 include('includes/footer.php');
 ?>