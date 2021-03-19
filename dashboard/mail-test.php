<?php
//session_start();
//error_reporting(0);
include('includes/header.php');
// include('includes/navbar.php');
include('db.php');
?>
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
<span class="mask bg-gradient-default opacity-8"></span>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
// require 'vendor/autoload.php';
require 'C:\xampp\htdocs\Placement-Assistant-master\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\Placement-Assistant-master\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\Placement-Assistant-master\PHPMailer-master\src\SMTP.php';

// Instantiation and passing `true` enables exceptions
// echo $_POST["company-ref"];
$user = 'root';
$password = '';
$db = 'placement_assistant';
$host = 'localhost';
$conn = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT email_id FROM company_applied WHERE Ref_no ='" . $_POST["company-ref"] . "'";
$result = $conn->query($sql);
$conn->close();
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $emailIdList=array();
    //Recipients
    $mail->setFrom('from@somaiya.edu', 'Mailer');
    foreach ($result as $row) {
        $emailId = $row['email_id'];
        array_push($emailIdList,$emailId);
        $mail->addAddress(strval($emailId));
        // echo $row['email_id'];
    }


    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST["mail-title"];
    $mail->Body    = $_POST["mail-body"];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<div class='alert alert-success alert-dismissible fade show' role = 'alert' style='width:100%;margin:15px'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close' onclick = 'history.back()'>
            <span aria-hidden='true'>&times;</span>
        </button>
        <h4 class='alert-heading'>Successfully Sent!</h4>
        <p>" .count($emailIdList). " students had applied for " . $_POST["company-ref"] . "</p>
        <hr>
        <p class='mb-0'>Mails have been sent to ".implode(', ',$emailIdList)."</p>
    </div>";
} catch (Exception $e) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role = 'alert' style='width:100%;margin:15px'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close' onclick = 'history.back()'>
            <span aria-hidden='true'>&times;</span>
        </button>
        <h4 class='alert-heading'>Error Information t!</h4>
        <p>".$mail->ErrorInfo."</p>
        <hr>
        <p class='mb-0'>Either The Company Reference Id is Incorrect or Nobody has applied for the Company. Please check Your Network Connectivity & Retry</p>
    </div>";
    echo "<script>alert('$mail->ErrorInfo');</script>";
}

?>
</div>
<script>
function goBack() {
  window.history.back();
}

</script>
<?php
include('includes/script.php');
include('includes/footer.php');
?>
