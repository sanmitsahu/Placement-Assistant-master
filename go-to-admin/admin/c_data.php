<?php 
 include('security.php');

 
 ?>
<?php




if(array_key_exists("data",$_POST))
{
    $primary_key= $_POST["data"];
        {
    

if($connection)

{
	

    $query="select * from `company_module` where Ref_no='$primary_key'";

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
                    $Ref_no=$row1['Ref_no'];
                    $Announcement_date=$row1['Announcement_date'];
                    $year=$row1['year'];
                    $Company_name=$row1['Company_name'];
                    $Address=$row1['Address'];
                    $Reg_deadline=$row1['Reg_deadline'];
                    $primary_link=$row1['primary_link'];
                    $secondary_link=$row1['secondary_link'];
                    $categ=$row1['categ'];
                    $email_id=$row1['email_id'];
                    //$Reg_deadline=date('M/d/Y h:i:s', $Reg_deadline); 
                   $HTML_DATETIME_LOCAL = 'Y-m-d\TH:i'; //escape the literal T so it is not expanded to a timezone code
                    $php_timestamp = strtotime($Reg_deadline);
                    $Reg_deadline = date($HTML_DATETIME_LOCAL, $php_timestamp);
                        
                    }
            }


        }
        
    }

   
        
}
    
    

else
{
  die("connection failed because ".mysqli_connect_error() );
}
    
    }
}

?>



                   <form method="POST" action="verify.php" id ="ucompanymodal" method="post" enctype="multipart/form-data"  >

                <div class="form-group">
                    
                  <div class="input-group input-group-alternative mb-3">
                      
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-portrait"></i><span>
                    </div>
                    <input class="form-control" placeholder="Company reference number" type="text" value="<?php echo htmlspecialchars($Ref_no);?>"  name="refno" id="refno" required="" readonly>
                  </div>
                </div>

                      

                      
                      
                 <div class="form-group">
                     <div class="mb-1">Date of Announcement:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar " ></i></span>
                    </div>
                    <input class="form-control" type="date" name="doa"  id="doa" value="<?php echo htmlspecialchars($Announcement_date);?>" required="" >
                  </div>
                </div>
                      
                 <div class="form-group">
                     <div class="mb-1">For Batch:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-university " ></i></span>
                    </div>
               <?php
              $selyr=$year;
              //$currently_selected = date('Y') + 5; 
              $earliest_year = 2000; 
              $latest_year = date('Y') + 5; 
              echo '<select class=" form-control" name="batch" >';             
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
                if ($i==$selyr)
                {
                    echo'<option value="'.$i.'" selected >'.$i.'</option>';
                }
                  else
                  {
                      //echo'<option value="'.$i.'" >'.$i.'</option>';
                      
                  }
                //echo'<option value="'.$i.'"'.($i === $selyr ? ' selected' : '').'>'.$i.'</option>';
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
                          <option value="Non-Dream" <?php if($categ=="Non-Dream"){ echo htmlspecialchars("selected");} ?> >Non-Dream</option>
                          <option value="Dream" <?php if($categ=="Dream"){ echo htmlspecialchars("selected");} ?>>Dream</option>
                          <option value="Super-Dream" <?php if($categ=="Super-Dream"){ echo htmlspecialchars("selected");} ?>>Super-Dream</option>
                      
                      </select>
                    
                  </div>
                </div>
                      
                      
                      
                 <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="Company's name" value="<?php echo htmlspecialchars($Company_name);?>" name="name"  id="name" required="" >
                  </div>
                </div>
                      
                 <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="Company's Address" value="<?php echo htmlspecialchars($Address);?>" name="addr"  id="addr" required="" >
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" value="<?php echo htmlspecialchars($email_id);?>" type="email" name="email" >
                  </div>
                </div>
                      
                      
                <div class="form-group">
                    <div class="mb-1">Last date to register:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-hourglass"></i></span>
                    </div>
                    <input class="form-control" type="datetime-local" value="<?php echo $Reg_deadline;?>" name="regdate" required="">
                  </div>
                </div>
                     

                      
                <?php 
                                        
               // while($row1=mysqli_fetch_array($qrun)){
                $out3='	                                     <div>        <a href="viewfile.php?location='.$primary_link.' "><input class="form-control" type="file" id="maindoc" name="maindoc[]" hidden>
         <input type="text" id="traverse6"  class="form-control" value="'.$primary_link.'" name="traverse6[]" hidden>
                <button class="btn mb-2  btn-outline-primary " type="button">view file</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn ovrdbtn mb-2 btn-outline-danger remove_field_6" onclick="remov_update_main(this)" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button>   
                                                                  </div>	'; //add input box
     
                                        
                ?>
                      

             
                      
            <div class="form-group">
                    <div class="mb-1">Upload main document:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-file-word"></i></span>
                    </div>
                          <div class=" input_fields_wrap_6" id="unq479">
                              <?php global $out3;echo $out3; ?>

                          </div>
                        <div class="input-group-btn" width=10px> 
                            &nbsp;&nbsp;&nbsp;&nbsp;<button id="add_main"  onclick="add_update_main()"  class="btn mb-2 btn-outline-success ovrdbtn add_field_button_6" type="button" hidden><i class="fa fa-plus"></i>
                            </button>
                        </div> 
                  </div>

                </div>
                 
<?php
$out4="";
$path = $secondary_link;
                     // $path='C:\xampp\htdocs\Placement-Assistant-master\dashboard\companies\2012\xyzzy\attachments';
if (file_exists($path)){
   $out4=traverse_dir($path); 
}
else
{
    $out4="No attachments available";
    
}


function display_files($dir,$files)
{
    # echo sprintf("<h2>%s</h2>",$dir);
     if(count($files) > 0){
        
         foreach ($files as $file) {
                $out4.='            <div>                <div class="input-group input-group-alternative mb-1">                    <div class="input-group-prepend">                      <span class="input-group-text"><i class="fa fa-folder"></i></span>    <a href="viewfile.php?location='.$file.' "><input class="form-control" type="file" id="attach" name="attach[]" hidden>         <input type="text" id="traverse7"  class="form-control" value="'.$file.'" name="traverse7[]" hidden>                <button class="btn mb-2  btn-outline-primary " type="button">view file</button></a>                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                    <?php// echo $error2; ?><div><button onclick="remov_update_attach(this)" class="btn ovrdbtn btn-outline-danger remove_field_5" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div>                  </div></div>	 	'; 
             
           //echo $file;
         }






        
     }
            else{
          $out4="No attachments available";  
        }
    return ($out4);
}
 
function traverse_dir($path)
{
     $dh = opendir($path);

     $files = array();
     $dirs = array();

     while($e = readdir($dh)){
         if($e != '.' && $e != '..'){
             // check if it is a directory
             $f = $path . '/' . $e;
             if(is_dir($f)){
                $dirs[] =  $f;
             }else if(is_file($f)){
                $files[] = $f;
             }
         }
     }
     closedir($dh);

     // display current directory and its files
     return (display_files($path,$files));

     // recursively traverse subdirecties
    // foreach ($dirs as $dir) {
     //traverse_dir($dir);
     //}
}
?>
          
                <div class="form-group">
                    <div class="mb-1">Upload attachments:</div>
                    
                    <div class="input_fields_wrap_5">

   
                        <?php global $out4;echo $out4; ?>
                    </div>
                    <br>
                        <div class="input-group-btn" width=10px> 
                            &nbsp;&nbsp;&nbsp;&nbsp;<button  onclick="add_update_attach()"  class="btn btn-outline-success ovrdbtn add_field_button_5" type="button"><i class="fa fa-plus"></i>
                            </button>
                        </div> 

                </div>

                      
                      
                     
                      
                      
                      
 		           <div class="modal-footer">
                       <button type="button" class="btn btn-danger" id="clear" onclick="document.getElementById('ucompanymodal').reset();">Revert changes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" id="close_update" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-outline-primary" name="update_company">Update</button>
                  </div>
                  </form>
                    
                    
                    <script type="text/javascript">
                    
//                       function notify()
//    {
//        //console.log('THTHTH');
//        console.log('working');
//                               
//    
//	var max_fields_5     = 25; //maximum input boxes allowed
//	var wrapper_5   		= $(".input_fields_wrap_5"); //Fields wrapper
//	var add_button_5      = $(".add_field_button_5"); //Add button ID
//	
//	var x1 = 1; //initlal text box count
//        //on add input button click
//		//e.preventDefault();
//		if(x1 < max_fields_5){ //max input box allowed
//			x1++; //text box increment
//			$(wrapper_5).append('	         <div><br>                <div class="input-group input-group-alternative mb-1">                    <div class="input-group-prepend">                      <span class="input-group-text"><i class="fa fa-folder"></i></span>                    </div>                    <input class="form-control" type="file" name="attach[]" required="">                    <div id="error2" name="error2[]" style="color:#f23a3a;" ><?// echo $error2; ?></div>&nbsp;&nbsp;&nbsp;<div><button class="btn ovrdbtn btn-outline-danger remove_field_5" type="button"><i class="fa fa-minus" style="font-size:20px"></i></button></div>                  </div></div>   '); //add input box
//
//    }
//
//
//	//$(add_button_5).click(function(e){ 
//		}
//	});
//	
//	$(wrapper_5).on("click",".remove_field_5", function(e){ //user click on remove text
//		e.preventDefault(); $(this).parent().parent().parent('div').remove(); x1--;
//	});
//    
//    
// 
                    
                    
                    </script>
