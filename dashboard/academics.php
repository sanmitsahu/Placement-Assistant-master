<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
.star{
    color:red;

}
label {
  margin-right: 10px;
}


/*.field1 {
   float:right;
}*/
    </style>
</head>
<body>

</body>
</html>
<?php 
 include('includes/header.php');
 include('includes/navbar.php');
error_reporting(0);

error_reporting(E_ALL);

    $error_message="";
    if(isset($_POST['error_message'])){
        //print_r($_POST);
       // echo $_POST;
        $error_message=$_POST['error_message'];
    }






include('db.php');
 ?>
<?php 
                $grade="";
                $inst="";
                $inst12="";
                $etype="";
                $univ="";
                $yop="";
                $dipOR12="";
                $etype12="";
                $univ12="";
                $yop12="";
                $grade12="";
                $BCGPI="";
                $BSEM1="";
                $BSEM2="";
                $BSEM3="";
                $BSEM4="";
                $BSEM5="";
                $BSEM6="";
                $BSEM7="";
                $BSEM8="";
                $MCGPI="";
                $MSEM1="";
                $MSEM2="";
                $curr_backlog="";
                $tot_backlog="";
                $instBTECH="";
                $univBTECH="";
                $yopBTECH="";
                $instMTECH="";
                $univMTECH="";
                $yopMTECH="";
$primary_key="";
//echo $primary_key;
//$_SESSION['username']="vatsal.pathak@somaiya.edu";
if(isset($_SESSION['username'])){
    $primary_key = $_SESSION['username'];
}

    {
        //echo "ssghffff";
       
        if($connection)
        {

        $out1="";
        $out2="";
        $q="select * from `academics` where Email='$primary_key'";
           
        $qrun=mysqli_query($connection,$q);
        if(mysqli_num_rows($qrun)>0){
            while($row1=mysqli_fetch_array($qrun))
            {
                $instBTECH=$row1['instBTECH'];
                $univBTECH=$row1['univBTECH'];
                $yopBTECH=$row1['yopBTECH'];
                $instMTECH=$row1['instMTECH'];
                $univMTECH=$row1['univMTECH'];
                $yopMTECH=$row1['yopMTECH'];
                $univ=$row1['univ'];
                $yop=$row1['yop'];
                $grade=$row1['grade'];
                $inst=$row1['inst'];
                $inst12=$row1['inst12'];
                $dipOR12=$row1['dipOR12'];
                //$etype12=$row1['etype12'];
                $univ12=$row1['univ12'];
                $yop12=$row1['yop12'];
                $grade12=$row1['grade12'];
                $BCGPI=$row1['BCGPI'];
                $BSEM1=$row1['BSEM1'];
                $BSEM2=$row1['BSEM2'];
                $BSEM3=$row1['BSEM3'];
                $BSEM4=$row1['BSEM4'];
                $BSEM5=$row1['BSEM5'];
                $BSEM6=$row1['BSEM6'];
                $BSEM7=$row1['BSEM7'];
                $BSEM8=$row1['BSEM8'];
                $MCGPI=$row1['MCGPI'];
                $MSEM1=$row1['MSEM1'];
                $MSEM2=$row1['MSEM2'];
                $curr_backlog=$row1['curr_backlog'];
                $tot_backlog=$row1['tot_backlog'];
                


               // $tmp01="";
                // if($temp=="TY")
                // {
                   
                //     $tmp01.='<select class="form-control" id="etype" name="etype[]"><option selected>TY</option><option>SY</option><option>FY</option><option>LY</option><option>Intermediate/HSC</option><option>SSC</option><option>Diploma</option></select>';
                // }
                // else if($temp=="SY")
                // {
                   
                //     $tmp01.='<select class="form-control" id="etype" name="etype[]"><option >TY</option><option selected>SY</option><option>FY</option><option>LY</option><option>Intermediate/HSC</option><option>SSC</option><option>Diploma</option></select>';
                // }
                // else if($temp=="FY")
                // {
                   
                //     $tmp01.='<select class="form-control" id="etype" name="etype[]"><option >TY</option><option>SY</option><option selected>FY</option><option>LY</option><option>Intermediate/HSC</option><option>SSC</option><option>Diploma</option></select>';
                // }
                // else if($temp=="LY")
                // {
                   
                //     $tmp01.='<select class="form-control" id="etype" name="etype[]"><option selected>TY</option><option>SY</option><option>FY</option><option selected>LY</option><option>Intermediate/HSC</option><option>SSC</option><option>Diploma</option></select>';
                // }
                // else if($temp=="Intermediate/HSC")
                // {
                   
                //     $tmp01.='<select class="form-control" id="etype" name="etype[]"><option >TY</option><option>SY</option><option>FY</option><option>LY</option><option selected>Intermediate/HSC</option><option>SSC</option><option>Diploma</option></select>';
                // }
                // else if($temp=="SSC")
                // {
                   
                //     $tmp01.='<select class="form-control" id="etype" name="etype[]"><option >TY</option><option>SY</option><option>FY</option><option>LY</option><option>Intermediate/HSC</option><option selected>SSC</option><option>Diploma</option></select>';
                // }
                // else if($temp=="Diploma")
                // {
                   
                //     $tmp01.='<select class="form-control" id="etype" name="etype[]"><option >TY</option><option>SY</option><option>FY</option><option>LY</option><option>Intermediate/HSC</option><option>SSC</option><option selected>Diploma</option></select>';
                // }

                
                $out1.='';
                        
                        

                        
                
                }
        }

            
            
            
        $q="select * from `exta` where Email='$primary_key'";
           
        $qrun=mysqli_query($connection,$q);
        if(mysqli_num_rows($qrun)>0){
            while($row2=mysqli_fetch_array($qrun))
            {
                $temp=$row2['acttype'];
                $tmp02="";
                if($temp=="Social")
                {
                   
                    $tmp02.='<select class="form-control col-md-3 col-sm-4 col-xs-4" id="acttype" name="acttype[]"><option selected>Social</option><option>Cultural</option><option>Sports</option><option>Hobbies</option></select>  ';
                }
                else if($temp=="Cultural")
                {
                   
                    $tmp02.='<select class="form-control col-md-3 col-sm-4 col-xs-4" id="acttype" name="acttype[]"><option>Social</option><option selected>Cultural</option><option>Sports</option><option>Hobbies</option></select>  ';
                }
                else if($temp=="Sports")
                {
                   
                    $tmp02.='<select class="form-control col-md-3 col-sm-4 col-xs-4" id="acttype" name="acttype[]"><option>Social</option><option>Cultural</option><option selected>Sports</option><option>Hobbies</option></select>  ';
                }
                else if($temp=="Hobbies")
                {
                   
                    $tmp02.='<select class="form-control col-md-3 col-sm-4 col-xs-4" id="acttype" name="acttype[]"><option>Social</option><option>Cultural</option><option>Sports</option><option selected>Hobbies</option></select>  ';
                }
                
                
                $out2.='                              <div>	<br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">	<div class=" control-group after-add-more">                             <div class="row mb-4">                                                                 <label for="acttype">Type :&nbsp</label>         '.$tmp02.'                                     &nbsp&nbsp&nbsp&nbsp         <label for="yoa">Year:&nbsp</label>                             <input type="number" name="yoa[]" value="'.$row2['yoa'].'" id=" yoa" class=" col-md-2 col-sm-3 col-xs-3  form-control" placeholder="2010" min=2000 required/>                                              <div id="error5" name="error5[]" style="color:#f23a3a;" ><?php// echo $error1; ?></div>        </div>                       <div class="row ">                                                              <input type="text" name="aod[]" value="'.$row2['aod'].'" id="aod" class="  form-control" placeholder="Enter Description of the activity here" required/>                       <div id="error6" name="error6[]" style="color:#f23a3a;" ><?php// echo $error1; ?></div>    </div>                                                                 </div>      <br>                       <div><button class="btn ovrdbtn btn-outline-danger remove_field_2" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div> </div>    ';
                
                }
        }
            
 
            
          $out3="";  
        $q="select * from `ksa` where Email='$primary_key'";

        $qrun=mysqli_query($connection,$q);
        if(mysqli_num_rows($qrun)>0){
            while($row3=mysqli_fetch_array($qrun)){

       
                $out3.='      <div>	<br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">	<div class=" control-group after-add-more">                             <div class="row mb-4">                    <input type="text" name="ach[]" id="ach" class="  col-md-8 col-sm-8 col-xs-8 form-control" placeholder="Enter your Achievement here"            value="'.$row3['ach'].'" required/>                                               &nbsp&nbsp&nbsp&nbsp         <label for="achy">Year:&nbsp</label>                             <input type="number" name="achy[]"            value="'.$row3['achy'].'"  id=" achy" class=" col-md-2 col-sm-2 col-xs-2  form-control" placeholder="2010" min=2000 required/>                                      </div>                              <div class="row mb-1">                    <span class="  col-md-8 col-sm-8 col-xs-8 " ><div id="error7" name="error7[]" style="color:#f23a3a;" >  <?php// echo $error1; ?></div></span>                                                  <span class="  col-md-3 col-sm-3 col-xs-3 " ><div id="error8" name="error8[]" style="color:#f23a3a;" >   <?php// echo $error1; ?></div></span>    </div>            </div>                                  <div><button class="btn ovrdbtn btn-outline-danger remove_field_3" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div> </div>  '; //add input box
        }
        }	
            }


}



?>
  <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Profile</a>
 <?php include('includes/navbarend.php'); ?>
    <!-- Header -->
<!DOCTYPE html>
<meta charset = "UTF-8" />
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
        <legend>Academics and Extracurricular Activities</legend>
          <h3 style="color:red;"><?php echo $error_message;?></h3>
      </div>

<div class="row justify-content-xl-center">

        <div class="col-md-10 order-md-1">
         
           
          <form class="needs-validation cst-bclass" id ="qwerq" method="post" action="data_fetch.php" enctype="multipart/form-data">
            <!-- removed no validate for required to work in html -->
            


				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
                
 				<div class="form-group ">
					<label class="control-label col-md-3 col-sm-3 col-xs-3" for="unq478"><b>Academics</b></label>
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <?php global $out1;echo $out1; ?>
                        <!-- out1 -->
                        <div><br>
<!--                            <hr style="height:2px;border-width:100%;color:gray;background-color:gray">-->
                    <div class=" control-group after-add-more">
                    <div class=" col-md-11 col-sm-11 col-xs-11 mb-4">
                      <div> <br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">  <div class=" control-group after-add-more">                             <div class="row ">                                <div class=" col-md-5 col-sm-5 col-xs-5 mb-4">                                    <label for="etype">Examination :&nbsp</label> 
                      <select class="col-md-7 col-sm-7 col-xs-7 mb-3"><option selected>SSC</option></select> <br>                                    </div> 
                      <div class="col-md-7 col-sm-7 col-xs-7 mb-3">
                        <label for="yop"><span class="star">*</span> 10th std Year of Passing:&nbsp</label>
                        
            <?php
              //echo '<label for="Admission_yr">  Admission Year for B.Tech/M.Tech:</label> ';
              ?>
              
              <div class="col-md-7 col-sm-7 col-xs-7 ">
              <?php
              
              $currently_selected = date('Y') + 5; 
              $earliest_year = 2000; 
              $latest_year = date('Y') + 5; 
              echo '<select name="yop" class="form-control" value="$yop">';             
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
                
                echo'<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
              }
              echo'</select>';
              ?>
                         
                        
                        </div> 
                        </div>                   </div>                            <div class="row mb-4">                                <label for="univ"><span class="star">*</span> 10th std University/Board:&nbsp</label>                                <input type="text" name="univ" value="<?php echo htmlspecialchars($univ);?>" id="univ" class="col-md-5 col-sm-5 col-xs-5  form-control" placeholder="Enter 10th std University/Board" required/>      <div id="error2" name="error2[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                              </div>                            <div class="row mb-4">                   <label for="inst"><span class="star">*</span> 10th std Institute/College :&nbsp&nbsp</label>                  <input type="text" name="inst" id="inst" value="<?php echo htmlspecialchars($inst);?>" class="col-md-5 col-sm-5 col-xs-5  form-control" placeholder="Enter Institute" required/>     <div id="error3" name="error3[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                                  </div>                            <div class="row mb-4">                                                             <label for="grade"><span class="star">*</span> 10th std% Marks :&nbsp&nbsp</label> <input type="text" name="grade" id="grade" class="col-md-5 col-sm-5 col-xs-5  form-control" value="<?php echo htmlspecialchars($grade);?>" placeholder="Enter 10std% Marks" required/>     <div id="error4" name="error4[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                             </div>                            </div>                           <br> </div>      


                        <!-- <br> -->



                      <div> <br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">  <div class=" control-group after-add-more">            <div class="col-md-7 col-sm-7 col-xs-7 mb-3">

            <label class="control-label" ><span class="star">*</span> 12std/Diploma:</label>
            <div class="row">
              <div class="col-md-6" >
                <label class="radio">
                  <input type="radio" name="dipOR12" value="12" <?php if ($dipOR12 != "Diploma") echo "checked"; ?> />12
                </label><br>
                <label class="radio">
                  <input type="radio" name="dipOR12" value="Diploma" <?php if ($dipOR12 == "Diploma") echo "checked"; ?> />Diploma
                </label>
              </div>
            </div>
            </div><br> <div class="row ">                                <div class=" col-md-5 col-sm-5 col-xs-5 mb-4">                                    <label for="etype">Examination :&nbsp</label> 
                      <select class="col-md-7 col-sm-7 col-xs-7 mb-3"><option selected>HSC</option></select> <br>                                    </div> 
                      <div class="col-md-7 col-sm-7 col-xs-7 mb-3">
                        <label for="yop12"><span class="star">*</span> 12th std Year of Passing:&nbsp</label>
                        
            <?php
              //echo '<label for="Admission_yr">  Admission Year for B.Tech/M.Tech:</label> ';
              ?>
              
              <div class="col-md-7 col-sm-7 col-xs-7 ">
              <?php
              
              $currently_selected = date('Y')+ 5; 
              $earliest_year = 2000; 
              $latest_year = date('Y')+ 5; 
              echo '<select name="yop12" class="form-control" value="$yop12">';             
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
                
                echo'<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
              }
              echo'</select>';
              ?>
                         
                        
                        </div> 
                        </div>                   </div>                            <div class="row mb-4">                                <label for="univ"><span class="star">*</span> 12th std/Diploma University:&nbsp</label>                                <input type="text" name="univ12" value="<?php echo htmlspecialchars($univ12);?>" id="univ12" class="col-md-5 col-sm-5 col-xs-5  form-control" placeholder="Enter 12th std University/Board" required/>      <div id="error2" name="error2[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                              </div>                            <div class="row mb-4">                   <label for="inst12"><span class="star">*</span> 12th std/Diploma Institute:&nbsp&nbsp</label>                  <input type="text" name="inst12" id="inst12" value="<?php echo htmlspecialchars($inst12);?>" class="col-md-5 col-sm-5 col-xs-5  form-control" placeholder="Enter Institute" required/>     <div id="error3" name="error3[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                                  </div>                            <div class="row mb-4">                                                             <label for="grade12"><span class="star">*</span> 12th std/Diploma% Marks :&nbsp&nbsp</label> <input type="text" name="grade12" id="grade12" class="col-md-5 col-sm-5 col-xs-5  form-control" value="<?php echo htmlspecialchars($grade12);?>" placeholder="Enter 10std% Marks" required/>     <div id="error4" name="error4[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                             </div>                            </div>                           <br> </div>  


                                              <div> <br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">  <div class=" control-group after-add-more">                             <div class="row ">                                <div class=" col-md-5 col-sm-5 col-xs-5 mb-4">                                    <label for="etype">Examination :&nbsp</label> 
                      <select class="col-md-7 col-sm-7 col-xs-7 mb-3"><option selected>B.Tech</option></select> <br>                                    </div> 
                      <div class="col-md-7 col-sm-7 col-xs-7 mb-3">
                        <label for="yopBTECH"><span class="star">*</span> B.Tech Year of Passing:&nbsp</label>
                        
            <?php
              //echo '<label for="Admission_yr">  Admission Year for B.Tech/M.Tech:</label> ';
              ?>
              
              <div class="col-md-7 col-sm-7 col-xs-7 ">
              <?php
              
              $currently_selected = date('Y')+ 5; 
              $earliest_year = 2000; 
              $latest_year = date('Y')+ 5; 
              echo '<select name="yopBTECH" class="form-control" value="$yopBTECH">';             
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
                
                echo'<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
              }
              echo'</select>';
              ?>
                         
                        
                        </div> 
                        </div>                   </div>                            <div class="row mb-4">                                <label for="univBTECH"><span class="star">*</span> B.Tech University/Board:&nbsp</label>                                <input type="text" name="univBTECH" value="<?php echo htmlspecialchars($univBTECH);?>" id="univBTECH" class="col-md-5 col-sm-5 col-xs-5  form-control" placeholder="Enter B.Tech University/Board" required/>      <div id="error2" name="error2[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                              </div>                            <div class="row mb-4">                   <label for="instBTECH"><span class="star">*</span> B.Tech Institute/College :&nbsp&nbsp</label>                  <input type="text" name="instBTECH" id="instBTECH" value="<?php echo htmlspecialchars($instBTECH);?>" class="col-md-5 col-sm-5 col-xs-5  form-control" placeholder="Enter Institute" required/>     <div id="error3" name="error3[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                                  </div>                              </div>                           <br> </div>  


            <!-- Btech marks -->
            <div class="row mb-3">
              <label for="BCGPI">B.Tech CGPI (Aggregate upto 6sem/Diploma students consider sem 3,4,5,6)(For M.TECH Aggregate upto 8sem) <span class="star">*</span> </label>
            </div>
              <div class="row mb-3 form-group w-75" >
                <input class="form-control" type="text" name="BCGPI" value="<?php echo htmlspecialchars($BCGPI);?>" placeholder="CGPI" id="BCGPI" required>
            </div>
            

            <div class="row mb-3">
              <label for="BSEM1">B.Tech SEM1 SGPI (Diploma students put zero)( M.TECH students can put SGPI or % ) <span class="star">*</span></label>
            </div>
              <div class="row mb-3 form-group w-75">
                <input class="form-control" type="text" name="BSEM1" value="<?php echo htmlspecialchars($BSEM1);?>" placeholder="BSEM1" id="BSEM1" required>
            </div>


            <div class="row mb-3">
              <label for="BSEM2">B.Tech SEM2 SGPI (Diploma students put zero)( M.TECH students can put SGPI or % ) <span class="star">*</span></label>
            </div>
              <div class="row mb-3 form-group w-75">
                <input class="form-control" type="text" name="BSEM2" value="<?php echo htmlspecialchars($BSEM2);?>" placeholder="BSEM2" id="BSEM2" required>
            </div>

            <div class="row mb-3">
              <label for="BSEM3">B.Tech SEM3 SGPI ( M.TECH students can put SGPI or % ) <span class="star">*</span></label>
            </div>
              <div class="row mb-3 form-group w-75">
                <input class="form-control" type="text" name="BSEM3" value="<?php echo htmlspecialchars($BSEM3);?>" placeholder="BSEM3" id="BSEM3" required>
            </div>

            <div class="row mb-3">
              <label for="BSEM4">B.Tech SEM4 SGPI ( M.TECH students can put SGPI or % ) <span class="star">*</span></label>
            </div>
              <div class="row mb-3 form-group w-75">
                <input class="form-control" type="text" name="BSEM4" value="<?php echo htmlspecialchars($BSEM4);?>" placeholder="BSEM4" id="BSEM4" required>
            </div>

            <div class="row mb-3">
              <label for="BSEM5">B.Tech SEM5 SGPI ( M.TECH students can put SGPI or % ) <span class="star">*</span></label>
            </div>
              <div class="row mb-3 form-group w-75">
                <input class="form-control" type="text" name="BSEM5" value="<?php echo htmlspecialchars($BSEM5);?>" placeholder="BSEM5" id="BSEM5" required>
            </div>

            <div class="row mb-3">
              <label for="BSEM6">B.Tech SEM6 SGPI ( M.TECH students can put SGPI or % ) <span class="star">*</span></label>
            </div>
              <div class="row mb-3 form-group w-75">
                <input class="form-control" type="text" name="BSEM6" value="<?php echo htmlspecialchars($BSEM6);?>" placeholder="BSEM6" id="BSEM6" required>
            </div>

            <div class="row mb-3">
              <label for="BSEM7">B.Tech SEM7 SGPI (Only for M.TECH students)B.Tech students put zero <span class="star">*</span></label>
            </div>
              <div class="row mb-3 form-group w-75">
                <input class="form-control" type="text" name="BSEM7" value="<?php echo htmlspecialchars($BSEM7);?>" placeholder="BSEM7" id="BSEM7" required>
            </div>

            <div class="row mb-3">
              <label for="BSEM8">B.Tech SEM8 SGPI (Only for M.TECH students)B.Tech students put zero <span class="star">*</span></label>
            </div>
              <div class="row mb-3 form-group w-75">
                <input class="form-control" type="text" name="BSEM8" value="<?php echo htmlspecialchars($BSEM8);?>" placeholder="BSEM8" id="BSEM8" required>
            </div>
                                <div class="input_fields_wrap_1" id="unq478">

            


        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
<label class="control-label col-md-3 col-sm-3 col-xs-3" for="unq478"><b>M.Tech</b></label>



                        
            </div>



            <div class="input-group-btn" id="hide_it01" width=20px> 
                &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success ovrdbtn add_field_button_1" type="button"><i class="fa fa-plus"style="font-size:20px"></i>
                                </button>
            </div>
            

 <br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">  
            <div class="row mb-3  form-group w-75">
              <label for="curr_backlog">Current backlog (specify no of subject)<span class="star">*</span></label>
                <input class="form-control" type="text" name="curr_backlog" value="<?php echo htmlspecialchars($curr_backlog);?>" placeholder="current backlog" id="curr_backlog" required>
            </div>

            <div class="row mb-3  form-group w-75">
              <label for="tot_backlog">Total backlog (specify no of subject)&nbsp<span class="star">*</span></label>
                <input class="form-control" type="text" name="tot_backlog" value="<?php echo htmlspecialchars($tot_backlog);?>" placeholder="total backlog" id="tot_backlog" required>
            </div>


   
                        
                        
                    
                    
                    <!-- <br> -->
                        

<!--                            <div class="input-group-btn" width=20px> 
								&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success ovrdbtn add_field_button_1" type="button"><i class="fa fa-plus"style="font-size:20px"></i>
                                </button>
				            </div> -->
			    </div>
              <!-- <br> -->
              <hr style="height:2px;border-width:0;color:gray;background-color:gray">
              
 				<div class="form-group ">
					<label class="control-label col-md-5 col-sm-5 col-xs-5" for="unq479"><b>Key Scholastic Achievements</b></label>
                    <div class="col-md-12 col-sm-12 col-xs-12 input_fields_wrap_3" id="unq479">
                        <?php global $out3;echo $out3; ?>
                        


           
                        </div>
                    <br>
                        

                           <div class="input-group-btn" width=20px> 
								&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success ovrdbtn add_field_button_3" type="button"><i class="fa fa-plus"style="font-size:20px"></i>
                                </button>
				            </div>
			    </div>
              <br>
              <hr style="height:2px;border-width:0;color:gray;background-color:gray">
              
               	<div class="form-group ">
					<label class="control-label col-md-6 col-sm-6 col-xs-6" for="unq421"><b>Extracurricular Activities</b></label>
					<div class="col-md-9 col-sm-9 col-xs-9 input_fields_wrap_2" id="unq421">
                        <?php global $out2;echo $out2; ?>
                        
                        
 



					</div>
                    <br>
                            <div class="input-group-btn" width=20px> 
								&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success ovrdbtn add_field_button_2" type="button"><i class="fa fa-plus"style="font-size:20px"></i>
                                </button>
							</div>
			    </div>
              
              
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
              
              

		        <div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 text-center">
						<button type="submit" class="btn btn-outline-primary btn-block submit" name="academic_skills"  value="submit">Submit</button>
					</div>
				</div>
          </form>
               
        </div>
      </div>



                
                
                
                
                
                
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="C:\Users\Administrator\Desktop\form\template\bootstrap-4.3.1-dist\js" ></script>
        <script src="form-validation.js"></script>
          </div>
        </div>
      </div>
  
        </div>
        
        
        
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      
      
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      
      
      <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
      
      <script src="form-validation.js"></script>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
      <script type="text/javascript">
$(document).ready(function() {
        var max_fields_1     = 2; //maximum input boxes allowed
        var wrapper_1       = $(".input_fields_wrap_1"); //Fields wrapper
        var add_button_1      = $(".add_field_button_1"); //Add button ID

        var x1 = 1; //initlal text box count
        $(add_button_1).click(function(e){ //on add input button click
            e.preventDefault();
            document.getElementById("hide_it01").setAttribute("hidden",true);
            //$(add_button_1).hide();
            if(x1 < max_fields_1){ //max input box allowed
                x1++; //text box increment
			$(wrapper_1).append( '                                               <div> <br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">  <div class=" control-group after-add-more">                             <div class="row ">                                <div class=" col-md-5 col-sm-5 col-xs-5 mb-4">                                    <label for="etype">Examination :&nbsp</label> <select class="col-md-7 col-sm-7 col-xs-7 mb-3"><option selected>M.Tech</option></select> <br>                                    </div> <div class="col-md-7 col-sm-7 col-xs-7 mb-3"><label for="yopMTECH"><span class="star">*</span> M.Tech Year of Passing:&nbsp</label> <?php
              //echo '<label for="Admission_yr">  Admission Year for B.Tech/M.Tech:</label> '; ?>
              <div class="col-md-7 col-sm-7 col-xs-7 "> <?php
              
              $currently_selected = date('Y')+ 5; 
              $earliest_year = 2000; 
              $latest_year = date('Y')+ 5; 
              echo '<select name="yopMTECH" class="form-control" value="$yopMTECH">';             
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
                
                echo'<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
              }
              echo'</select>';
              ?> </div> </div>                   </div>                <div class="row mb-4">                                <label for="univMTECH"><span class="star">*</span> M.Tech University/Board:&nbsp</label>                                <input type="text" name="univMTECH"  id="univMTECH" class="col-md-5 col-sm-5 col-xs-5  form-control" placeholder="Enter M.Tech University/Board" required/>      <div id="error2" name="error2[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                              </div>    <div class="row mb-4">                   <label for="instMTECH"><span class="star">*</span> M.Tech Institute/College :&nbsp&nbsp</label>                  <input type="text" name="instMTECH" id="instMTECH"  class="col-md-5 col-sm-5 col-xs-5  form-control" placeholder="Enter Institute" required/>     <div id="error3" name="error3[]" style="color:#f23a3a;" ><?php// echo $error1; ?> </div>                                  </div>                              </div>                           <br>       <div class="row mb-3"><label for="MCGPI">M.Tech CGPI (Aggregate upto 2sem)(B.Tech students put zero)  <span class="star">*</span></label> </div><div class="row mb-3 form-group w-75"><input class="form-control" type="text" name="MCGPI"  placeholder="MCGPI" id="MCGPI" required></div><div class="row mb-3"><label for="MSEM1">M.Tech SEM1 SGPI (B.Tech students put zero) <span class="star">*</span></label></div><div class="row mb-3 form-group w-75"><input class="form-control" type="text" name="MSEM1"  placeholder="MSEM1" id="MSEM1" required></div><div class="row mb-3"><label for="MSEM2">M.Tech SEM2 SGPI (B.Tech students put zero) <span class="star">*</span></label></div><div class="row mb-3 form-group w-75"><input class="form-control" type="text" name="MSEM2"  placeholder="MSEM2" id="MSEM2" required></div><br>       <div>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn ovrdbtn btn-outline-danger remove_field_1" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div><br> </div>'); //add input box
		}
	});

	// $(wrapper_1).on("click",".remove_field_1", function(e){ //user click on remove text
	// 	e.preventDefault(); $(this).parent().parent('div').remove(); x1--;
	// });
          $(wrapper_1).on("click",".remove_field_1", function(e){ //user click on remove text
            document.getElementById("hide_it01").removeAttribute("hidden");
            e.preventDefault(); $(this).parent().parent('div').remove(); x1--;
        });


	var max_fields_2     = 25; //maximum input boxes allowed
	var wrapper_2   		= $(".input_fields_wrap_2"); //Fields wrapper
	var add_button_2      = $(".add_field_button_2"); //Add button ID
	
	var x2 = document.getElementsByName('yoa[]').length+1; //initlal text box count
	$(add_button_2).click(function(e){ //on add input button click
		e.preventDefault();
		if(x2 < max_fields_2){ //max input box allowed
			x2++; //text box increment
			$(wrapper_2).append('                                <div>	<br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">	<div class=" control-group after-add-more">                             <div class="row mb-4">                                                                 <label for="acttype">Type :&nbsp</label><select class="form-control col-md-3 col-sm-4 col-xs-4" id="acttype" name="acttype[]"><option>Social</option><option>Cultural</option><option>Sports</option><option>Hobbies</option></select>                                                &nbsp&nbsp&nbsp&nbsp         <label for="yoa">Year:&nbsp</label>                             <input type="number" name="yoa[]" id=" yoa" class=" col-md-2 col-sm-3 col-xs-3  form-control" placeholder="2010" min=2000 required/>                                              <div id="error5" name="error5[]" style="color:#f23a3a;" ><?php// echo $error1; ?></div>        </div>                       <div class="row ">                                                              <input type="text" name="aod[]" id="aod" class="  form-control" placeholder="Enter Description of the activity here" required/>                       <div id="error6" name="error6[]" style="color:#f23a3a;" ><?php// echo $error1; ?></div>    </div>                                                                 </div>      <br>                       <div><button class="btn ovrdbtn btn-outline-danger remove_field_2" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div> </div> '); //add input box
		}
	});
	

    
    
	$(wrapper_2).on("click",".remove_field_2", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent().parent('div').remove(); x2--;
	})
    

	var max_fields_3     = 25; //maximum input boxes allowed
	var wrapper_3   		= $(".input_fields_wrap_3"); //Fields wrapper
	var add_button_3      = $(".add_field_button_3"); //Add button ID
	
	var x3 = document.getElementsByName('ach[]').length+1; //initlal text box count
	$(add_button_3).click(function(e){ //on add input button click
		e.preventDefault();
		if(x3 < max_fields_3){ //max input box allowed
			x3++; //text box increment
			$(wrapper_3).append('          <div>	<br><hr style="height:2px;border-width:100%;color:gray;background-color:gray">	<div class=" control-group after-add-more">                             <div class="row mb-4">                    <input type="text" name="ach[]" id="ach" class="  col-md-8 col-sm-8 col-xs-8 form-control" placeholder="Enter your Achievement here" required/>                                               &nbsp&nbsp&nbsp&nbsp         <label for="achy">Year:&nbsp</label>                             <input type="number" name="achy[]" id=" achy" class=" col-md-2 col-sm-2 col-xs-2  form-control" placeholder="2010" min=2000 required/>                                      </div>                              <div class="row mb-1">                    <span class="  col-md-8 col-sm-8 col-xs-8 " ><div id="error7" name="error7[]" style="color:#f23a3a;" >  <?php// echo $error1; ?></div></span>                                                  <span class="  col-md-3 col-sm-3 col-xs-3 " ><div id="error8" name="error8[]" style="color:#f23a3a;" >   <?php// echo $error1; ?></div></span>    </div>            </div>                                  <div><button class="btn ovrdbtn btn-outline-danger remove_field_3" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div> </div>   '); //add input box
		}
	});
	

    
    
	$(wrapper_3).on("click",".remove_field_3", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent().parent('div').remove(); x3--;
	})
    
    
    
    
    
          $("#qwerq").submit(function (e){
              //alert("bh");
             var check=0;
              //alert(document.getElementsByName('traverse[]').length);
              $('input[name="yop[]"]').each(function() {
                 
                if($(this).val()=="")
                    {
                       // alert("bh");
                        var error="";
                        check=1;
                        error+= "<p style=\" padding-left: 40px;margin:0px;padding-bottom:0px;padding-top:0px;\" >*Year required </p>";
                        $(this).parent().find("#error1").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');
                    }
                  else
                    { 
                        $(this).parent().find("#error1").empty();
                    }
            });
              $('input[name="univ[]"]').each(function() {
                  
                if($(this).val()=="")
                    {
                        
                        var error="";

                        check=1;
                        error+= "<p >*University/Board name required.&ensp;</p>";
                       //$("#error2").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');
               
                        $(this).parent().find("#error2").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    }
                  else
                    { 
                       
                        $(this).parent().find("#error2").empty();
                    }
            });
              
              $('input[name="inst[]"]').each(function() {
                  
                if($(this).val()=="")
                    {
                        
                        var error="";
                    //  check=1;
                        check=1;
                        error+= "<p style=\"margin:0px;padding-bottom:0px;padding-top:0px;\">*Institute name is required.</p>";
                        //$("#error3").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');
               
                        $(this).parent().find("#error3").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    }
                  else
                    { 
                       
                        $(this).parent().find("#error3").empty();
                    }
            });
              
              
              
              
              
              
                            
              $('input[name="grade[]"]').each(function() {
                  
                if($(this).val()=="")
                    {
                        
                        var error="";
                    //  check=1;
                        check=1;
                        error+= "<p style=\"margin:0px;padding-bottom:0px;padding-top:0px;\">*Grade required.</p>";
                        //$("#error3").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');
               
                        $(this).parent().find("#error4").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    }
                  else
                    { 
                       
                        $(this).parent().find("#error4").empty();
                    }
            });
              
                            
              $('input[name="ach[]"]').each(function() {
                  
                if($(this).val()=="")
                    {
                        
                        var error="";
                    //  check=1;
                        check=1;
                        error+= "<p style=\"margin:0px;padding-bottom:0px;padding-top:0px;\">*Achievement field cannot be empty.</p>";
                        //$("#error3").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');
               
                        $(this).parent().parent().find("#error7").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    }
                  else
                    { 
                       
                        $(this).parent().parent().find("#error7").empty();
                    }
            });
              
              
              
              $('input[name="achy[]"]').each(function() {
                  
                if($(this).val()=="")
                    {
                      
                        var error="";
                    //  check=1;
                        check=1;
                        error+= "<p style=\"margin:0px;padding-bottom:0px;padding-top:0px;\">*Year is required.</p>";
                        //$("#error3").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');
               
                        $(this).parent().parent().find("#error8").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    }
                  else
                    { 
                       
                        $(this).parent().parent().find("#error8").empty();
                    }
            });

              
              
               $('input[name="yoa[]"]').each(function() {
                 
                if($(this).val()=="")
                    {
                       // alert("bh");
                        var error="";
                        check=1;
                      error+= "<p style=\" padding-left: 40px;margin:0px;padding-bottom:0px;padding-top:0px;\" >*Year required </p>";
               
                        $(this).parent().find("#error5").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');

                    }
                  else
                    { 
                        
                        $(this).parent().find("#error5").empty();
                    }
            });
              $('input[name="aod[]"]').each(function() {
                  
                if($(this).val()=="")
                    {
                        
                        var error="";

                        check=1;
                        error+= "<p >*Description of extra curricular activity required.&ensp;</p>";
                       //$("#error2").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');
               
                        $(this).parent().find("#error6").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    }
                  else
                    { 
                       
                        $(this).parent().find("#error6").empty();
                    }
            });
              
              

            /*                                     
              var inps = document.getElementsByName('traverse[]');
              $('input[name="coursect[]"]').each(function(index,value) {
                  
                if(($(this).val()=="")&&(inps[index].value=="traverse"))
                    {
                       // alert("hir");
                        var error="";
                    //  check=1;
                        check=1;
                        error+= "<p style=\"margin:0px;padding-bottom:0px;padding-top:0px;\">*Course Certificate is required.</p>";
                       // $("#error4").html('<span style="color:#f23a3a;margin:0px;padding-bottom:0px;padding-top:0px;" class="alert " role="alert">'+error+'</span>');
                        
                        $(this).parent().parent().find("#error4").html('<span style="color:#f23a3a;" class="alert " role="alert">'+error+'</span>');

                    }
                  else
                    { 
                       
                        $(this).parent().parent().find("#error4").empty();
                    }
            });
              
              */
              if(check!=1)
              {
                   $("#qwerq").submit();
              }
              else if(check==1)
              {
                  return false;
              }
              
              
              
              
          
          });
            
      });
        
  
    
    

      </script>
  <?php 
 //include('includes/script.php');
 include('includes/footer.php');
 ?>