
<?php 
include('includes/header.php');
ob_start();
include('db.php');


function valid_email($str) {
return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@(somaiya\.)+(edu)$/ix", $str)) ? FALSE : TRUE;
}
function checkemail($str) {
return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function error_report($error,$redirect) {
    echo "<form id ='error_report' method='post' action='$redirect'><input type='text' name='error_message' value='$error' hidden></form>";
    ?>
    <script type="text/javascript">
	$('#error_report').submit();

</script>
<?php
//return ;
}
//error_report("byebye",'google_link.php');
// $Fname=mysqli_real_escape_string($connection,$_POST['firstName']);
// $Lname=mysqli_real_escape_string($connection,$_POST['lastName']);
// $Rno=mysqli_real_escape_string($connection,$_POST['rno']);
// $dept=mysqli_real_escape_string($connection,$_POST['dept']);
// $Email=mysqli_real_escape_string($connection,$_POST['email']);
// $contact=mysqli_real_escape_string($connection,$_POST['phn']);
// $address=mysqli_real_escape_string($connection,$_POST['address']);
// $dob=mysqli_real_escape_string($connection,$_POST['dob']);
// $prog=mysqli_real_escape_string($connection,$_POST['prog']);
// $divison=mysqli_real_escape_string($connection,$_POST['divison']);
// $Mname=mysqli_real_escape_string($connection,$_POST['Mname']);
// $gender=mysqli_real_escape_string($connection,$_POST['gender']);
// $age=mysqli_real_escape_string($connection,$_POST['age']);
// $P_Email=mysqli_real_escape_string($connection,$_POST['P_Email']);
// $Admission_yr=mysqli_real_escape_string($connection,$_POST['Admission_yr']);

// echo "$Mname";
// echo "$divison";
// echo "$age";
// echo "$Rno";
// echo "$gender";
// if (!filter_var($P_Email, FILTER_VALIDATE_EMAIL)) {
//       $emailErr = "Invalid email format";
//       header('Location: 1.php?P_Email=2');
//     }

$primary_key="";
// $submit1= 0;
// $submit2= 0;
// $submit3= 0;
// $submit4= 0;
//echo $primary_key;
//$_SESSION['username']="vatsal.pathak@somaiya.edu";
if(isset($_SESSION['username'])){
    $primary_key = $_SESSION['username'];
}
if (isset($_POST['submit_personal'])){
   // $submit1= 1;
    $testsuccess=true;
    //return (error_report("Please enter a valid personal email","1.php")); 


    $erro4="";
//
//    if (!($_POST['email'] )) {
//        ##########check#################
//
//        //$erro4 .= "Enter a valid somaiya Email ID!<br>";
//        //&& valid_email($_POST["email"])
//        $testsuccess=false;
//       // echo 'UNSUCCESSFULL redirect';
//        header('Location: 1.php?email=1');
//
//    }else
        //error_report("Please enter a valid personal email","1.php");        
    if (!($_POST['P_Email'] && checkemail($_POST["P_Email"]))) {
        //header('Location: 1.php?P_Email=2');
        error_report("Please enter a valid personal email","1.php");
    }
    else    {


        $query="DELETE FROM `personal` WHERE Email='$primary_key'";
        if(!mysqli_query($connection,$query))
        {
            $testsuccess=false;
            echo "Error: " . mysqli_error($connection);
           echo "cant delete";
            //echo 'UNSUCCESSFULL redirect';
       //     header('Location: 1.php');
        }
        /*
            $orgDate = $_POST['dob'];  
        $date = str_replace( '/', '-', $orgDate); 
            $newDate = date("Y-m-d", strtotime($date));  
            //echo "New date format is: ".$newDate. " (YYYY-MM-DD)";  
         echo "dddddd".
             */

        $query="INSERT INTO `personal` (`Fname`,`Mname`,`Lname`,`gender`,`Rno`,`divison`,`dept`,`Email`,`P_Email`,`contact`,`dob`,`age`,`address`,`prog`,`Admission_yr`) VALUES ('".mysqli_real_escape_string($connection,$_POST['firstName'])."','".mysqli_real_escape_string($connection,$_POST['Mname'])."','".mysqli_real_escape_string($connection,$_POST['lastName'])."','".mysqli_real_escape_string($connection,$_POST['gender'])."','".mysqli_real_escape_string($connection,$_POST['rno'])."','".mysqli_real_escape_string($connection,$_POST['divison'])."','".mysqli_real_escape_string($connection,$_POST['dept'])."','".mysqli_real_escape_string($connection,$_POST['email'])."','".mysqli_real_escape_string($connection,$_POST['P_Email'])."','".mysqli_real_escape_string($connection,$_POST['phn'])."','".mysqli_real_escape_string($connection, $_POST['dob'] )."','".mysqli_real_escape_string($connection,$_POST['age'])."','".mysqli_real_escape_string($connection,$_POST['address'])."','".mysqli_real_escape_string($connection,$_POST['prog'])."','".mysqli_real_escape_string($connection,$_POST['Admission_yr'])."');";
            // $query="INSERT INTO personal (Fname,Mname,Lname,gender,Rno,divison,dept,Email,P_Email,contact,dob,age,address,prog,Admission_yr) VALUES ('$Fname','$Mname','$Lname','$gender','$Rno','$divison','$dept','$Email','$P_Email','$contact','$dob','$age','$address','$prog','$Admission_yr');";
         
        if(mysqli_query($connection,$query))
        {
       echo "Submitted";
    //    echo ' line redirect';
        //header('Location: 2.php');
        }
        else
        {
            $testsuccess=false;
          echo "cant change";
          echo $query;
        //    echo 'UNSUCCESSFULL redirect';
           // header('Location: 2.php');
        }


        if(array_key_exists("traverse1",$_POST))
       {

              //       echo "here";
           //header('Location: 1.php');
           $q1="";
        //    print_r($_FILES);
		foreach ($_FILES['resume']['error'] as $key => $error) {
           // echo 'wqaxdsfffffffffgs';
            //echo $error;
            
            if($_POST['traverse1'][$key] == "traverse")
            {
             //   echo 's0111111111111';
            $query="DELETE FROM `resume` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
             //   echo 'UNSUCCESSFULL redirect';
                //header('Location: 2.php');
               // echo "cant delete";
            }
            if ( $error== UPLOAD_ERR_OK) {
             //   echo "here1";
                //header('Location: xwww.php');
                $tmp_name = $_FILES["resume"]["tmp_name"][$key];
                
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["resume"]["name"][$key]);
                $mypath='users/'.$primary_key.'/Resume/';
                if (file_exists($mypath) && is_dir($mypath)) 
                { 
                    //echo "The  folder exists. </br>"; 
                } 
                else 
                { 
                   // echo "The folder does not exists. New Folder created.</br>"; 
                    mkdir($mypath, 0777, true);
                } 
                $mypath.="$name";
                if(move_uploaded_file($tmp_name, $mypath))
                {
                    //echo "success";

                    $query="INSERT INTO `resume`(`Email`, `resume`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$mypath)."')";
                    
                    
                    
                     

                    if(mysqli_query($connection,$query))
                    {
                       //  echo 'xwwwwwwcccccdswdswdswdswdswdswCESSFULL redirect';
//                  /      echo "Submitted";
                        //echo 'UNSUCCESSFULL redirect';
                        //header('Location: 1.php');
                    }
                    else
                    {
                        $testsuccess=false;
                     //echo "cant change";
                       // echo 'UNSUCCESSFULL redirect';
                        //header('Location: 2.php');
                    }
                
                }
                else
                {
                    $testsuccess=false;
                 //  echo "files not move uploaded";

                }
            }
                else{

                $testsuccess=false;
                }
                
                
            }
            

        }        
           
 
           
           
       }
        else
        {
                        $query="DELETE FROM `resume` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
             //   echo 'UNSUCCESSFULL redirect';
                //header('Location: 2.php');
           //     echo "cant delete";
            }

        
        }
        
        if(array_key_exists("traverse2",$_POST))
       {

          //           echo "here";
           //header('Location: 1.php');
           $q1="";
        //    print_r($_FILES);
		foreach ($_FILES['picture']['error'] as $key => $error) {
           // echo 'wqaxdsfffffffffgs';
            //echo $error;
            
            if($_POST['traverse2'][$key] == "traverse")
            {
             //   echo 's0111111111111';
            $query="DELETE FROM `picture` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            //    echo 'UNSUCCESSFULL redirect';
                //header('Location: 2.php');
             //   echo "cant delete";
            }
            if ( $error== UPLOAD_ERR_OK) {
            //    echo "here1";
                //header('Location: xwww.php');
                $tmp_name = $_FILES["picture"]["tmp_name"][$key];
                
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["picture"]["name"][$key]);
                $mypath='users/'.$primary_key.'/Picture/';
                if (file_exists($mypath) && is_dir($mypath)) 
                { 
                    //echo "The  folder exists. </br>"; 
                } 
                else 
                { 
                   // echo "The folder does not exists. New Folder created.</br>"; 
                    mkdir($mypath, 0777, true);
                } 
                $mypath.="$name";
                if(move_uploaded_file($tmp_name, $mypath))
                {
                    //echo "success";

                    $query="INSERT INTO `picture`(`Email`, `picture`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$mypath)."')";  

                    if(!mysqli_query($connection,$query))
                    {
                        $testsuccess=false;
                    }
                                    
                }
                else
                {
                    $testsuccess=false;
                 //   echo "file move fail";
                    
                    
                }
            }
            else{
                
                $testsuccess=false;
            }         
            }
        }        
  
       }
        else
        {
                        $query="DELETE FROM `picture` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
         //       echo 'UNSUCCESSFULL redirect';
                //header('Location: 2.php');
            //    echo "cant delete";
            }

        
        }
        
        
        
        
        
      //  echo "it ends";
       // 
         //header('Location: 2.php');

    if($testsuccess==true)
    {   $sq1="UPDATE google_user 
        SET 
            submission1 = 1
        WHERE
            email_id='$primary_key'";
            //$sqq="UPDATE `google_user` SET `submission1` = '0' WHERE `google_user`.`email_id` = 's23@somaiya.edu';";
        if(mysqli_query($connection,$sq1))
        {
          echo "SUBMITTED PAGE 1";
        }
        else
        {
          echo "NOT SUBMITTED PAGE 1";

        }
        echo "operation successfull.Redirecting.";
        header('Location: 2.php');
       }
    else
    {
        echo "operation Failed!!!Redirecting back!!!";
       // header('Location: 1.php');
       }

echo $testsuccess;
    }
    

}

//ALTER TABLE technical_skills
//ADD CONSTRAINT PK_Person PRIMARY KEY (Email,skillinfo);


if (isset($_POST['submit_skills']))
{
	$primary_key=$_SESSION['username'];
   $testsuccess=true;
    if($connection)

    {
        
            

            
		    $query="DELETE FROM `certified courses` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
               // echo 'UNSUCCESSFULL redirect';
                //header('Location: 2.php');
                echo "cant delete";
            }
        
		    $query="DELETE FROM `technical_skills` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
//                echo 'UNSUCCESSFULL redirect';
                //header('Location: 2.php');
//  /              echo "cant delete";
            }
		####first check if there is data is present in both tables below for the email id if yes delete all entries . if no means its first time user is filling the form
        
        
       if(array_key_exists("coursettl",$_POST))
       {

                //     echo "here";
           //header('Location: 1.php');
           $q1="";
		foreach ($_POST['traverse'] as $key => $error) {
           // $q1=" SELECT  `coursect`  FROM  `temp_certified courses`  WHERE  coursettl = '".$_POST['coursettl'][$key]."'  AND  Email = '$primary_key' ";
            if ($error=="traverse")
{          // header('Location: xwww.php');
                if ($_FILES["coursect"]["error"][$key] == UPLOAD_ERR_OK) {
               // echo "here1";
                //header('Location: xwww.php');
                $tmp_name = $_FILES["coursect"]["tmp_name"][$key];
                
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["coursect"]["name"][$key]);
                $mypath='users/'.$primary_key.'/course_certificate/';
                if (file_exists($mypath) && is_dir($mypath)) 
                { 
                    //echo "The  folder exists. </br>"; 
                } 
                else 
                { 
                   // echo "The folder does not exists. New Folder created.</br>"; 
                    mkdir($mypath, 0777, true);
                } 
                $mypath.="$name";
                if(move_uploaded_file($tmp_name, $mypath))
                {
                    //echo "success";

                    $query="INSERT INTO `certified courses`(`Email`, `coursettl`, `coursedsc`, `coursect` , `org` , `yr`  ) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['coursettl'][$key])."','".mysqli_real_escape_string($connection,$_POST['coursedsc'][$key])."','".mysqli_real_escape_string($connection,$mypath)."','".mysqli_real_escape_string($connection,$_POST['org'][$key])."','".mysqli_real_escape_string($connection,$_POST['yr'][$key])."')";
                    
                    
                    
                     

                    if(!mysqli_query($connection,$query))
                    {
                        $testsuccess=false;
                        //echo 'UNSUCCESSFULL redirect';
                        //header('Location: 1.php');
                    }

                
                }
                else
                {
                    $testsuccess=false;

                }
            }
            else
            {
                $testsuccess=false;

            }
}
            else 
            {
                //echo "here2";
                //header('Location: xew.php');
                //echo "query inside";

                //$qrun=mysqli_query($connection,$q);
                //if(mysqli_num_rows($result)>0){
                    //while($row1=mysqli_fetch_array($result)){
                        
                        $query="INSERT INTO `certified courses`(`Email`, `coursettl`, `coursedsc`, `coursect`, `yr`, `org`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['coursettl'][$key])."','".mysqli_real_escape_string($connection,$_POST['coursedsc'][$key])."','".mysqli_real_escape_string($connection,$error)."','".mysqli_real_escape_string($connection,$_POST['yr'][$key])."','".mysqli_real_escape_string($connection,$_POST['org'][$key])."')";



                     

                        if(!mysqli_query($connection,$query))
                        {
                           $testsuccess=false;
                            //echo 'UNSUCCESSFULL redirect';
                           
                        }


                  //  }
              //  }
              //  else{
              //      $testsuccess=false;                    
               // }

            }
           // else{
          //  $testsuccess=false;    
          //  }
        }        
           
 
           
           
       }
        else
        {
            $query="DELETE FROM `certified courses` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
         //       echo 'UNSUCCESSFULL redirect';
                //header('Location: 2.php');
            //    echo "cant delete";
            }

        }


        
       if(array_key_exists("skillinfo",$_POST))
           
       {
        foreach ($_POST["skillinfo"] as $key => $value) {
            if($_POST['skilllvl'][$key]>10)
            {
                $_POST['skilllvl'][$key]=10;
            }
            if($_POST['skilllvl'][$key]<10)
            {
                $_POST['skilllvl'][$key]=1;
            }            
            $query="INSERT INTO `technical_skills`(`Email`, `skillinfo`, `skilllvl`, `skilltype`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['skillinfo'][$key])."','".mysqli_real_escape_string($connection,$_POST['skilllvl'][$key])."','".mysqli_real_escape_string($connection,$_POST['skilltype'][$key])."')";
                    
                   
                    
                     

                    if(!mysqli_query($connection,$query))
                    {
                        $testsuccess=false;
                    }          
            
        }
       }
       else
        {
            $query="DELETE FROM `technical_skills` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }

        
        }        
        
    }
    else
    {
      die("connection failed because ".mysqli_connect_error() );
    }


    if($testsuccess==true)
    {
       $sq2="UPDATE google_user 
        SET 
            submission2 = 1
        WHERE
            email_id='$primary_key'";
            
        if(mysqli_query($connection,$sq2))
        {
          echo "SUBMITTED PAGE 2";
        }
        else
        {
          echo "NOT SUBMITTED PAGE 2";

        }
        echo "operation successfull.Redirecting.";
        header('Location: 3.php');
       }
    else
    {
        echo "operation Failed!!!Redirecting back!!!";
        header('Location: 2.php');
       }
    echo $testsuccess; 

    }
  

    
	





    
	
	if (isset($_POST['submit_industry']))
{
         $testsuccess=true;
	$primary_key=$_SESSION['username'];
   
    if($connection)

    {
                    

        
		    $query="DELETE FROM `internships` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }
        
		    $query="DELETE FROM `pos_res` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
               $testsuccess=false;
            }
         if(array_key_exists("ittl",$_POST))
         {
             
         foreach ($_POST["traverse"] as $key => $error) {
          //  $q1=" SELECT  `internships`  FROM  `temp_internships`  WHERE  ittl = '".$_POST['ittl'][$key]."'  AND  Email = '$primary_key' ";
             if($error=="traverse")
                 
{  
                if ($_FILES["ict"]["error"][$key] == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["ict"]["tmp_name"][$key];
                
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["ict"]["name"][$key]);
                $mypath='users/'.$primary_key.'/internship_certificate/';
                if (file_exists($mypath) && is_dir($mypath)) 
                { 
                    //echo "The  folder exists. </br>"; 
                } 
                else 
                { 
                   // echo "The folder does not exists. New Folder created.</br>"; 
                    mkdir($mypath, 0777, true);
                } 
                $mypath.="$name";
                if(move_uploaded_file($tmp_name, $mypath))
                {
                    //echo "success";
                   // echo $key."=".$_POST['itp'][$key];
                    $query="INSERT INTO `internships`(`Email`, `itp`, `ittl`, `itnw`, `ict`, `itto`, `itfrom`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['itp'][$key])."','".mysqli_real_escape_string($connection,$_POST['ittl'][$key])."','".mysqli_real_escape_string($connection,$_POST['itnw'][$key])."','".mysqli_real_escape_string($connection,$mypath)."','".mysqli_real_escape_string($connection,$_POST['itto'][$key])."','".mysqli_real_escape_string($connection,$_POST['itfrom'][$key])."')";
                    
                    
                     

                    if(!mysqli_query($connection,$query))
                    {
                        $testsuccess=false;
                    }
      
                
                }
                else
                {
                    $testsuccess=false;
                }
            }
            else
            {
                $testsuccess=false;
            }
}
            else 
            {
               // echo "here2";
                //header('Location: xew.php');
                //echo "query inside";

                //$qrun=mysqli_query($connection,$q);
               // if(mysqli_num_rows($result)>0){
                   // while($row1=mysqli_fetch_array($result)){
                        

                        $query="INSERT INTO `internships`(`Email`, `itp`, `ittl`, `itnw`, `ict`, `itto`, `itfrom`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['itp'][$key])."','".mysqli_real_escape_string($connection,$_POST['ittl'][$key])."','".mysqli_real_escape_string($connection,$_POST['itnw'][$key])."','".mysqli_real_escape_string($connection,$error)."','".mysqli_real_escape_string($connection,$_POST['itto'][$key])."','".mysqli_real_escape_string($connection,$_POST['itfrom'][$key])."')";

                        if(!mysqli_query($connection,$query))
                        {
                            $testsuccess=false;
                            //echo 'UNSUCCESSFULL redirect';
                            //header('Location: 1.php');
                        }

                //    }
              //  }
               // else
               // {
              //      $testsuccess=false;
              //  }

            }
            // else
           //  {
          //       $testsuccess=false;
          //   }
            
            
        } 
             
             
             
         }
        else
        {
            $query="DELETE FROM `internships` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }

        
        }


          if(array_key_exists("dtl",$_POST)){
            foreach ($_POST["dtl"] as $key => $value) {
                $query="INSERT INTO `pos_res`(`Email`, `dtl`, `yrr`) VALUES('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$value)."','".mysqli_real_escape_string($connection,$_POST['yrr'][$key])."')";


                        if(!mysqli_query($connection,$query))
                        {
                            $testsuccess=false;
    
                        }

            }
              
              
          }
        else
        {
            $query="DELETE FROM `pos_res` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            } 
        }
    
    }
    else
    {
      die("connection failed because ".mysqli_connect_error() );
    }

    if($testsuccess==true)
    {
      $sq3="UPDATE google_user 
        SET 
            submission3 = 1
        WHERE
            email_id='$primary_key'";
            
        if(mysqli_query($connection,$sq3))
        {
          echo "SUBMITTED PAGE 3";
        }
        else
        {
          echo "NOT SUBMITTED PAGE 3";

        }
        echo "operation successfull.Redirecting.";
        header('Location: 4.php');
       }
    else
    {
        echo "operation Failed!!!Redirecting back!!!";
        header('Location: 3.php');
       }
    echo $testsuccess; 

}
        
if (isset($_POST['submit_others']))
{
     $testsuccess=true;
	$primary_key=$_SESSION['username'];
  
    if($connection)

    {
        $query="DELETE FROM `Projects` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }
        
		    $query="DELETE FROM `other profiles` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }
        if(array_key_exists("prlnk",$_POST))
        {
            
        foreach ($_POST["prlnk"] as $key => $value) {
              
            $query="INSERT INTO `Projects`(`Email`, `prttl`, `prdsc`, `prlnk`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['prttl'][$key])."','".mysqli_real_escape_string($connection,$_POST['prdsc'][$key])."','".mysqli_real_escape_string($connection,$_POST['prlnk'][$key])."')";
                    

                    if(!mysqli_query($connection,$query))
                    {
                        $testsuccess=false;
                    }
     
            }
        }
        else
        {
            $query="DELETE FROM `Projects` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }

        
        }

        if(array_key_exists("proflnk",$_POST))
        {
            foreach ($_POST["proflnk"] as $key => $value) {

                $query="INSERT INTO `other profiles`(`Email`, `proflnk`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['proflnk'][$key])."')";

                        if(!mysqli_query($connection,$query))
                        {
                            $testsuccess=false;
                        }
            }
        }
        else
        {
            $query="DELETE FROM `other profiles` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }        
        }

    }
    else
    {
      die("connection failed because ".mysqli_connect_error() );
    }
    if($testsuccess==true)
    {$sq4="UPDATE google_user 
        SET 
            submission4 = 1
        WHERE
            email_id='$primary_key'";
            
        if(mysqli_query($connection,$sq4))
        {
          echo "SUBMITTED PAGE 4";
        }
        else
        {
          echo "NOT SUBMITTED PAGE 4";

        }
        echo "operation successfull.Redirecting.";
        header('Location: academics.php');
       }
    else
    {
        echo "operation Failed!!!Redirecting back!!!";
        header('Location: 4.php');
       }

    echo $testsuccess;

}




        
if (isset($_POST['academic_skills']))
{
     $testsuccess=true;
	$primary_key=$_SESSION['username'];
  
    if($connection)

    {
        $query="DELETE FROM `academics` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }
        
		    $query="DELETE FROM `exta` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }
        
        	$query="DELETE FROM `ksa` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }
        // if(array_key_exists("etype",$_POST))
        // {
        $query="DELETE FROM `academics` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {   echo "cant connect";
                $testsuccess=false;
            }
        // foreach ($_POST["etype"] as $key => $value) {
              
            $query1="INSERT INTO `academics`(`Email`,`univ`, `yop`, `inst`, `grade`,`dipOR12`,`univ12`,`yop12`,`inst12`,`grade12`,`univBTECH`,`yopBTECH`,`instBTECH`,`BCGPI`,`BSEM1`,`BSEM2`,`BSEM3`,`BSEM4`,`BSEM5`,`BSEM6`,`BSEM7`,`BSEM8`,`univMTECH`,`yopMTECH`,`instMTECH`,`MCGPI`,`MSEM1`,`MSEM2`,`curr_backlog`,`tot_backlog`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['univ'])."','".mysqli_real_escape_string($connection,$_POST['yop'])."','".mysqli_real_escape_string($connection,$_POST['inst'])."','".mysqli_real_escape_string($connection,$_POST['grade'])."','".mysqli_real_escape_string($connection,$_POST['dipOR12'])."','".mysqli_real_escape_string($connection,$_POST['univ12'])."','".mysqli_real_escape_string($connection,$_POST['yop12'])."','".mysqli_real_escape_string($connection,$_POST['inst12'])."','".mysqli_real_escape_string($connection,$_POST['grade12'])."','".mysqli_real_escape_string($connection,$_POST['univBTECH'])."','".mysqli_real_escape_string($connection,$_POST['yopBTECH'])."','".mysqli_real_escape_string($connection,$_POST['instBTECH'])."','".mysqli_real_escape_string($connection,$_POST['BCGPI'])."','".mysqli_real_escape_string($connection,$_POST['BSEM1'])."','".mysqli_real_escape_string($connection,$_POST['BSEM2'])."','".mysqli_real_escape_string($connection,$_POST['BSEM3'])."','".mysqli_real_escape_string($connection,$_POST['BSEM4'])."','".mysqli_real_escape_string($connection,$_POST['BSEM5'])."','".mysqli_real_escape_string($connection,$_POST['BSEM6'])."','".mysqli_real_escape_string($connection,$_POST['BSEM7'])."','".mysqli_real_escape_string($connection,$_POST['BSEM8'])."','".mysqli_real_escape_string($connection,$_POST['univMTECH'])."','".mysqli_real_escape_string($connection,$_POST['yopMTECH'])."','".mysqli_real_escape_string($connection,$_POST['instMTECH'])."','".mysqli_real_escape_string($connection,$_POST['MCGPI'])."','".mysqli_real_escape_string($connection,$_POST['MSEM1'])."','".mysqli_real_escape_string($connection,$_POST['MSEM2'])."','".mysqli_real_escape_string($connection,$_POST['curr_backlog'])."','".mysqli_real_escape_string($connection,$_POST['tot_backlog'])."');";
         if(mysqli_query($connection,$query1))
        {
       echo "Submitted";
    //    echo ' line redirect';
        //header('Location: 2.php');
        }
        else
        {
            $testsuccess=false;
          echo "cant change";
        //    echo 'UNSUCCESSFULL redirect';
           // header('Location: 2.php');
        }


        //             if(!mysqli_query($connection,$query))
        //             {
        //                 $testsuccess=false;
        //             }
     
        //     }
        // }
        // else
        // {


        
        // }

        if(array_key_exists("ach",$_POST))
        {
            foreach ($_POST["ach"] as $key => $value) {

                $query="INSERT INTO `ksa`(`Email`, `ach`, `achy`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['ach'][$key])."','".mysqli_real_escape_string($connection,$_POST['achy'][$key])."')";

                        if(!mysqli_query($connection,$query))
                        {
                            $testsuccess=false;
                        }
            }
        }
        else
        {
            $query="DELETE FROM `ksa` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }        
        }
        
        if(array_key_exists("aod",$_POST))
        {
            foreach ($_POST["aod"] as $key => $value) {

                $query="INSERT INTO `exta`(`Email`, `acttype`, `yoa`, `aod`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['acttype'][$key])."','".mysqli_real_escape_string($connection,$_POST['yoa'][$key])."','".mysqli_real_escape_string($connection,$_POST['aod'][$key])."')";

                        if(!mysqli_query($connection,$query))
                        {
                            $testsuccess=false;
                        }
            }
        }
        else
        {
            $query="DELETE FROM `exta` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }        
        }
        

    }
    else
    {
      die("connection failed because ".mysqli_connect_error() );
    }
    if($testsuccess==true)
    {$sq5="UPDATE google_user 
        SET 
            submissionAcademics = 1
        WHERE
            email_id='$primary_key'";
            
        if(mysqli_query($connection,$sq5))
        {
          echo "SUBMITTED PAGE Academics";
        }
        else
        {
          echo "NOT SUBMITTED Academics";

        }
        echo "operation successful.Redirecting.acad";
        header('Location: google_link.php');
       }
    else
    {
        echo "operation failed Failed!!!Redirecting back!!!";
        //header('Location: 4.php');
       }

    echo $testsuccess;

}





//
//if (isset($_POST['submit_link']))
//{
//$testsuccess = true;
////$resume_link=$_POST['link'];
//$primary_key=$_SESSION["username"];
////$resume_link = mysql_real_escape_string($_POST["link"]);
//    if($connection)
//
//    {
//      echo "conncet";
//      echo $_POST["link"];
//      echo $primary_key;
//
//
//    }
//    else{
//echo "not connected";
//    }               
//
//
//$query6="INSERT INTO `resume`(`Email`, `resume`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST["link"])."');";
//// $query="INSERT INTO resume (Email,resume)
//// VALUES ('bre','bye')";
//                    
//           
//                     
//
//if(!mysqli_query($connection,$query6))
//{
//  $testsuccess=false;
//  echo $query6;
//
//}
//else
//{
// 
//
//}
//
//if($testsuccess==true)
//{$sq6="UPDATE google_user 
//        SET 
//            submissionLink = 1
//        WHERE
//            email_id='$primary_key'";
//            
//        if(mysqli_query($connection,$sq6))
//        {
//          echo "SUBMITTED PAGE Resume Link";
//        }
//        else
//        {
//          echo "NOT SUBMITTED Resume Link";
//
//        }
//  echo "operation successful.Redirecting.resume";
//
//}
//else
//{
//echo "operation failed Failed!!!Redirecting back!!!";
//        //header('Location: 4.php');
//}
//
//    echo $testsuccess;
//
//
//
//}


if (isset($_POST['submit_link']))
{
$testsuccess = true;
//$resume_link=$_POST['link'];
$primary_key=$_SESSION["username"];
//$resume_link = mysql_real_escape_string($_POST["link"]);
    if($connection)

    {
      echo "conncet";
      echo $_POST["link"];
      echo $primary_key;


    }
    else{
echo "not connected";
    }               


//$query6="INSERT INTO `resume`(`Email`, `resume`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST["link"])."');";
// $query="INSERT INTO resume (Email,resume)
// VALUES ('bre','bye')";
                    


$query6="INSERT INTO resume (Email,resume) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST["link"])."')
ON DUPLICATE KEY UPDATE resume='".mysqli_real_escape_string($connection,$_POST["link"])."';"      ;
                     

if(!mysqli_query($connection,$query6))
{
  $testsuccess=false;
  echo $query6;

}
else
{
 

}

if($testsuccess==true)
{$sq6="UPDATE google_user 
        SET 
            submissionLink = 1
        WHERE
            email_id='$primary_key'";
            
        if(mysqli_query($connection,$sq6))
        {
          echo "SUBMITTED PAGE Resume Link";
          header('Location: http://localhost/Placement-Assistant-master/');
        }
        else
        {
          echo "NOT SUBMITTED Resume Link";

        }
  echo "operation successful.Redirecting.resume";

}
else
{
echo "operation failed Failed!!!Redirecting back!!!";
        //header('Location: 4.php');
}

    echo $testsuccess;



}





















?>