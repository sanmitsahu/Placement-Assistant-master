
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
    <div class="container" id="container" align="center">
        <div class="content-wrapper" align="center">
   
            <div class="form-container sign-in-container" align="center">
                    <h1><center>Sign in</center></h1>
                    <div class="social-container">
                        
                        <?php
                        //echo $_SESSION['status'];
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
                                      header('Location:index.php'); 
                                    }
                                    else
                                    {
                                      $_SESSION['status'] = "You are not registered. Please contact Admin";
                                      echo $_SESSION['status'];
                                      header('Location:logout.php');
                                    }
                              
                                  
                                                              
                              $conn->close();
                           }
                           else
                           {
                            echo '<div><center>'.$login_button . '</center></div>';
                           }
                           ?>
                        
                    </div>
                    
                    <span><center>Use your Somaiya Account to Login.</center></span>
                    <center><p>Please use registered Account.</p></center>
                    <center><p>If not registered Contact Admin.</p></center>
                    
            </div>

            
            </div>

        </div>



    </div>
  
   </div>
   <?php 


         if (isset($_SESSION['status']) && $_SESSION['status'] != '')
           {
            echo  $_SESSION['status'];
            unset($_SESSION['status']);
           }
 			?>
  <script type="text/javascript">
 
 
  
  </script>
  <script type="text/javascript" src="slide.js"></script>
 </body>
</html>
