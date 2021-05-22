<?php
//session_start();
//error_reporting(0);
include('includes/header.php');
// include('includes/navbar.php');
include('db.php');
?>


<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="./index.php">
      <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> Placement <br>Asistant
    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none">

      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
              <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome!</h6>
          </div>
          <a href="../" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>My profile</span>
          </a>
          <div class="dropdown-divider"></div>
          <!--<form method="POST" action="../logout.php">
                      <button type="submit" name="logoutbtn" class="dropdown-item"> <i class="ni ni-user-run"></i> <span>Logout</span></button>
                    </form>-->

          <!-- Button trigger modal -->
          <button type="button" class="dropdown-item" data-toggle="modal" data-target="#logoutmodal">
            <i class="ni ni-user-run"></i> <span>Logout</span>
          </button>

        </div>
      </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
    

      <div id="myDIV">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="./index.html">
              <img src="./assets/img/brand/blue.png">
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>

      <ul id="menu" class="navbar-nav ">
      <li class="nav-item "  active>
      <form id="allf" method="post" action="">
      <input id="all" hidden name="all" type="text" class="hp"/>
          <a class="anc nav-link active" onclick="document.forms['allf'].submit();">
           <i class="ni ni-collection text-primary"></i> All
          </a>
          </form>
        </li>
        
        <li class="nav-item " >
        <form id="available" method="post" action="">
        <input id="avail" hidden name="avail" type="text" class="hpp"/>

          <a class="anc nav-link " onclick="document.forms['available'].submit();"> 
          <i class="ni ni-collection text-primary" ></i> Available
          </a>
        </form>
        </li>
        
        <li class="nav-item"  class=" active">
        <form id="app" method="post" action="">
        <input id="applied" hidden name="applied" type="text" class="hpp"/>
          <a class=" nav-link " onclick="document.forms['app'].submit();">
            <i class="ni ni-check-bold text-yellow"></i>Applied
          </a>
        </form>
        </li>
        
        
        <li class="nav-item " active>
        <form id="exp" method="post" action="">
        <input id="expired" hidden name="expired" type="text" class="hpp"/>
          <a class="anc nav-link " onclick="document.forms['exp'].submit();">
            <i class="ni ni-watch-time text-black"></i>Expired
          </a>
          </form>
        </li>
        
      </ul>
    </div>
    

    </div>
  </div>
</nav>
<div class="main-content">
  <!-- Navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">


      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Profile</a>
      <?php include('includes/navbarend.php'); ?>
      <!-- Header -->
      <!DOCTYPE html>
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <style>
          .column {

            width: 100%;
            padding: 10px;
          }

          .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.9);
          }

          .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            padding: 16px;
            text-align: left;
            background-color: #f1f1f1;
          }

          #email {
            text-align: center;
            ;
            font-style: italic;
            font-size: 12px;
          }

          .container {
            padding-top: 50px;
            padding-bottom: 50px;
            padding-left: 50px;
            padding-right: 50px;
          }

          #title {
            text-align: center;
            margin-bottom: auto;
            font-weight: bold;
            padding-top: 0.5em;
            padding-bottom: 0.01em;
          }

          #deadline {
            color: red;
          }

          .styleHF {
            background-color: #cee3ff;
            padding-right: 5px;
          }

          #address {
            padding: 0.01em 4px;

            text-align: right;
            font-style: italic;
            font-size: 12px;
          }

          .inline {
            display: inline;
          }
          

          .btnnn {
            left: 50%;
            transform: translate(-50%, 0px);
            margin: 10px;
          }
          .btnnn:hover{
            color: #000;
            transform: translate(-50%, 0px);
        
          }
        </style>
        <!-- Page content -->
        <div class="container-fluid mt--7">
          <div class="row">
            <div class="col-xl-12 order-xl-1">
              <div class="card bg-secondary shadow">
                <div class="container">
                  <!-- Navigation -->
                  <div align="right"><button class='btn btn-outline-primary btn-lg submit' onclick="gotohome()">Home</button></div>
                  <div class="py-5 text-center">
                    <legend>Company Application Lobby</legend>
                  </div>

                  <?php
                  $turn=1;
                  $turn2=1;
                  $user = 'root';
                  $password = '';
                  $db = 'placement_assistant';
                  $host = 'localhost';
                  function addPrefixToArray(array $array, string $prefix)
                  {
                    return array_map(function ($arrayValues) use ($prefix) {
                      return $prefix . $arrayValues;
                    }, $array);
                  }
                  
                  
                  $conn = mysqli_connect($host, $user, $password, $db);

                  $placedcomp = "SELECT categ FROM google_user WHERE `email_id`='".$_SESSION['username']."' ";
                  $resultplaced = $conn->query($placedcomp);
                  
                  $arr2=array();
                  while($placedrow=mysqli_fetch_array($resultplaced)){
                  array_push($arr2,$placedrow['categ']);

                  }


                  /// NOT PLACED
                  if(!isset($arr2[0]) || $arr2[0]==null || $arr2[0]=="not" || $arr2[0]=="NULL" || $arr2[0]=="null")
                  {
                  $sql = "SELECT Company_name,Ref_no,Address,email_id,Announcement_date,Reg_deadline,primary_link,secondary_link ,categ FROM company_module";
                  $result = $conn->query($sql);
                  $conn->close();


                  if ($result->num_rows > 0) {
                    // output data of each row

                    //while starts
                    while ($row = $result->fetch_assoc()) 
                    {
                      $companay_name = $row['Company_name'];
                      $refno = $row['Ref_no'];
                      $emailcom = $row['email_id'];
                      $address = $row['Address'];
                      $Ann_date = $row['Announcement_date'];
                      $regded= $row['Reg_deadline'];
                      $categ= $row['categ'];
                      $reg_deadline = str_replace(" ", "&nbsp;", $row['Reg_deadline']);
                      $address = str_replace(" ", "&nbsp;", $row['Address']);
                      $address = str_replace('\n', "<br>", $address);

                      $plink = "/Placement-Assistant-master/dashboard/2020/downloadme.txt";
                      $slink = $row['secondary_link'];
                      $slink = "C:/xampp/htdocs" . "/Placement-Assistant-master/dashboard/2020/$companay_name";

                      //echo $slink;
                      date_default_timezone_set('Asia/Kolkata');
                      $dateTime = new DateTime();
                      $d = $dateTime->format('Y-m-d H:i:s');  
                      $email =$_SESSION['username'];
                      $reglast = new DateTime($regded);
                      

                      $conn = mysqli_connect($host, $user, $password, $db);
                      $sql2 = "SELECT `Ref_no` FROM `company_applied` WHERE `email_id`='$email' AND `Ref_no`='$refno'";
                      $result2 = $conn->query($sql2);
                      $conn->close();
                      //echo $result2;
                                          

                      if (is_dir($slink)) 
                      {
                        global $files;
                        $files = preg_grep('/^([^.])/', scandir($slink, 0));
                        $files = addPrefixToArray($files, '/Placement-Assistant-master/dashboard/2020/$companay_name/');
                        $a = htmlspecialchars(json_encode($files));
                      } 

                      else 
                      {
                        //echo "No secondary resources(directory not found)";
                        $a = htmlspecialchars(json_encode($files));
                      }

                      
                      //applied starts
                      if(isset($_POST['applied']))
                      {
                        //INSERT INTO `company_applied`(`email_id`, `Ref_no`, `regtime`) VALUES ("abc@gmail.com","mdsjf390523", "2020-12-11 12:44:33")
                        if($dateTime<$reglast && $result2->num_rows != 0){
                          echo "<div class='column'>
                        <div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink','$a')\" class=\"card\">
                          <h2 style='display: inline-block;'>$companay_name</h2>
                          <p style='display: inline-block;'>$emailcom</p>
                          <div class='form-container sign-up-container' align='right' >
                             <form  method='POST' action='companyverify.php' >
                             <input type='hidden' name='companyrefno' value='".$refno."' />
                             <input type='hidden' name='reg_deadline' value='".$regded."' />
                             " ; 
                        
                             //if ($result2->num_rows == 0)
                             {
                              if($dateTime<$reglast)
                             {
                              echo "<p style='color:green'>Applied</p>";
                             }
                             echo "
                        </div>      
                        </div>
                        </div>";
                            }
                          }
                      }
                      //applied ends

                      //available starts
                      else if(isset($_POST['avail']))
                      {
                        {

                        if($dateTime<$reglast && $result2->num_rows == 0){
                          echo "<div class='column'>
                        <div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink','$a')\" class=\"card\">
                          <h2 style='display: inline-block;'>$companay_name</h2>
                          <p style='display: inline-block;'>$emailcom</p>
                          <div class='form-container sign-up-container' align='right' >
                             <form  method='POST' action='companyverify.php' >
                             <input type='hidden' name='companyrefno' value='".$refno."' />
                             <input type='hidden' name='reg_deadline' value='".$regded."' />
                             " ; 
                        
                             if ($result2->num_rows == 0)
                             {
                              if($dateTime<$reglast)
                             {
                              echo"
                            <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                            </form>
                            ";
                             }
                             }
                             else
                             {
                              echo "<p style='color:green'>Applied</p>";
                             }
                             echo "
                        </div>      
                        </div>
                        </div>";
                            }
                          }
                      }
                      //available ends

                      //expired starts
                      elseif(isset($_POST['expired']))
                      {
                        if($dateTime>$reglast){
                          echo "<div class='column'>
                        <div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink','$a')\" class=\"card\">
                          <h2 style='display: inline-block;'>$companay_name</h2>
                          <p style='display: inline-block;'>$emailcom</p>
                          <div class='form-container sign-up-container' align='right' >
  
                             <form  method='POST' action='companyverify.php' >
                             <input type='hidden' name='companyrefno' value='".$refno."' />
                             <input type='hidden' name='reg_deadline' value='".$regded."' />
                             " ; 
                        
                             if ($result2->num_rows == 0)
                             {
                             if($dateTime<$reglast)
                             echo"
                              <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                              </form>
                              ";
                              else
                                echo "<p style='color:red'>Registeration Time Over</p>";
                             }
                             else
                             {
                              echo "<p style='color:green'>Applied</p>";
                             }
                             echo "
                        </div>      
                        </div>
                        </div>";
                            }
                      }
                      //expired ends

                      //all starts
                      else{

                        {
                        echo "<div class='column'>
                      <div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink','$a')\" class=\"card\">
                        <h2 style='display: inline-block;'>$companay_name</h2>
                        <p style='display: inline-block;'>$emailcom</p>
                        <div class='form-container sign-up-container' align='right' >

                           <form  method='POST' action='companyverify.php' >
                           <input type='hidden' name='companyrefno' value='".$refno."' />
                           <input type='hidden' name='reg_deadline' value='".$regded."' />";
                           if ($result2->num_rows == 0)
                           {
                              if($dateTime<$reglast)
                           {
                            
                            echo"
                            <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                            </form>
                            ";
                           
                          }
                            else
                              echo "<p style='color:red'>Registeration Time Over</p>";
                           }
                           else
                           {
                            echo "<p style='color:green'>Applied</p>";
                           }
                      echo "
                      </div>      
                      </div>
                      </div>";
                    }
                   }
                      //all ends                      

                    }
                  }
                  //NOT PLACED IF ENDS  
                  }

                  //PLACED
                  else
                  {
                    $email = $_SESSION['username'];
                    $conn = mysqli_connect($host, $user, $password, $db);
                     $sqlappl = "SELECT `categ`,`Ref_no` FROM `company_module` WHERE `Ref_no`IN (SELECT `Ref_no` from `company_applied` WHERE `email_id`='$email')";
                      $resultcateg = $conn->query($sqlappl);

                                            
                      $arr_categ=array();
                      $arr_refno=array();
                      $size=0;
                      $i=0;
                      while($applrow=mysqli_fetch_array($resultcateg))
                      {
                        array_push($arr_categ,$applrow['categ']);
                        array_push($arr_refno,$applrow['Ref_no']);
                        //echo $applrow['categ'];
                        //echo $applrow['Ref_no'];
                        $size = $size+1;
                      }
                      
                      for($i=0;$i<$size;$i=$i+1)
                      {


                        if($arr2[0]=="superdream")
                        {
                          if($arr_categ[$i]=="dream" || $arr_categ[$i]=="nondream" || $arr_categ[$i]=="superdream")
                            {
                             $sqldel = "DELETE FROM `company_applied` WHERE `email_id`='$email' and `Ref_no` = '$arr_refno[$i]'";
                              $resultdel = $conn->query($sqldel);
                              //echo "DEL ALL placed in superdream",$arr_refno[$i];
                            }
                        }
                        else if($arr2[0]=="dream")
                        {
                          if($arr_categ[$i]=="dream" || $arr_categ[$i]=="nondream")
                          {
                              $sqldel = "DELETE FROM `company_applied` WHERE `email_id`='$email' and `Ref_no` = '$arr_refno[$i]'";
                              $resultdel = $conn->query($sqldel);
                              //echo "DEL dr and nondr placed in superdream",$arr_refno[$i];
                          }
                          
                        }
                        else if($arr2[0]=="nondream")
                        {
                          
                          if($arr_categ[$i]=="nondream")
                          {
                            $sqldel = "DELETE FROM `company_applied` WHERE `email_id`='$email' and `Ref_no` = '$arr_refno[$i]'";
                              $resultdel = $conn->query($sqldel);
                              //echo "DEL non dr.. placed in non dr",$arr_refno[$i];
                          }
                          
                        }

                      }
                      

                    //SELECT `categ` FROM `company_module` WHERE `Ref_no`IN (SELECT `Ref_no` from `company_applied` WHERE `email_id`='$email');

                    


                  $submission = "SELECT submission1,submission2,submission3,submission4,submissionAcademics,submissionLink FROM google_user WHERE `email_id`='".$_SESSION['username']."' ";
                  $resultsubmission = $conn->query($submission);
                  $arrsubmission=array();
                  while($submission=mysqli_fetch_array($resultsubmission))
                  {
                  array_push($arrsubmission,$submission['submission1']);
                  array_push($arrsubmission,$submission['submission2']);
                  array_push($arrsubmission,$submission['submission3']);
                  array_push($arrsubmission,$submission['submission4']);
                  array_push($arrsubmission,$submission['submissionAcademics']);
                  array_push($arrsubmission,$submission['submissionLink']);
                  }

                  /*echo $arrsubmission[0];
                  echo $arrsubmission[1];
                  echo $arrsubmission[2];
                  echo $arrsubmission[3];*/

                  $sql = "SELECT Company_name,Ref_no,Address,email_id,Announcement_date,Reg_deadline,primary_link,secondary_link ,categ FROM company_module";
                  $result = $conn->query($sql);
                  $conn->close();



                  ////if starts
                  if ($result->num_rows > 0) {
                    // output data of each row

                    //while starts
                    while ($row = $result->fetch_assoc()) 
                    {
                      $companay_name = $row['Company_name'];
                      //$_SESSION['cname'] = $companay_name;
                      $refno = $row['Ref_no'];
                      $emailcom = $row['email_id'];
                      $address = $row['Address'];
                      $Ann_date = $row['Announcement_date'];
                      $regded= $row['Reg_deadline'];
                      $categ= $row['categ'];
                      $reg_deadline = str_replace(" ", "&nbsp;", $row['Reg_deadline']);
                      $address = str_replace(" ", "&nbsp;", $row['Address']);
                      $address = str_replace('\n', "<br>", $address);
                      //$plink = $row['prinmary_link'];
                      $plink = "/Placement-Assistant-master/dashboard/2020/downloadme.txt";
                      $slink = $row['secondary_link'];
                      $slink = "C:/xampp/htdocs" . "/Placement-Assistant-master/dashboard/2020/$companay_name";


                      date_default_timezone_set('Asia/Kolkata');
                      $dateTime = new DateTime();
                      $d = $dateTime->format('Y-m-d H:i:s');  
                      $email =$_SESSION['username'];
                      $reglast = new DateTime($regded);
                      

                      $conn = mysqli_connect($host, $user, $password, $db);
                      $sql2 = "SELECT `Ref_no` FROM `company_applied` WHERE `email_id`='$email' AND `Ref_no`='$refno'";
                      $result2 = $conn->query($sql2);
                      $conn->close();
                      //echo $result2;
                                          

                      if (is_dir($slink)) 
                      {
                        global $files;
                        $files = preg_grep('/^([^.])/', scandir($slink, 0));
                        $files = addPrefixToArray($files, "/Placement-Assistant-master/dashboard/2020/$companay_name/");
                        $a = htmlspecialchars(json_encode($files));
                      } 

                      else 
                      {
                        echo "No secondary resources uploaded for this Company. ";
                        //$a = htmlspecialchars(json_encode($files));
                      }
                      //print_r($files);
                      
                      //available starts
                      if(isset($_POST['avail']))
                      {

                        if($arrsubmission[0]==1 && $arrsubmission[1]==1 && $arrsubmission[2]==1 && $arrsubmission[3]==1 && $arrsubmission[4]==1 && $arrsubmission[5]==1)
                        {
                        if(($arr2[0]=="nondream" &&($categ=="dream" || $categ=="superdream")) || ($arr2[0]=="dream" &&($categ=="superdream")))
                        if($dateTime<$reglast && $result2->num_rows == 0){
                          echo "<div class='column'>
                        <div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink','$a')\" class=\"card\">
                          <h2 style='display: inline-block;'>$companay_name</h2>
                          <p style='display: inline-block;'>$emailcom</p>
                          <div class='form-container sign-up-container' align='right' >
                             <form  method='POST' action='companyverify.php' >
                             <input type='hidden' name='companyrefno' value='".$refno."' />
                             <input type='hidden' name='reg_deadline' value='".$regded."' />
                             " ; 
                        
                             if ($result2->num_rows == 0)
                             {
                              if($dateTime<$reglast)
                             {
                              if($arr2[0]=="nondream")
                            {
                              if($categ=="nondream")
                              echo "<p style='color:black'>Already Selected in Non Dream Company</p><p style='color:black'>Can Apply only in Dream and Super Dream Companies</p>";
                              else if($categ=="dream" || $categ="superdream")
                                echo"
                            <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                            </form>
                            ";
                            }


                            if($arr2[0]=="dream")
                            {
                              if($categ=="dream" || $categ=="nondream")
                              {echo "<p style='color:black'>Already Selected in Dream Company</p><p style='color:black'>Can Apply only in Super Dream companies</p>";}
                              else if($categ="superdream")
                                echo"
                            <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                            </form>
                            ";
                            }


                            if($arr2[0]=="superdream")
                            {
                              echo "<p style='color:black'>Congratulations you're placed in Super Dream Company</p>";
                            }
                             }
                             }
                             else
                             {
                              echo "<p style='color:green'>Applied</p>";
                             }
                             echo "
                        </div>      
                        </div>
                        </div>";
                            }
                          }

                          else{
                            if($turn==1)
                            {echo "<div align='center'><h3 style='color:red'><b>Fill the forms before applying for companies</b></h3></div>";
                              echo "<div align='center'><button class='btn btn-outline-primary btn-lg submit' onclick='gotoform()'>Goto Dashboard</button></div>";
                            $turn= 2;}
                          }
                      }
                      //available ends

                      //applied starts
                      elseif(isset($_POST['applied']))
                      {
                        if($result2->num_rows != 0){
                          echo "<div class='column'>
                        <div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink','$a')\" class=\"card\">
                          <h2 style='display: inline-block;'>$companay_name</h2>
                          <p style='display: inline-block;'>$emailcom</p>
                          <div class='form-container sign-up-container' align='right' >
  
                             <form  method='POST' action='companyverify.php' >
                             <input type='hidden' name='companyrefno' value='".$refno."' />
                             <input type='hidden' name='reg_deadline' value='".$regded."' />
                             " ; 
                        
                             if ($result2->num_rows == 0)
                             {
                             if($dateTime<$reglast)
                             echo"
                              <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                              </form>
                              ";
                              else
                                echo "<p style='color:red'>Registeration Time Over</p>";
                             }
                             else
                             {
                              echo "<p style='color:green'>Applied</p>";
                             }
                             echo "
                        </div>      
                        </div>
                        </div>";
                            }
                      }
                      //applied ends

                      //expired starts
                      elseif(isset($_POST['expired']))
                      {
                        if($dateTime>$reglast){
                          echo "<div class='column'>
                        <div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink','$a')\" class=\"card\">
                          <h2 style='display: inline-block;'>$companay_name</h2>
                          <p style='display: inline-block;'>$emailcom</p>
                          <div class='form-container sign-up-container' align='right' >
  
                             <form  method='POST' action='companyverify.php' >
                             <input type='hidden' name='companyrefno' value='".$refno."' />
                             <input type='hidden' name='reg_deadline' value='".$regded."' />
                             " ; 
                        
                             if ($result2->num_rows == 0)
                             {
                             if($dateTime<$reglast)
                             echo"
                              <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                              </form>
                              ";
                              else
                                echo "<p style='color:red'>Registeration Time Over</p>";
                             }
                             else
                             {
                              echo "<p style='color:green'>Applied</p>";
                             }
                             echo "
                        </div>      
                        </div>
                        </div>";
                            }
                      }
                      //expired ends

                      //all starts
                      else{
                        if($arrsubmission[0]==1 && $arrsubmission[1]==1 && $arrsubmission[2]==1 && $arrsubmission[3]==1 && $arrsubmission[4]==1 && $arrsubmission[5]==1)
                        {
                        echo "<div class='column'>";
                      if (is_dir($slink)) 
                        	{
                      echo "<div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink','$a')\" class=\"card\">";
                      }
                      else
                      	{
                      		echo "<div onclick=\"myFunction('$companay_name','$emailcom','$address','$Ann_date','$reg_deadline','$plink')\" class=\"card\">";
                      }
                        echo "<h2 style='display: inline-block;'>$companay_name</h2>
                        <p style='display: inline-block;'>$emailcom</p>
                        <div class='form-container sign-up-container' align='right' >

                           <form  method='POST' action='companyverify.php' >
                           <input type='hidden' name='companyrefno' value='".$refno."' />
                           <input type='hidden' name='reg_deadline' value='".$regded."' />";
                           if ($result2->num_rows == 0)
                           {
                              if($dateTime<$reglast)
                           {
                            
                            if($arr2[0]=="nondream")
                            {
                              if($categ=="nondream")
                              echo "<p style='color:black'>Already Selected in Non Dream Company</p><p style='color:black'>Can Apply only in Dream and Super Dream Companies</p>";
                              else if($categ=="dream" || $categ="superdream")
                                echo"
                            <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                            </form>
                            ";
                            }


                            if($arr2[0]=="dream")
                            {
                              if($categ=="dream" || $categ=="nondream")
                              {echo "<p style='color:black'>Already Selected in Dream Company</p><p style='color:black'>Can Apply only in Super Dream companies</p>";}
                              else if($categ="superdream")
                                echo"
                            <button type='submit' name='Apply' id='Apply' class='btn btn-outline-primary btn-lg submit'>Apply Now</button>
                            </form>
                            ";
                            }


                            if($arr2[0]=="superdream")
                            {
                              echo "<p style='color:black'>Congratulations you're placed in Super Dream Company</p>";
                            }
                           
                          }
                            else
                              echo "<p style='color:red'>Registeration Time Over</p>";
                           }
                           else
                           {
                            echo "<p style='color:green'>Applied</p>";
                           }
                      echo "
                      </div>      
                      </div>
                      </div>";
                    }
                    else{
                            if($turn2==1)
                            {echo "<div align='center'><h3 style='color:red'><b>Fill the forms before applying for companies</b></h3></div>";
                              echo "<div align='center'><button class='btn btn-outline-primary btn-lg submit' onclick='gotoform()'>Goto Dashboard</button></div>";
                            $turn2= 2;}
                          }
                      }
                      //all ends                      
                      
                           
                      
                      
                    }
                  }
                }
                  ?>
                </div>
              </div>


              <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-animate-top w3-card-4">
                  <header class=" styleHF">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <div>
                      <h2 class='inline'>
                        <legend style="display: inline;" id='title'></legend>
                      </h2>
                      <p id='email'></p>
                    </div>
                  </header>
                  <div class="container">
                    <p style="display: inline;">Anonouncement Date : </p>
                    <p style="display: inline;" id='annDate'></p>
                    <br>

                    <p style="display: inline;">Deadline : </p>
                    <p style="display: inline;" id='deadline'></p>
                    <br>
                    <!-- <a href="/Placement-Assistant-master/dashboard/2020/downloadme.txt" download>
                      <p>Download Company Requirements</p>
                    </a> -->
                    <a id="primary_link" href="" class="btn btn-primary btnnn" download>Download</a>
                    <br>
                    <a id="secondary_link" style="margin:auto;display:block" href="" class="btn btn-primary btnnn">Extra Download Resources</a>
                    <a id="download_link" href="" class="btn btn-primary" download>down</a>
                    <!-- <button id="secondary_link" class="btn btn-primary" >Download Extras</a> -->
                    <!-- <div onclick="/Placement-Assistant-master/dashboard/2020/companyName" download>
                      <p>Download Company Requirements</p>
                    </div> -->
                  </div>
                  <footer class="styleHF">
                    <p id='address'></p>
                  </footer>
                </div>
              </div>


              <?php
              include('includes/script.php');
              include('includes/footer.php');
              ?>

              <script>
                
                var anc = document.getElementsByClassName("anc");
                console.log(anc.length)
                for (var i = 0; i < anc.length; i++) {
                  anc[i].get.addEventListener("click", function() {
                    
                  var current = document.getElementsByClassName(" active");
                  current[0].className = current[0].className.replace(" active", "");
                  this.className += " active";
                  });
                }
                function myFunction(name, email, address, reg_date, deadline, plink, slink) {
                  console.log(name);
                  document.getElementById('download_link').style.display = 'none';
                  document.getElementById('id01').style.display = 'block';
                  document.getElementById('title').innerHTML = name;
                  document.getElementById('email').innerHTML = email;
                  document.getElementById('address').innerHTML = address;
                  document.getElementById('annDate').innerHTML = reg_date;
                  document.getElementById('deadline').innerHTML = deadline;
                  document.getElementById("primary_link").href = plink;
                  console.log("plink" + plink);
                  slink = JSON.parse(slink);
                  console.log(slink);
                  var arrayVal = [];
                  Object.keys(slink).forEach(key => arrayVal.push(slink[key]));
                  console.log(arrayVal);
                  document.getElementById("secondary_link").onclick = function() {
                    console.log(arrayVal);
                    myFunction1(arrayVal);
                  };
                }

                function myFunction1(arrayVal) {
                  for (x in arrayVal) {
                    console.log("x : " + arrayVal[x]);
                    document.getElementById("download_link").href = arrayVal[x];

                    document.getElementById("download_link").click();
                  }
                  console.log("arrayVal" + arrayVal);
                }

                function gotohome(){
                  window.location.href ='../login.php';
                }
                function gotoform(){
                  window.location.href ='./';
                }
              </script>


