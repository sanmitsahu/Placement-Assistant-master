<?php  
include('security.php');
//include('db.php');
#session_start();

 #require 'db.php';

#Create ,user,company

if(isset($_POST['register']))
{
	$name =$_POST['name'];
	$username =$_POST['username'];
	$email =$_POST['mailid'];
	$contact =$_POST['contact'];
	$password =$_POST['passadmin'];
	$cpass =$_POST['confirmpass'];
	$type = 1;

	if ($password === $cpass) {
		
	$query = "INSERT INTO `register`(`name`, `contact`, `username`, `password`, `email`, `usertype`) VALUES ('$name','$contact','$username','$password','$email',$type)";
	$query_run = mysqli_query($connection, $query);
		

	  if($query_run)
	  {
	  	
	  	$_SESSION['success'] = "Admin Added Successfully";
	  	header('Location: index.php');  
	  }
	  else
	  {

	  	$_SESSION['status'] = "Admin Profile Not Added";
	  	header('Location: index.php');  
	  }
	}
	else
	{
		$_SESSION['status'] = " Password and Confirm Password Does not Match";
	  	header('Location: index.php');  
	}
}

if(array_key_exists("delete_doc",$_POST))
{
    $path_user=$_POST["delete_doc"];
    if (file_exists($path_user)) {
        unlink($path_user);
        //echo "dilit";

}
    if(array_key_exists("stat",$_POST))
    {
        if($_POST["stat"]==1)
        {
            //////////////////////////////////////////////////////
            $mypath= dirname(__DIR__, 2);
            $mypath.="\dashboard\companies\default.docx";
            //echo $mypath;
            $name=$_POST["ref"];
            if($connection)
            {
                $query="UPDATE `company_module` SET `primary_link`='".mysqli_real_escape_string($connection,$mypath)."' WHERE Ref_no = '$name'";
                //echo $query;
                if( $result=mysqli_query($connection,$query))
                {
                }


        }
    }


}


}



if(isset($_POST["register_user"]))
{

  if($_FILES['file']['name'])
  {
    $filename = explode(".",$_FILES['file']['name']);
    if($filename[1] == 'csv')
    {
    	$record=0;
      $handle = fopen($_FILES['file']['tmp_name'], "r");
      while($data = fgetcsv($handle,1000,","))
      {
        $item1 = mysqli_real_escape_string($connection, $data[0]);
        $item2 = mysqli_real_escape_string($connection, $data[1]);
        $item3 = mysqli_real_escape_string($connection, $data[2]);
        $item4 = mysqli_real_escape_string($connection, $data[3]);
        $sql = "INSERT into google_user (First_name,Last_name,email_id,usertype) VALUES('$item1', '$item2', '$item3',$item4)";
        mysqli_query($connection, $sql);
        if ($connection->query($sql) === FALSE) {
            ?>


               <script type="text/javascript">
                   console.log("easr");

                   </script>
<?php
        echo "Users created successfully ";
                       header('Location: student_manager.php?message:success'); 
      }
          else{
              echo "error";
          }

      }
 
      fclose($handle);
    }
  }


    
    
}


if(isset($_POST["status_company"]))
{
    $refno =$_POST["status_company"];
    
    
    $query= " UPDATE `company_module` SET `status`= 1 WHERE Ref_no='$refno'";
            
        if(mysqli_query($connection,$query))
        {
            echo "success1";
            //header('Location: student_manager.php'); 
        }
        else
        {
        echo "4deee2";
    //echo ($testsuccess==false);
        $testsuccess=false;
        }
    
}

    
if(isset($_POST["delete_company"]))
{
    $refno =$_POST["delete_company"];
$query="select * from `company_module` where Ref_no='$refno'";
    if( $result=mysqli_query($connection,$query))
    {
        if(mysqli_num_rows($result)>0){
           // $row1=mysqli_fetch_array($result);
                	
	       while($row1=mysqli_fetch_array($result))
           { echo $row1;
               $batch =$row1['year'];}
        }
    }
    
    $mypath= dirname(__DIR__, 2);
    $mypath.="\dashboard\companies\\".$batch."\\".$refno."\\";
    $path_user=$mypath;
    echo $path_user;
    echo (file_exists($path_user));
    if (file_exists($path_user)) {
        array_map('unlink',glob("$path_user/*.*"));
        echo "did";
        rmdir($path_user);
        unlink($path_user);  
    }
    $query="DELETE FROM `company_module` WHERE Ref_no='$refno'";
    if(!mysqli_query($connection,$query))
    {
        $testsuccess=false;
     //   echo 'UNSUCCESSFULL redirect';
        //header('Location: 2.php');
       // echo "cant delete";
    }

}

if(isset($_POST['update_company']))
{
    

    
	$refno =$_POST['refno'];
	$doa =$_POST['doa'];
    $batch =$_POST['batch'];
	$email =$_POST['email'];
	$cname =$_POST['name'];
	$addr =$_POST['addr'];
    $categ= $_POST['categ'];
	$regdate =$_POST['regdate'];
    $mypath= dirname(__DIR__, 2);
    $mypath.="\dashboard\companies\\".$batch."\\".$refno."\\";
    $maindoc=$_POST['traverse6'][0];
    $attach="";
    //echo "ss";
    //cho $regdate;
    $testsuccess=true;
   // echo $mypath;
    $basepath=$mypath;
    $query="select * from `company_module` where Ref_no='$refno'";
    
    if($qrun=mysqli_query($connection,$query))
    {
        echo "success1";
                   
        //mysqli_query($connection,$q);
        if(mysqli_num_rows($qrun)==0)
        {
            ///////////////////////////////////////////////////////////APPROPRIATE ERROR//////////////////////////////////////////////////////////////////
            header('Location: companies.php?error=101'); 
            
        }
    }
    else
    {
    $testsuccess=false;
    }

   
    /////////checkpoint backup 1   
    if(array_key_exists("traverse7",$_POST))
       {
           $q1="";
		foreach ($_POST['traverse7'] as $key => $value) {

            
            if($_POST['traverse7'][$key] == "traverse")
            {

            if ( $_FILES['attach']['error'][$key]== UPLOAD_ERR_OK) {

                $tmp_name = $_FILES['attach']["tmp_name"][$key];
                $mypath=$basepath."attachments\\";   
                $name = basename($_FILES['attach']["name"][$key]);   
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
    
    
    foreach ($_POST['traverse6'] as $key => $value) {
        if($_POST['traverse6'][$key] == "traverse")
            {
            

            if ( $_FILES['maindoc']['error'][$key]== UPLOAD_ERR_OK) {

                $tmp_name = $_FILES['maindoc']["tmp_name"][$key];
                $mypath=$basepath;   
                $name = basename($_FILES['maindoc']["name"][$key]);   
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
                $maindoc=$mypath;
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
    

    echo $testsuccess;
    $attach=$basepath."attachments\\"; 
    

    $query="DELETE FROM `company_module` WHERE Ref_no='$refno'";
    if(!mysqli_query($connection,$query))
    {
        $testsuccess=false;
     //   echo 'UNSUCCESSFULL redirect';
        //header('Location: 2.php');
       // echo "cant delete";
    }

    
    if($testsuccess)
    {
        echo "success";
        $query="INSERT INTO `company_module`(`Ref_no`, `Announcement_date`, `year`, `Company_name`, `Address`, `Reg_deadline`, `email_id`, `primary_link`, `secondary_link`,`categ`) VALUES ('".mysqli_real_escape_string($connection,$refno)."','".mysqli_real_escape_string($connection,$doa)."','".mysqli_real_escape_string($connection,$batch)."','".mysqli_real_escape_string($connection,$cname)."','".mysqli_real_escape_string($connection,$addr)."','".mysqli_real_escape_string($connection,$regdate)."','".mysqli_real_escape_string($connection,$email)."','".mysqli_real_escape_string($connection,$maindoc)."','".mysqli_real_escape_string($connection,$attach)."','".mysqli_real_escape_string($connection,$categ)."')";
        
        if(mysqli_query($connection,$query))
        {
            echo "success1";
            header('Location: companies.php'); 
        }
        else
        {
                                echo "4deee2";
        echo ($testsuccess==false);
        $testsuccess=false;
        }
    }
    else{
        echo "fail";
    }
       
 
//header('Location: companies.php'); 

}
















if(isset($_POST['update_placement']))
{
    

    
	$refno =$_POST['refno'];
    $date_of_placement =$_POST['date_of_placement'];
	$email_id =$_POST['email_id'];
    $categ= $_POST['categ'];
	if ($categ=="Not placed"){
        $categ="not";
    }
    else if ($categ=="Dream"){
        $categ="dream";
    }
    else if ($categ=="Non-Dream"){
        $categ="nondream";
    }
    else if ($categ=="Super-Dream"){
        $categ="superdream";
    }
    $testsuccess=true;
   // echo $mypath;


        if($testsuccess)
    {
        echo "success";

        $query= " UPDATE `google_user` SET `Ref_no`= '".mysqli_real_escape_string($connection,$refno)."' ,`categ`= '".mysqli_real_escape_string($connection,$categ)."',`date_of_placement`= '".mysqli_real_escape_string($connection,$date_of_placement)."'  WHERE  email_id = '".$email_id."'" ;
            echo $query;
        if(mysqli_query($connection,$query))
        {
            echo "success1";
            header('Location: student_manager.php'); 
        }
        else
        {
        echo "4deee2";
    //echo ($testsuccess==false);
        $testsuccess=false;
        }
    }
    else{
        echo "fail";
    }
        
//"INSERT INTO `company_module`(`Ref_no`, `Announcement_date`, `year`, `Company_name`, `Address`, `Reg_deadline`, `email_id`, `primary_link`, `secondary_link`,`categ`) VALUES ('".."','".."','".mysqli_real_escape_string($connection,$batch)."','".mysqli_real_escape_string($connection,$cname)."','".mysqli_real_escape_string($connection,$addr)."','".mysqli_real_escape_string($connection,$regdate)."','".mysqli_real_escape_string($connection,$email)."','".mysqli_real_escape_string($connection,$maindoc)."','".mysqli_real_escape_string($connection,$attach)."','".mysqli_real_escape_string($connection,$categ)."')";
            
}



























if(isset($_POST['add_company']))
{
    

    
	$refno =$_POST['refno'];
	$doa =$_POST['doa'];
    $batch =$_POST['batch'];
	$email =$_POST['email'];
	$cname =$_POST['name'];
	$addr =$_POST['addr'];
    $categ= $_POST['categ'];
	$regdate =$_POST['regdate'];
    $mypath= dirname(__DIR__, 2);
    $mypath.="\dashboard\companies\\".$batch."\\".$refno."\\";
    $maindoc="";
    $attach="";
    $testsuccess=true;
   // echo $mypath;
    $basepath=$mypath;
    $query="select * from `company_module` where Ref_no='$refno'";
    
    if($qrun=mysqli_query($connection,$query))
    {
        echo "success1";
                   
        //mysqli_query($connection,$q);
        if(mysqli_num_rows($qrun)>0)
        {
            header('Location: companies.php?error=101'); 
            
        }
    }
    else
    {
    $testsuccess=false;
    }

  // $q1="";
   print_r($_FILES);
    
foreach ($_FILES['maindoc']['error'] as $key => $error) {
    if ( $error== UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["maindoc"]["tmp_name"][$key];

        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["maindoc"]["name"][$key]);
        //$name="index.docx";//overriding the original name
            echo "cp3 ";
        echo $testsuccess;
        if (file_exists($mypath) && is_dir($mypath)) 
        { 
            $testsuccess=false;
            break;
            //appropriate message for user exists
           // echo "The  folder exists. </br>"; 
        } 
        else 
        { 
          // echo "The folder does not exists. New Folder created.</br>"; 
            mkdir($mypath, 0777, true);
        } 
        $mypath.=$name;
        if(move_uploaded_file($tmp_name, $mypath))
        {
             $maindoc=$mypath;
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

    echo "cp1";
foreach ($_FILES['attach']['error'] as $key => $error) {
    if ( $error== UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["attach"]["tmp_name"][$key];
        $mypath=$basepath."attachments\\";    
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["attach"]["name"][$key]);
        //$name="index.docx";//overriding the original name
        echo $testsuccess;
        if (file_exists($mypath) && is_dir($mypath)) 
        { 
            if($key==0)
            {
                $testsuccess=false;
                break;
            }
            //echo "The  folder exists. </br>"; 
        } 
        else 
        { 
          // echo "The folder does not exists. New Folder created.</br>"; 
            mkdir($mypath, 0777, true);
        } 
        $mypath.=$name;
        if(move_uploaded_file($tmp_name, $mypath))
        {

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
    //echo "he";
    //echo $testsuccess;
    $attach=$basepath."attachments\\"; 
    if($testsuccess)
    {
        echo "success";
        $query="INSERT INTO `company_module`(`Ref_no`, `Announcement_date`, `year`, `Company_name`, `Address`, `Reg_deadline`, `email_id`, `primary_link`, `secondary_link`,`categ`) VALUES ('".mysqli_real_escape_string($connection,$refno)."','".mysqli_real_escape_string($connection,$doa)."','".mysqli_real_escape_string($connection,$batch)."','".mysqli_real_escape_string($connection,$cname)."','".mysqli_real_escape_string($connection,$addr)."','".mysqli_real_escape_string($connection,$regdate)."','".mysqli_real_escape_string($connection,$email)."','".mysqli_real_escape_string($connection,$maindoc)."','".mysqli_real_escape_string($connection,$attach)."','".mysqli_real_escape_string($connection,$categ)."')";
        
        if(mysqli_query($connection,$query))
        {
            echo "success1";
                        header('Location: companies.php'); 
        }
        else
        {
                                echo "4deee2";
    echo ($testsuccess==false);
        $testsuccess=false;
        }
    }
    else{
        echo "fail";
    }
       
 
//header('Location: companies.php'); 

}






#create admin,user,company End

if(isset($_POST['login_admin']))
{
	$username =$_POST['username'];
$pass=$_POST['password'];


		$query = "SELECT * FROM register WHERE username = '$username' AND password = '$pass' ";
	
	$query_run = mysqli_query($connection, $query);
	$usertype = mysqli_fetch_array($query_run);

	  if($usertype['usertype']==1)
	  {
	      $_SESSION['usertype']=1;
	  	$_SESSION['username'] = $username ;
	  	header('Location: dashboard.php');  
	  }

	  else
	  {
	  	$_SESSION['status'] = "Username and Password Does not Match";
	  	header('Location: index.php');  
	  }
	
	
}
#create admin,user,company End

if(isset($_POST['submit_file']))
{
	if(!empty($_FILES['file']))
	{
		
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
		    
		    $type=$_POST['type'];
			if($type=='aptitude')
			{
				$dept=10;
			}
			else
			{
				$dept=$_POST['department'];
				
			}
//		    $q='select * from department where dept_id='.$dept;
//		    $q_run1=mysqli_query($connection,$q);
//		    $row=mysqli_fetch_array($q_run1);
		    $name= $_FILES['file']['name'];
		    $dep=str_replace(".csv","",$name);
		    //echo($dep);
            if($_POST['sub']=='-1')
			{
				$subtype=$_POST['new_sub'];
				
			}
			else
			{
				$subtype=$_POST['sub'];
			}
            $storagename = $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            $file = fopen("upload/".$_FILES['file']['name'],"r");
            $count=0;
            $start=false;
			$bool=true;
while(! feof($file))
  {
  	
  $arr=(fgetcsv($file));
  if($arr[0]==''||$arr[1]==''||arr[2]==''){
break;
  }	  
  if($start&&(!is_null($arr[0])||!is_null($arr[1])||!is_null($arr[3]))){
  $num=(int)$arr[0];
  $q=$arr[1];
  $ans=$arr[2];
  $exp=$arr[3];
  $options=array();
  for ($o=3;$o<=$num+3;$o++){
	  
  array_push($options,$arr[1+$o]);
  }
  for($k=$o+2;$k<11;$k++)
  {
	array_push($options,null);
  }	
  
  echo $num;
  #print_r($options);
 
  $sql="insert into practice_questions (dept_id,type,subtype,question,opt1,opt2,opt3,opt4,opt5,opt6,opt7,no_of_option,ans,explaination) values('$dept','$type','$subtype','$q','$options[0]','$options[1]','$options[2]','$options[3]','$options[4]','$options[5]','$options[6]','$num','$ans','$exp')";
  $run=mysqli_query($connection,$sql);
  
  	

  }
  if($arr[1]=='question'&&$arr[0]=='num_of_option'&&explode(".",$storagename)[1]=='csv'&&$bool)
  {
  	$start=true;
	$bool=false;
  	

  }
  
 
}


fclose($file);
$file_pointer = "../indiabix/Scrape_IndiaBix_QA-master/DB_Collections/temp_jsonfiles/".$_FILES['file']['name'];
unlink($file_pointer); 

              

	}
	else{
		$_SESSION['success'] = "PLEASE SELECT THE FILE.NO FILE CHOOSEN";
	}
	if($start)
	{
		  	$_SESSION['success'] = "Questions  Added Successfully";
			if($type!='aptitude' && $_POST['sub']=='-1'){
					$q="insert into subject (dept_id,department) values('$dept','$subtype')";
					$t=mysqli_query($connection,$q);
					$_SESSION['success'] = "Questions  inside if  Added Successfully";
				}
	}
	else
	{
				  	$_SESSION['success'] = "SORRY CSV FILE SHOULD BE PROPER Format OR INVALID file type(csv only)";

	}


	
header('Location: addpractice.php');

}


if(isset($_POST['submit_fileapti']))
{
    if(!empty($_FILES['file']))
    {
        
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            
            $type=$_POST['type'];
            if($type=='aptitude')
            {
                $dept=10;
            }
            else
            {
                $dept=$_POST['department'];
                
            }
//          $q='select * from department where dept_id='.$dept;
//          $q_run1=mysqli_query($connection,$q);
//          $row=mysqli_fetch_array($q_run1);
            $name= $_FILES['file']['name'];
            $dep=str_replace(".csv","",$name);
            //echo($dep);
            if($_POST['sub']=='-1')
            {
                $subtype=$_POST['new_sub'];
                
            }
            else
            {
                $subtype=$_POST['sub'];
            }
            $storagename = $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            $file = fopen("upload/".$_FILES['file']['name'],"r");
            $count=0;
            $start=false;
            $bool=true;
while(! feof($file))
  {
    
  $arr=(fgetcsv($file));
  if($arr[0]==''||$arr[1]==''||arr[2]==''){
break;
  }   
  if($start&&(!is_null($arr[0])||!is_null($arr[1])||!is_null($arr[3]))){
  $num=(int)$arr[0];
  $q=$arr[1];
  $ans=$arr[2];
  $exp=$arr[3];
  $options=array();
  for ($o=3;$o<=$num+3;$o++){
      
  array_push($options,$arr[1+$o]);
  }
  for($k=$o+2;$k<11;$k++)
  {
    array_push($options,null);
  } 
  
  echo $num;
  #print_r($options);
 
  $sql="insert into practice_questions (dept_id,type,subtype,question,opt1,opt2,opt3,opt4,opt5,opt6,opt7,no_of_option,ans,explaination) values('$dept','$type','$subtype','$q','$options[0]','$options[1]','$options[2]','$options[3]','$options[4]','$options[5]','$options[6]','$num','$ans','$exp')";
  $run=mysqli_query($connection,$sql);
  
    

  }
  if($arr[1]=='question'&&$arr[0]=='num_of_option'&&explode(".",$storagename)[1]=='csv'&&$bool)
  {
    $start=true;
    $bool=false;
    

  }
  
 
}


fclose($file);
$file_pointer = "../indiabix/Scrape_IndiaBix_QA-master/DB_Collections/temp_jsonfiles/".$_FILES['file']['name'];
unlink($file_pointer); 

              

    }
    else{
        $_SESSION['success'] = "PLEASE SELECT THE FILE.NO FILE CHOOSEN";
    }
    if($start)
    {
            $_SESSION['success'] = "Questions  Added Successfully";
            if($type!='aptitude' && $_POST['sub']=='-1'){
                    $q="insert into subject (dept_id,department) values('$dept','$subtype')";
                    $t=mysqli_query($connection,$q);
                    $_SESSION['success'] = "Questions  inside if  Added Successfully";
                }
    }
    else
    {
                    $_SESSION['success'] = "SORRY CSV FILE SHOULD BE PROPER Format OR INVALID file type(csv only)";

    }


    
header('Location: addpractice_apti.php');

}

if(isset($_POST['create_test'])){
	$tid=$_POST['testid'];
	$depart=$_POST['department'];
	$testname=$_POST['test_name'];
	
	$pass=$_POST['pass'];
	$noqes=(int)$_POST['noques'];
	$time=(int)$_POST['timelimit'];
    $maxattempts = (int)$_POST['maxattempts'];
    $minmarks = (int)$_POST['minmarks'];
	echo $tid.' '.$depart.' '.$pass.' '.$noqes.' '.$time;
	$num=0;
	$q="insert into tests_data(test_id,department,pass,no_of_ques,time_limit,test_created,test_name,max_attempt,min_marks) values('$tid','$depart','$pass','$noqes','$time','$num','$testname','$maxattempts','$minmarks')";
	$run=mysqli_query($connection,$q);
	$_SESSION['success'] = "TEST ADDED .NOW ADD QUESTIONS";
if($depart=='10'){	
header('LOCATION:addtest_apti.php');
}
else{
header('LOCATION:addtest.php');	
}	
	
}
if(isset($_POST["add_many_users"]))
{
	echo $_FILES['file']['name'];
  if((!empty($_FILES['file'])))
  {
	  echo "sasasdsd";
    $filename = explode(".",$_FILES['file']['name']);
    if($filename[1] == 'csv')
    {
    	$record=0;
      $handle = fopen($_FILES['file']['tmp_name'], "r");
      while($data = fgetcsv($handle,1000,","))
      {
        $item1 = mysqli_real_escape_string($connection, $data[0]);
        $item2 = mysqli_real_escape_string($connection, $data[1]);
        $item3 = mysqli_real_escape_string($connection, $data[2]);
        $sql = "INSERT into google_user (First_name,Last_name,email_id) VALUES('$item1', '$item2', '$item3')";
        $srun=mysqli_query($connection, $sql);
        //if ($conn->query($sql) === FALSE) {
		if($srun)
		{
			echo $item1.' '.$item2.' '.$item3;
		}			
        //echo "Added  ";
      }
$_SESSION['success'] = "ADDED Successfully";
      }else{
		  $_SESSION['success'] = "CSV FILE FORMAT REQUIRED";

	  }
 	
      fclose($handle);
	  header("LOCATION: index.php");
    }
  }

if(isset($_POST['submit_file_prac']))
{
	if(!empty($_FILES['file_prac']))
	{
		
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
		    $dept=$_POST['department'];
		    $newsub_id=$_POST['sub'];
		    
		    if($newsub_id=="-1")
		    {
		        $newsub=$_POST['new_sub'];
		        mkdir("../indiabix/Scrape_IndiaBix_QA-master/DB_Collections/".$newsub, 0755);
		        $sql_q="insert into subject (dept_id,department) values('$dept','$newsub')";
		        $slq_qq=mysqli_query($connection,$sql_q);
		        
		        
		    }
		    else
		    {
		        $s="select department from subject where sub_id=".$newsub_id;
		        $s_run=mysqli_query($connection,$s);
		        $row=mysqli_fetch_array($s_run);
		       
		        $newsub=$row['department'];
		    }
		    
//		    $q='select * from department where dept_id='.$dept;
//		    $q_run1=mysqli_query($connection,$q);
//		    $row=mysqli_fetch_array($q_run1);
		    $name= $_FILES['file_prac']['name'];
		    $dep=str_replace(".csv","",$name);
		    //echo($dep);
		    $query="insert into sub_courses (name1,name2) values ('$newsub','$dep')";
		    $qrun=mysqli_query($connection,$query);
            $storagename = $_FILES["file_prac"]["name"];
            move_uploaded_file($_FILES["file_prac"]["tmp_name"], "upload/" . $storagename);
            $file = fopen("upload/".$_FILES['file_prac']['name'],"r");
            $count=0;
            $start=false;
while(! feof($file))
  {
  	
  $arr=(fgetcsv($file));
  //print_r ($arr);
  if($start&&(!is_null($arr[0])||!is_null($arr[1])||!is_null($arr[3]))){
  $q=$arr[0];
  $a=$arr[1];
  $b=$arr[2];
  $c=$arr[3];
  $d=$arr[4];
  $ans=$arr[5];
  $exp=$arr[6];
  $posts[] = array('question'=> $q, 'opta'=> $a,'optb'=>$b,'optc'=>$c,'optd'=>$d,'ans'=>$ans,'explanation'=>$exp);
  	

  }
  if($arr[0]=='question'&&$arr[1]=='opta'&&$arr[2]=='optb'&&$arr[3]=='optc'&&$arr[4]=='optd'&&$arr[5]=='ans'&&$arr[6]=='exp')
  {
  	$start=true;
  	

  }
  
 
}
$res=array();
$res_im=array();
$res_im=$posts;

$res['test_questions'][0]=$res_im;

fclose($file);
$file_pointer = "../indiabix/Scrape_IndiaBix_QA-master/DB_Collections/temp_jsonfiles/".$_FILES['file_prac']['name'];
unlink($file_pointer); 
$fp = fopen('../../indiabix/Scrape_IndiaBix_QA-master/DB_Collections/'.$newsub.'/'.$dep.'.json', 'w');
fwrite($fp, json_encode($res));
fclose($fp);
              

	}
	else{
		$_SESSION['success'] = "PLEASE SELECT THE FILE.NO FILE CHOOSEN";
	}
	if($start)
	{
		  	$_SESSION['success'] = "Students Added Successfully";
	}
	else
	{
				  	$_SESSION['success'] = "SORRY CSV FILE SHOULD BE PROPER(name,dob,grade,gender)";

	}


	
header('Location: addpractice.php');

}

if(isset($_POST['submit_file_for_test']))
{
	if(!empty($_FILES['file']))
	{
		
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
		    
		    $id=$_POST['test_id'];
			$type=$_POST['type'];
			$e="select * from tests_data where test_id='$id'";
			$erun=mysqli_query($connection,$e);
			$rowt=mysqli_fetch_array($erun);
            //$dept_id=$rowt['department'];
			$test_id=$rowt['test_id'];
//		    $q='select * from department where dept_id='.$dept;
//		    $q_run1=mysqli_query($connection,$q);
//		    $row=mysqli_fetch_array($q_run1);


            $storagename = $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            $file = fopen("upload/".$_FILES['file']['name'],"r");
            $count=0;
            $start=false;
			$bool=true;
while(! feof($file))
  {
  	
  $arr=(fgetcsv($file));
  //print_r ($arr);
    if($arr[0]==''||$arr[1]==''||arr[2]==''){
break;
  }
  if($start&&(!is_null($arr[0])||!is_null($arr[1])||!is_null($arr[3]))){
  $num=(int)$arr[0];
  $q=$arr[1];
  $ans=$arr[2];
  $exp=$arr[3];
  $options=array();
  for ($o=3;$o<=$num+3;$o++){
	  
  array_push($options,$arr[1+$o]);
  }
  for($k=$o+2;$k<11;$k++)
  {
	array_push($options,null);
  }	
  
  echo $num;
  #print_r($options);
 
  $sql="insert into test_questions (test_id,type,question,opt1,opt2,opt3,opt4,opt5,opt6,opt7,num_of_option,ans,explaination) values('$id','$type','$q','$options[0]','$options[1]','$options[2]','$options[3]','$options[4]','$options[5]','$options[6]','$num','$ans','$exp')";
  $run=mysqli_query($connection,$sql);
  
  	

  }
  if($arr[1]=='question'&&$arr[0]=='num_of_option'&&explode(".",$storagename)[1]=='csv'&&$bool)
  {
  	$start=true;
	$bool=false;
  	

  }
  
 
}


fclose($file);


              

	}
	else{
		$_SESSION['success'] = "PLEASE SELECT THE FILE.NO FILE CHOOSEN";
	}
	if($start)
	{
		  	$_SESSION['success'] = "Questions  Added Successfully to the test";
		            $id=trim($id);
					$q="update tests_data set test_created=1 where test_id='$id'";
					$t=mysqli_query($connection,$q);
					
				
	}
	else
	{
				  	$_SESSION['success'] = "SORRY CSV FILE SHOULD BE PROPER Format OR INVALID file type(csv only)";

	}


	
header('Location: addtest_apti.php');

}




#update ,user,company

if (isset($_POST['updateregister'])) {
    
	$name =$_POST['upname'];
	$username =$_POST['upusername'];
	$email =$_POST['upmailid'];
	$contact =$_POST['upcontact'];
	//$password =$_POST['uppassadmin'];
	$type = $_POST['type'];
    echo $name;
    echo $type;
	$query = "UPDATE `register` SET `name`='$name',`contact` ='$contact',`email` ='$email',`usertype` = $type WHERE `username` = '$username' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Update User";
		header('Location: index.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: error.php'); 
	}
}

#update ,user,company End



#delete ,user,company
if (isset($_POST['updatetest'])) {
    
    $test_name =$_POST['test_name'];
	$test_id =$_POST['test_id'];
	$pass =$_POST['pass'];
	$department =$_POST['department'];
	$no_of_ques =$_POST['no_of_ques'];
	$time_limit =$_POST['time_limit'];
	$min_marks = $_POST['min_marks'];
	$test_created = $_POST['test_created'];
	$max_attempt = $_POST['max_attempt'];

	$query = "UPDATE tests_data set department='".$_POST["department"]."',pass='".$_POST["pass"]."',  no_of_ques='" .$_POST["no_of_ques"]."', time_limit='".$_POST["time_limit"]."', min_marks='".$_POST["min_marks"]."', test_created='".$_POST["test_created"]."', test_name='".$_POST["test_name"]."', max_attempt='".$_POST["max_attempt"]."' WHERE test_id='".$_POST["test_id"]."'";
	$query_run = mysqli_query($connection,$query);
	//mysqli_query($connection, "UPDATE tests_data set department='".$_POST["department"]."',pass='".$_POST["pass"]."',  no_of_ques='" .$_POST["no_of_ques"]."', time_limit='".$_POST["time_limit"]."', min_marks='".$_POST["min_marks"]."', test_created='".$_POST["test_created"]."', test_name='".$_POST["test_name"]."' WHERE test_id='".$_POST["test_id"]."'");

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Updated Test";
		header('Location: view_test_data.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select Test for Update";  
		echo 'Error';
		header('Location: error.php'); 
	}
}

if (isset($_POST['updategd'])) {

	$id = $_POST['id'];
	//$type = $_POST['type'];
	$question  = $_POST['question'];
     //echo $type;

	$query = "UPDATE gd_hr SET question = '$question' WHERE id ='$id'";
	//"UPDATE gd_hr SET question = '".$_POST["question"]."' WHERE id = '".$_POST["id"]."' AND type = '".$_POST["id"]."' ";
	//echo $_POST['question'];
	//echo $_POST['id'];
	//echo $_POST['type'];
		//$query = "UPDATE tests_data set department='".$_POST["department"]."',pass='".$_POST["pass"]."',  no_of_ques='" .$_POST["no_of_ques"]."', time_limit='".$_POST["time_limit"]."', min_marks='".$_POST["min_marks"]."', test_created='".$_POST["test_created"]."', test_name='".$_POST["test_name"]."' WHERE test_id='".$_POST["test_id"]."'";
	$query_run = mysqli_query($connection, $query);


	if ($query_run) {
		$_SESSION['success'] = " UPDATE Successfully";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: gd.php'); 
	}
}
if (isset($_POST['deletebtntest'])) {


	$test_name = $_POST['deluname'];


	$query = "DELETE FROM tests_data WHERE test_name='$test_name' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: view_test_data.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: view_test_data.php'); 
	}
}

if (isset($_POST['deletebtn'])) {


	$username = $_POST['deluname'];


	$query = "DELETE FROM `register` WHERE `username`='$username' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: index.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: index.php'); 
	}
}

#delete ,user,company End

#Create GD QUESTIONs

if (isset($_POST['gd_btn'])) {


	$gd_title = $_POST['gd_title'];
	


	$query = "INSERT INTO `gd_hr`(`type`, `question`) VALUES ('gd','$gd_title')";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Added GD !!";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Added";  
		header('Location: gd.php'); 
	}
}

#Create GD QUESTIONs End



#Update GD



/*if (isset($_POST['updategd'])) {

	$id = $_POST['upid'];
	$gd_title = $_POST['updatetitle'];
	$gd_link  = $_POST['uplink'];
	$gd_point = $_POST['uppoints'];


	$query = "UPDATE `gd` SET `title` = '$gd_title', `link` = '$gd_link', `points` = '$gd_point' WHERE `id` = '$id' ";
	$query_run = mysqli_query($connection, $query);


	if ($query_run) {
		$_SESSION['success'] =   "";
		header('Location: update_gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: update_gd.php'); 
	}
}*/
#Update GD End

#delete GD

if (isset($_POST['gd_remove'])) {


	$deltitle = $_POST['deltitle'];


	$query = "DELETE FROM `gd_hr` WHERE `id`='$deltitle' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: gd.php'); 
	}
}

#delete GD End


#Create HR Interview

if (isset($_POST['hr_btn'])) {

	
	$hr_question = $_POST['hr_question'];
//$hr_answer = $_POST['hr_answer'];

	$query = "INSERT INTO `gd_hr`(`question`, `type`) VALUES ('$hr_question','hr')";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Added HR !!";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Added";  
		header('Location: gd.php'); 
	}
}

#Create HR Interview End


#Update Interview



if (isset($_POST['updatehr'])) {

	$id = $_POST['up_id'];
	$hr_question = $_POST['hr_question'];
	$hr_answer = $_POST['hr_answer'];

	$query = "UPDATE `hr` SET `hr_question` = '$hr_question' , `hr_ans` = '$hr_answer' WHERE `id` = '$id' ";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "";
		header('Location: update_hr.php'); 
	}
	else
	{
		$_SESSION['status'] = "Please Select User for Update";  
		header('Location: update_hr.php'); 
	}
}
#Update Interview End

#delete Interview

if (isset($_POST['hr_remove'])) {


	$delq = $_POST['del_question'];


	$query = "DELETE FROM `hr` WHERE `hr_question`='$delq' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: gd.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: gd.php'); 
	}
}

#delete Interview End



#Add Question

if (isset($_POST['add_question'])) {

	$q_dept = $_POST['dept'];
	$q_subject = $_POST['subject'];
	$q_question = $_POST['question'];
	$q_opt1 = $_POST['opt1'];
	$q_opt2 = $_POST['opt2'];
	$q_opt3 = $_POST['opt3'];
	$q_opt4 = $_POST['opt4'];
	$q_ans = $_POST['ans'];
	$q_sol = $_POST['solution'];
	$q_type = $_POST['q_type'];
	

	$query = "INSERT INTO `questions` (`department` , `subject`, `question`, `op1`, `op2`, `op3`, `op4`, `ans`, `solution`, `type`) VALUES ('$q_dept','$q_subject','$q_question', '$q_opt1','$q_opt2','$q_opt3','$q_opt4','$q_ans','$q_sol', '$q_type')";
	
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Question Added !!";
		header('Location: questions.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Added";  
		header('Location: questions.php'); 
	}
}

#Add Question End


#Update Question



if (isset($_POST['questionup'])) {
	
	$q_subject = $_POST['upsubject'];
	$q_question = $_POST['updatequestion'];
	$q_opt1 = $_POST['upopt1'];
	$q_opt2 = $_POST['upopt2'];
	$q_opt3 = $_POST['upopt3'];
	$q_opt4 = $_POST['upopt4'];
	$q_ans = $_POST['upans'];
	$q_sol = $_POST['upsolution'];
	$q_type = $_POST['upq_type'];
	

	$query = "UPDATE `questions` SET `subject` = '$q_subject', `question` ='$q_question',`op1` = '$q_opt1' , `op2` = '$q_opt2', `op3` = '$q_opt3', `op4` = '$q_opt4', `ans` = '$q_ans', `solution` = '$q_sol', `type` = '$q_type' WHERE `question` = '$q_question'";
	
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Updated Question !!!";
		header('Location: questions.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Added";  
		header('Location: questions.php'); 
	}


}
#Update Questionf

#delete Question

if (isset($_POST['deleteq'])) {


	$del_q = $_POST['delq'];


	$query = "DELETE FROM `questions` WHERE `question`='$del_q' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: questions.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: questions.php'); 
	}
}

#delete 


#Approve Company

if (isset($_POST['approve_status'])) {


	$cname = $_POST['companyname'];


	$query = "UPDATE `company` SET `status` = 1 WHERE `company_name` = '$cname' ";
	
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Approved";
		header('Location: companies.php'); 
	}
	else
	{
		$_SESSION['status'] = "Company Not Found";  
		header('Location: companies.php'); 
	}
}

#end Approve Company

#reject Company

if (isset($_POST['reject_status'])) {


	$cname = $_POST['companyname'];


	$query = "UPDATE `company` SET `status` = 2 WHERE `company_name` = '$cname' ";
	
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Rejected";
		header('Location: companies.php'); 
	}
	else
	{
		$_SESSION['status'] = "Company Not Found";  
		header('Location: companies.php'); 
	}
}

#end reject Company




#Insert Department

if (isset($_POST['adddept'])) {


	$dname = $_POST['deptname'];
	$image = $_FILES["deptfile"]['name'];

		if (file_exists("assets/img/departments/" . $_FILES["deptfile"]["name"])) 
		{
			$store = $_FILES["deptfile"]["name"];
			$_SESSION['status'] = "Image already exists. '.$store.'";
			header('Location: department.php');
		}
		else
		{

			$query = "INSERT INTO `department` (`department`, `bg_link`) VALUES ('$dname', '$image')";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				move_uploaded_file($_FILES["deptfile"]["tmp_name"], "assets/img/departments/".$_FILES["deptfile"]["name"]);
				$_SESSION['success'] =   "Successfully Added Department !!";
				header('Location: department.php'); 
			}
			else
			{
				$_SESSION['status'] = "not Added";  
				header('Location: department.php'); 
			}
		}


	}

#end Insert Department



#Update Department

if (isset($_POST['update_department'])) {


	$up_deptid = $_POST['up_deptid'];
	$up_dept = $_POST['up_dept'];
	$updeptfile = $_FILES["updeptfile"]['name'];

	

			$query = "UPDATE `department` SET `department` = '$up_dept' , `bg_link` = '$updeptfile' where  dept_id = '$up_deptid' ";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				move_uploaded_file($_FILES["updeptfile"]["tmp_name"], "assets/img/departments/".$_FILES["updeptfile"]["name"]);
				$_SESSION['success'] =   "Successfully Updated";
				header('Location: department.php'); 
			}
			else
			{
				$_SESSION['status'] = "not Added";  
				header('Location: department.php'); 
			}
		


	}

#end Update Department

#delete Department
if (isset($_POST['delete_department'])) {


	$de_deptid = $_POST['delete_deptid'];

	

	$query = "DELETE FROM `department` WHERE `dept_id` = '$de_deptid' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: department.php'); 
	}
	else
	{
		$_SESSION['status'] = $query; 
		header('Location: department.php'); 
	}
		


	}
#end Delete Department


#Insert Subject

if (isset($_POST['addsubject'])) {


	$dept_id = $_POST['dept_id'];

	//$deptname = $_POST['deptname'];

    


	$sub = $_POST['subject'];
	//$ref = $_POST['subject_ref'];
	//$subfile = $_FILES["subfile"]['name'];

	/*if (file_exists("assets/img/subject/" . $_FILES["subfile"]["name"])) 
		{
			$store = $_FILES["subfile"]["name"];
			$_SESSION['status'] = "Image already exists. '.$store.'";
			header('Location: subject.php');
		}
	else*/

    $query1="select * from `department` where `dept_id`='$dept_id'";

    if( $result1=mysqli_query($connection,$query1))
    {
        if(mysqli_num_rows($result1)>0)
	{

		$query = "INSERT INTO `subject` (`dept_id` , `department` ) VALUES ('$dept_id', '$sub')";
		$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				//move_uploaded_file($_FILES["subfile"]["tmp_name"], "assets/img/subject/".$_FILES["subfile"]["name"]);
				$_SESSION['success'] =   "Successfully Added Subject";
				header('Location: subject.php'); 
			}
			else
			{
				$_SESSION['status'] =  "Not Added";

				header('Location: subject.php'); 
			}
		
		}

else
    {
        echo "HELLO";
                $_SESSION['status'] =  "Invalid Department id";

                header('Location: subject.php'); 
            }
}
	}

#end Insert Subject


#Update Subject



if (isset($_POST['update_sub'])) {

	$upid = $_POST['up_subid'];
	$up_sub = $_POST['up_sub'];
	//$up_ref = $_POST['up_ref'];
	$updept = $_POST['up_dptid'];

	 $getname = "SELECT * FROM department where dept_id = '$up_dptid' ";
     $getname_run = mysqli_query($connection,$getname);
     $r = mysqli_fetch_assoc($getname_run);
     $d_name = $r['department'];

	$query = "UPDATE `subject` SET `dept_id` = '$up_dptid' , `department` = '$up_sub' WHERE `sub_id` = '$upid' ";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		$_SESSION['success'] =   $query;
		header('Location: subject.php'); 
	}
	else
	{
		$_SESSION['status'] = $query;  
		header('Location: subject.php'); 
	}
}
#Update Subject End


#delete Subject

if (isset($_POST['deletesub'])) {


	$del_sub = $_POST['delsub'];
    $del_subid = $_POST['delsubid'];
    $upid = $_POST['up_subid'];
	$query = "DELETE FROM `subject` WHERE `department`='$del_sub' and `dept_id`='$del_subid'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] =   "Successfully Delete !!";
		header('Location: subject.php'); 
	}
	else
	{
		$_SESSION['status'] = "Not Deleted";  
		header('Location: subject.php'); 
	}
}

#delete Subject End

 ?>