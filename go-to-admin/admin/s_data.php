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
	

    $query="select * from `google_user` where email_id='$primary_key'";

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
                    $categ=$row1['categ'];
                    $date_of_placement	=$row1['date_of_placement'];                
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



                   <form method="POST" action="verify.php" id ="uplacementmodal" method="post" enctype="multipart/form-data"  >
                       
                       
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="Student's email id" value="<?php echo htmlspecialchars($primary_key);?>" name="email_id"  id="email_id" required="" readonly>
                  </div>
                </div>
                      
                       

                <div class="form-group">
                    
                  <div class="input-group input-group-alternative mb-3">
                      
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-portrait"></i><span>
                    </div>
                    <input class="form-control" placeholder="Company reference number" type="text" value="<?php echo htmlspecialchars($Ref_no);?>"  name="refno" id="refno" required="" >
                  </div>
                </div>

                      

                      
                      
                 <div class="form-group">
                     <div class="mb-1">Date of Placement:</div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar " ></i></span>
                    </div>
                    <input class="form-control" type="date" name="date_of_placement"  id="date_of_placement" value="<?php echo htmlspecialchars($date_of_placement);?>" required="" >
                  </div>
                </div>
                      
                        
                      
                      
                      
                      
                      
                      
                      
                 <div class="form-group">
                     <div class="mb-1">Category : </div>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-book" ></i></span>
                    </div>
                      <select name="categ"  class="form-control"  id="categ" required="" >
                          <option value="Non-Dream" <?php if($categ=="nondream"){ echo htmlspecialchars("selected");} ?> >Non-Dream</option>
                          <option value="Dream" <?php if($categ=="dream"){ echo htmlspecialchars("selected");} ?>>Dream</option>
                          <option value="Super-Dream" <?php if($categ=="superdream"){ echo htmlspecialchars("selected");} ?>>Super-Dream</option>
                            <option value="Not placed" <?php if(($categ=="not")||($categ=="")){ echo htmlspecialchars("selected");} ?>>Not placed</option>
                      </select>
                    
                  </div>
                </div>
                      
                      
                      

                  
                      
                     
                      
                      
                      
 		           <div class="modal-footer">
                       <button type="button" class="btn btn-danger" id="clear" onclick="document.getElementById('uplacementmodal').reset();">Revert changes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" id="close_update" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-outline-primary" name="update_placement">Update</button>
                  </div>
                  </form>
                    
                    
                    <script type="text/javascript">
                    
                
                    
                    </script>
