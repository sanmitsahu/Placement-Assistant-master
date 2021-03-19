<?php
//session_start();
include('config.php');
if(isset($_SESSION['username'])){
	header("Location:index.php");
}

$login_button = '';
//$_SESSION['login_status'] = "Not registered";
//$GLOBALS['login_status']="";
if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 if(!isset($token['error']))
 {
  $google_client->setAccessToken($token['access_token']);
  $_SESSION['access_token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client);
  $data = $google_service->userinfo->get();

  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><button style="background-color:White;"><i style="background-color:Purple;" class="fab fa-google-plus-g fa-2x"></button></i></a>';
}

?>
<html lang="en-US">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="./assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
 </head>
 <body>
  
  
    <div class="container d-flex justify-content-center d-flex p-2" id="container" align="center">
        <div class="content-wrapper d-flex justify-content-center d-flex p-2" align="center">
   <div class="overlay">
                    <div class="overlay-panel overlay-right">
            
                    <h1><center>Login</center></h1>
                    <div class="social-container">
                        
                        <?php

                        
                        //echo $_SESSION['login_status'];
                        //echo $GLOBALS['login_status'];
                           if($login_button == '')
                           {
                              $servername = "localhost";
                              $username = "root";
                              $password = "";
                              $dbname = "placement_assistant";

                              // Create connection
                              $conn = new mysqli($servername, $username, $password, $dbname);
                              // Check connection
                              if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                              }
                                                              
                                  $userfname =$_SESSION['user_first_name'];
                                  $userlname =$_SESSION['user_last_name'];
                                  $email =$_SESSION['user_email_address'];
                                 
                                  $query = "SELECT * FROM google_user WHERE email_id = '$email'";
                                  
                                  $query_run = mysqli_query($conn, "SELECT * FROM google_user WHERE email_id = '$email' ");
                                  $usertype = mysqli_fetch_array($query_run);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
									                    $_SESSION['usertype']=$usertype['usertype'];
                                      $_SESSION['username']=$email;
                                      $_SESSION['login_status'] = "Logged in Successfully!";
                                      header('Location:index.php'); 
                                    }
                                    else
                                    {
                                      
                                     
                                      //$GLOBALS['login_status'] = "You are not registered. Please contact Admin";;
                                      $_SESSION['login_status'] = "You are not registered. Please contact Admin";
                                      //$_SESSION['flag']=1;
                                      echo $_SESSION['login_status'];
                                      $google_client->revokeToken();
                                      session_destroy();
                                      
                                      header('Location:login1.php');
                                    }
                              
                                  
                                                              
                              $conn->close();
                           }
                           else
                           {
                            echo '<div><center>'.$login_button . '</center></div>';
                           }
                           ?>
                        
                    </div>
                    <br>
                    <p style="color:red"><b>You are not registered.</b><br><b> Please contact Admin or inform your Proctor</b></p>
                
                    <span>Use your <b>Somaiya Account</b> to Login.</span>
                    <p>Please use registered Account.</p>
                    <p>If not registered Contact Admin.</p>
                  </div>
                    
            </div>

            
            </div>

        </div>



    </div>
  
   </div>
   <?php 


         if (isset($_SESSION['status']) && $_SESSION['status'] != '')
           {
            echo  $_SESSION['status'];
            //unset($_SESSION['status']);
           }
 			?>
  <script type="text/javascript">
 
 
  
  </script>
  <script type="text/javascript" src="slide.js"></script>
 </body>
</html>
