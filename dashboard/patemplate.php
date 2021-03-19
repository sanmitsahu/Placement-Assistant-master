<!DOCTYPE html>
<html>
<head>
	<title>Pa template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="patemplatenew.css">
  <style type="text/css">
    label{
      color: #DC143C;
    }
  </style>
<!-- <style type="text/css">
  

@include media-breakpoint-up(sm) {
.textt{
    text-overflow:ellipsis ;
    overflow-x: hidden;
    overflow-y: hidden;
  }
}



</style> -->
<!-- <script> 
 $(function(){  
     $('#fileContents').val( document.documentElement.innerHTML);
     $('#pdfForm').append('<input type="submit"  value="Download PDF" />');
 });

</script> -->
<!-- <a href="https://restpack.io/html2pdf/save-as-pdf?private=true" target="_blank" rel="nofollow">Save this page as PDF</a>
<script async src="https://restpack.io/save-as-pdf.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script> 
 $(function(){  
     $('#fileContents').val( document.documentElement.innerHTML);
     $('#pdfForm').append('<input type="submit"  value="Download PDF" />');
 });

</script> -->

<!-- <a href="http://pdfcrowd.com/url_to_pdf/">Save this page to a PDF</a> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> -->

</head>
<body>

<?php 
session_start();
//error_reporting(0);
 //include('includes/header.php');
// include('includes/navbar.php');
 include('db.php');
 ?>
<?php

$primary_key="";

if($_SESSION['username']){
    $primary_key = $_SESSION['username'];
}
    
        //echo "ssghffff";
       
if($connection)

{
	//echo "fetching data";

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
                    $dob=$row1['dob'];
                    $address=$row1['address'];
                    $prog=$row1['prog'];
                    }
            }


        }
        
    }
    $sql="select * from `picture` where Email='$primary_key'";
        $result = mysqli_query($connection, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){

        	while($row = mysqli_fetch_assoc($result))
        	{
        		$picture = $row['picture'];
        	}
}

}

     ?>



		<!-- <form> -->
			<!-- <input type="button" id="create_pdf" value="Generate PDF">  -->
			<!-- <button onclick="getPDF()" id="downloadbtn" style="display: inline-block;"><b>Click to Download HTML as PDF</b></button> -->
			<form class="form">
    <div class="container"> 
    	<div class="canvas_div_pdf">
    	 
    <!-- <div class="col-lg-4  col-sm-6">  -->
		<table border="1" align="center" >
            <tr>
               <td rowspan="3" width="25%"><br></td>
               <td><label>Roll no:</label>
               	<?php echo $Rno; ?>

               </td>
               <td><?php echo $prog ; ?></td>
               <td  rowspan="6"><?php echo '<img style="display:block;" width="100%" height="10%" src="'.$picture.'"'?></td>
            </tr>
            <tr>
            	<td colspan="2"><label>Name:</label>
               	<?php echo $Fname." ".$Lname; ?>

               </td>
            </tr>
            <tr>
            	<td colspan="2" style="max-width: calc( 70 * 1vw )"><label>Address for Communication: </label><?php echo $address; ?></td>
            </tr>  
            <tr>
               <td rowspan="3"></td>
               <td><label>DOB:</label> <?php echo $dob; ?></td>
               <td width="70%" class="text-truncate" style="max-width: calc( 70 * 1vw )"><label>Mobile no: </label> <?php echo $contact; ?></td>
                         	
            </tr> 
            <tr>
            	<td colspan="2"><label>Email:</label> <?php echo $Email; ?></td>
            </tr>
            <tr>
            	<td colspan="2"><label>Department:</label> <?php echo $dept; ?></td>
            </tr>                     
        </table>
      
<br>
<?php
$q="select * from `academics` where Email='$primary_key'";
$q_run=mysqli_query($connection,$q);
if(mysqli_num_rows($q_run)==0)
{
  echo ' ';
}
else
{  
echo '<table border="1" align="center">';
echo	'<tr>
    <thead>
    
		<th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )" width="70%" class="text-truncate" style="max-width: calc( 70 * 1vw )">Examination</th>
    
		<th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">University</th>
		<th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">Institute</th>
		<th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">Year of passing</th>
		<th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">CGPI/%Marks</th>
    </thead>
	</tr>';
	while($rows=mysqli_fetch_array($q_run)){
		
		$univ = $rows['univ'];
		$inst = $rows['inst'];
		$yop = $rows['yop'];
		$grade = $rows['grade'];
    $univ12 = $rows['univ12'];
    $inst12 = $rows['inst12'];
    $yop12 = $rows['yop12'];
    $grade12 = $rows['grade12'];
    $univBTECH = $rows['univBTECH'];
    $instBTECH = $rows['instBTECH'];
    $yopBTECH = $rows['yopBTECH'];
    $yopBSY = $yopBTECH -2;
    $yopBTY = $yopBTECH -1;
    $yopBFY = $yopBTECH -3;
    $yopBLY = $yopBTECH;
    $BSEM1 = $rows['BSEM1'];
    $BSEM2 = $rows['BSEM2'];
    $BSEM3 = $rows['BSEM3'];
    $BSEM4 = $rows['BSEM4'];
    $BSEM5 = $rows['BSEM5'];
    $BSEM6 = $rows['BSEM6'];
    $BSEM7 = $rows['BSEM7'];
    $BSEM8 = $rows['BSEM8'];
    $MSEM1 = $rows['MSEM1'];
    $MSEM2 = $rows['MSEM2'];

    $SY = ($BSEM3 + $BSEM4)/2;
    $FY = ($BSEM1 + $BSEM2)/2;
    $TY = ($BSEM5 + $BSEM6)/2;
    $LY = ($BSEM7 + $BSEM8)/2;

    $MCGPI = ($MSEM1 + $MSEM2)/2;

    $univMTECH = $rows['univMTECH'];
    $instMTECH = $rows['instMTECH'];
    $yopMTECH = $rows['yopMTECH'];
    $yopMSY = $yopMTECH -2;
    $yopMTY = $yopMTECH -1;
    $yopMFY = $yopMTECH -3;
    $yopMLY = $yopMTECH;
    //$MCGPI = $rows['MCGPI'];
    

?>
<?php $no = 1; ?>

   <tr>
       <td class="text-center"><?php  echo "SSC"  ; ?></td>
       <td class="text-center"><?php  echo $univ   ; ?></td>
       <td class="text-center"><?php  echo $inst  ; ?></td>
       <td class="text-center"><?php  echo $yop  ; ?></td>
       <td class="text-center"><?php  echo $grade  ; ?></td>

    </tr>
       <tr>
       <td class="text-center"><?php  echo "HSC/Diploma"   ; ?></td>
       <td class="text-center"><?php  echo $univ12   ; ?></td>
       <td class="text-center"><?php  echo $inst12  ; ?></td>
       <td class="text-center"><?php  echo $yop12  ; ?></td>
       <td class="text-center"><?php  echo $grade12  ; ?></td>

    </tr>
    <?php if ($prog==='M. Tech')
     {
      echo '<tr>
       <td class="text-center">B.Tech FY</td>
       <td class="text-center">'.$univBTECH.'</td>
       <td class="text-center">'.$instBTECH.'</td>
       <td class="text-center">'.$yopBFY.'</td>
       <td class="text-center">'.$FY .'</td>

    </tr>';
      echo '<tr>
       <td class="text-center">B.Tech SY</td>
       <td class="text-center">'.$univBTECH.'</td>
       <td class="text-center">'.$instBTECH.'</td>
       <td class="text-center">'.$yopBSY.'</td>
       <td class="text-center">'.$SY .'</td>

    </tr>';
      echo '<tr>
       <td class="text-center">B.Tech TY</td>
       <td class="text-center">'.$univBTECH.'</td>
       <td class="text-center">'.$instBTECH.'</td>
       <td class="text-center">'.$yopBTY.'</td>
       <td class="text-center">'.$TY .'</td>

    </tr>';
      echo '<tr>
       <td class="text-center">B.Tech LY</td>
       <td class="text-center">'.$univBTECH.'</td>
       <td class="text-center">'.$instBTECH.'</td>
       <td class="text-center">'.$yopBLY.'</td>
       <td class="text-center">'.$LY .'</td>

    </tr>';
          echo '<tr>
       <td class="text-center">M.Tech FY</td>
       <td class="text-center">'.$univMTECH.'</td>
       <td class="text-center">'.$instMTECH.'</td>
       <td class="text-center">'.$yopMTECH.'</td>
       <td class="text-center">'.$MCGPI.'</td>

    </tr>';


    }
    else if($prog==='B. Tech')
    {
      echo '<tr>
       <td class="text-center">FY</td>
       <td class="text-center">'.$univBTECH.'</td>
       <td class="text-center">'.$instBTECH.'</td>
       <td class="text-center">'.$yopBFY.'</td>
       <td class="text-center">'.$FY .'</td>

    </tr>';
      echo '<tr>
       <td class="text-center">SY</td>
       <td class="text-center">'.$univBTECH.'</td>
       <td class="text-center">'.$instBTECH.'</td>
       <td class="text-center">'.$yopBSY.'</td>
       <td class="text-center">'.$SY .'</td>

    </tr>';
          echo '<tr>
       <td class="text-center">TY</td>
       <td class="text-center">'.$univBTECH.'</td>
       <td class="text-center">'.$instBTECH.'</td>
       <td class="text-center">'.$yopBTY.'</td>
       <td class="text-center">'.$TY .'</td>

    </tr>';


    }

    ?>
<?php }?>    

<?php  
echo '</table>';
}
?>
        	



        <!-- </table> -->

      <br>


<?php
$q3="select * from `ksa` where Email='$primary_key'";
$q_run3=mysqli_query($connection,$q3);
if(mysqli_num_rows($q_run3)==0)
{
  echo ' ' ;
}
else
{  
echo '<table border="1" align="center">';
echo	'<tr>
		<th colspan="2" class="text-center">Key Scholastic Achievements</th>

	</tr>';
	while($rows=mysqli_fetch_array($q_run3)){
		$ach = $rows['ach'];
		$achy = $rows['achy'];


?>

   <tr>
       <td class="text-center"><?php  echo $ach ; ?></td>
       <td class="text-center"><?php  echo $achy   ; ?></td>


    </tr>
<?php }?>    

<?php  
echo '</table>';
}
?>

<br>

<?php
$q="select * from `internships` where Email='$primary_key'";
$q_run=mysqli_query($connection,$q);
if(mysqli_num_rows($q_run)==0)
{
  echo ' ';
}
else
{  
 
echo '<table border="1" align="center">';
echo '    <thead>
    
    <th colspan="4" class="text-center">Internships</th>
    </thead>';
echo  '<tr>
    <thead>
    
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">Organization</th>
    
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">From</th>
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">To</th>
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">No of weeks</th>
    </thead>
  </tr>';
  while($rows=mysqli_fetch_array($q_run)){
    $ittl = $rows['ittl'];
    $itfrom = $rows['itfrom'];
    $itto = $rows['itto'];
    $itnw = $rows['itnw'];
    


?>

   <tr>
       <td class="text-center"><?php  echo $ittl   ; ?></td>
       <td class="text-center"><?php  echo $itfrom   ; ?></td>
       <td class="text-center"><?php  echo $itto  ; ?></td>
       <td class="text-center"><?php  echo $itnw  ; ?></td>
       

    </tr>
<?php }?>    

<?php  
echo '</table>';
}
?>
     
<br>

<?php
$q="select * from `certified courses` where Email='$primary_key'";
$q_run=mysqli_query($connection,$q);
if(mysqli_num_rows($q_run)==0)
{
  echo ' ';
}
else
{  
echo '<table border="1" align="center">';
echo '    <thead>
    
    <th colspan="4" class="text-center">Extra Course/Certification done</th>
    </thead>';
echo  '<tr>
    <thead>
    
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">Organization</th>
    
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">Name of Course/Certification</th>
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">Year</th>
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">Other details/PI etc.</th>
    </thead>
  </tr>';
  while($rows=mysqli_fetch_array($q_run)){
    $org = $rows['org'];
    $coursettl = $rows['coursettl'];
    $yr = $rows['yr'];
    $coursedsc = $rows['coursedsc'];
    


?>

   <tr>
       <td class="text-center"><?php  echo $org  ; ?></td>
       <td class="text-center"><?php  echo $coursettl   ; ?></td>
       <td class="text-center"><?php  echo $yr  ; ?></td>
       <td class="text-center"><?php  echo $coursedsc  ; ?></td>
       

    </tr>
<?php }?>    

<?php  
echo '</table>';
}
?>

 
      <br>
<?php
$q3="select * from `pos_res` where Email='$primary_key'";
$q_run3=mysqli_query($connection,$q3);
if(mysqli_num_rows($q_run3)==0)
{
  echo ' ' ;
}
else
{  
echo '<table border="1" align="center">';
echo  '<tr>
    <th colspan="2" class="text-center">Positions and Responsibilities Undertaken in KJSCE</th>

  </tr>';
  while($rows=mysqli_fetch_array($q_run3)){
    $dtl = $rows['dtl'];
    $yrr = $rows['yrr'];


?>

   <tr>
       <td class="text-center"><?php  echo $dtl ; ?></td>
       <td class="text-center"><?php  echo $yrr   ; ?></td>


    </tr>
<?php }?>    

<?php  
echo '</table>';
}
?>
<br>      


<?php
$q3="select * from `exta` where Email='$primary_key'";
$q_run3=mysqli_query($connection,$q3);
if(mysqli_num_rows($q_run3)==0)
{
  echo ' ';
}
else
{  
echo '<table border="1" align="center">';
echo  '<tr>
    <th colspan="2" class="text-center">Extracurricular activities</th>

  </tr>';
  while($rows=mysqli_fetch_array($q_run3)){
    $acttype = $rows['acttype'];
    $aod = $rows['aod'];
    $yoa = $rows['yoa'];


?>

   <tr>
    <th colspan="2" class="text-center"><?php  echo $acttype ; ?></th>

   </tr>
   <tr>
       <td class="text-center"><?php  echo $aod ; ?></td>
       <td class="text-center"><?php  echo $yoa   ; ?></td>


    </tr>
<?php }?>    

<?php  
echo '</table>';
}
?>


<br>

<?php
$q="select * from `projects` where Email='$primary_key'";
$q_run=mysqli_query($connection,$q);
if(mysqli_num_rows($q_run)==0)
{
  echo ' ';
}
else
{  
echo '<table border="1" align="center">';
echo '    <thead>
    
    <th colspan="2" width="70%"  style="max-width: calc( 70 * 1vw )" class="text-center">Other Activities:Academic Projects/Presentations/Publications/Participation in Competitions</th>
    </thead>';
echo  '<tr>
    <thead>
    
    <th width="70%" class="text-truncate text-center" style="max-width: calc( 70 * 1vw )">Details of Activity</th>
    
    <th class="text-center">Year</th>

    </thead>
  </tr>';
  while($rows=mysqli_fetch_array($q_run)){
    $prttl = $rows['prttl'];
    $prlnk = $rows['prlnk'];

    


?>

   <tr>
       <td class="text-center"><?php  echo $prttl  ; ?></td>
       <td class="text-center"><?php  echo $prlnk   ; ?></td>

       

    </tr>
<?php }?>    

<?php  
echo '</table>';
}
?>
  </div>
  </div>
	<!-- </form> -->
<!--      <form id="pdfForm" action="download.php" method="post">

            <div style="display:none;" >
              <input type="text" name="fileContents" id="fileContents" value=''/>
              <input type="text" name="fileName" id="fileName" value='mySitePage.pdf'/>
              <input type="text" name="css" value='patemplatenew.css'/>

            </div>
            <input type="submit" value="Download PDF">
   </form> 	 -->


</form>

</body>
</html>

<!-- <script>  
  	function getPDF(){

		var HTML_Width = $(".canvas_div_pdf").width();
		var HTML_Height = $(".canvas_div_pdf").height();
		var top_left_margin = 15;
		var PDF_Width = HTML_Width+(top_left_margin*2);
		var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;
		
		var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
		

		html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
			canvas.getContext('2d');
			
			console.log(canvas.height+"  "+canvas.width);
			
			
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
		    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
			
			
			for (var i = 1; i <= totalPDFPages; i++) { 
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
			}
			
		    pdf.save("HTML-Document.pdf");
        });
	};

</script>   -->
<script type="text/javascript">
	$( document ).ready(function() {
    window.print();
});

</script>