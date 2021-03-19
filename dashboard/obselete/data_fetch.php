<?php 
session_start();
ob_start();
include('db.php');
function valid_email($str) {
return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@(somaiya\.)+(edu)$/ix", $str)) ? FALSE : TRUE;
}

$primary_key="";
echo $primary_key;
//$_SESSION['username']="vatsal.pathak@somaiya.edu";
if(isset($_SESSION['username'])){
    $primary_key = $_SESSION['username'];
}
if (isset($_POST['submit_personal'])){
    $testsuccess=true;
    


    $erro4="";

    if (!($_POST['email'] && valid_email($_POST["email"]))) {
        ##########check#################

        //$erro4 .= "Enter a valid somaiya Email ID!<br>";
        $testsuccess=false;
       // echo 'UNSUCCESSFULL redirect';
        header('Location: 1.php?email=1');

    }
    else    {


        $query="DELETE FROM `personal` WHERE Email='$primary_key'";
        if(!mysqli_query($connection,$query))
        {
            $testsuccess=false;
           // echo "cant delete";
            //echo 'UNSUCCESSFULL redirect';
       //     header('Location: 1.php');
        }

        $query="INSERT INTO `personal` (`Fname`,`Lname`,`Rno`,`dept`,`Email`,`contact`) VALUES ('".mysqli_real_escape_string($connection,$_POST['firstName'])."','".mysqli_real_escape_string($connection,$_POST['lastName'])."','".mysqli_real_escape_string($connection,$_POST['rno'])."','".mysqli_real_escape_string($connection,$_POST['dept'])."','".mysqli_real_escape_string($connection,$_POST['email'])."','".mysqli_real_escape_string($connection,$_POST['phn'])."')";

        if(mysqli_query($connection,$query))
        {
      //  echo "Submitted";
    //    echo 'next line redirect';
        //header('Location: 2.php');
        }
        else
        {
            $testsuccess=false;
          //  echo "cant change";
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
                     //   echo "cant change";
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
    {
        echo "operation successfull.Redirecting.";
        header('Location: 2.php');
       }
    else
    {
        echo "operation Failed!!!Redirecting back!!!";
        header('Location: 1.php');
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
        
            
		    $query="INSERT INTO `temp_certified courses` SELECT * FROM `certified courses` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
             //   echo 'UNSUCCESSFULL redirect';
               // header('Location: 2.php');
              //  echo "cant delete";
            }
            
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
            $q1=" SELECT  `coursect`  FROM  `temp_certified courses`  WHERE  coursettl = '".$_POST['coursettl'][$key]."'  AND  Email = '$primary_key' ";
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

                    $query="INSERT INTO `certified courses`(`Email`, `coursettl`, `coursedsc`, `coursect`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['coursettl'][$key])."','".mysqli_real_escape_string($connection,$_POST['coursedsc'][$key])."','".mysqli_real_escape_string($connection,$mypath)."')";
                    
                    
                    
                     

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
            else if( $result=mysqli_query($connection,$q1))
            {
                //echo "here2";
                //header('Location: xew.php');
                //echo "query inside";

                //$qrun=mysqli_query($connection,$q);
                if(mysqli_num_rows($result)>0){
                    while($row1=mysqli_fetch_array($result)){
                        
                        $query="INSERT INTO `certified courses`(`Email`, `coursettl`, `coursedsc`, `coursect`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['coursettl'][$key])."','".mysqli_real_escape_string($connection,$_POST['coursedsc'][$key])."','".mysqli_real_escape_string($connection,$row1['coursect'])."')";



                     

                        if(!mysqli_query($connection,$query))
                        {
                           $testsuccess=false;
                            //echo 'UNSUCCESSFULL redirect';
                           
                        }


                    }
                }
                else{
                    $testsuccess=false;                    
                }

            }
            else{
            $testsuccess=false;    
            }
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

    $query="DELETE FROM `temp_certified courses` WHERE Email='$primary_key'";
    if(!mysqli_query($connection,$query))
    {
        $testsuccess=false;
    }
    if($testsuccess==true)
    {
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
                    
		    $query="INSERT INTO `temp_internships` SELECT * FROM `internships` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
   
            }
        
		    $query="DELETE FROM `internships` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }
        
		    $query="DELETE FROM `industrial knowledge` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
               $testsuccess=false;
            }
         if(array_key_exists("ittl",$_POST))
         {
             
         foreach ($_POST["traverse"] as $key => $error) {
            $q1=" SELECT  `internships`  FROM  `temp_internships`  WHERE  ittl = '".$_POST['ittl'][$key]."'  AND  Email = '$primary_key' ";
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
                    $query="INSERT INTO `internships`(`Email`, `itp`, `ittl`, `idsc`, `ict`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['itp'][$key])."','".mysqli_real_escape_string($connection,$_POST['ittl'][$key])."','".mysqli_real_escape_string($connection,$_POST['idsc'][$key])."','".mysqli_real_escape_string($connection,$mypath)."')";
                    
                    
                     

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
            else if( $result=mysqli_query($connection,$q1))
            {
               // echo "here2";
                //header('Location: xew.php');
                //echo "query inside";

                //$qrun=mysqli_query($connection,$q);
                if(mysqli_num_rows($result)>0){
                    while($row1=mysqli_fetch_array($result)){
                        

                        $query="INSERT INTO `internships`(`Email`, `itp`, `ittl`, `idsc`, `ict`) VALUES ('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['itp'][$key])."','".mysqli_real_escape_string($connection,$_POST['ittl'][$key])."','".mysqli_real_escape_string($connection,$_POST['idsc'][$key])."','".mysqli_real_escape_string($connection,$row1['ict'])."')";

                        if(!mysqli_query($connection,$query))
                        {
                            $testsuccess=false;
                            //echo 'UNSUCCESSFULL redirect';
                            //header('Location: 1.php');
                        }

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
             
             
             
         }
        else
        {
            $query="DELETE FROM `internships` WHERE Email='$primary_key'";
            if(!mysqli_query($connection,$query))
            {
                $testsuccess=false;
            }

        
        }


          if(array_key_exists("ik",$_POST)){
            foreach ($_POST["ik"] as $key => $value) {
                $query="INSERT INTO `industrial knowledge`(`Email`, `ik`) VALUES('".mysqli_real_escape_string($connection,$primary_key)."','".mysqli_real_escape_string($connection,$_POST['ik'][$key])."')";


                        if(!mysqli_query($connection,$query))
                        {
                            $testsuccess=false;
    
                        }

            }
              
              
          }
        else
        {
            $query="DELETE FROM `industrial knowledge` WHERE Email='$primary_key'";
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
    $query="DELETE FROM `temp_internships` WHERE Email='$primary_key'";
    if(!mysqli_query($connection,$query))
    {
        $testsuccess=false;
    }
    if($testsuccess==true)
    {
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
    {
        echo "operation successfull.Redirecting.";
        header('Location: 1.php');
       }
    else
    {
        echo "operation Failed!!!Redirecting back!!!";
        header('Location: 4.php');
       }

    echo $testsuccess;

}


?>