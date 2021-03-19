<?php
//Add Users to database using csv file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST["submit"]))
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
        $item1 = mysqli_real_escape_string($conn, $data[0]);
        $item2 = mysqli_real_escape_string($conn, $data[1]);
        $item3 = mysqli_real_escape_string($conn, $data[2]);
        $sql = "INSERT into google_user (First_name,Last_name,email_id) VALUES('$item1', '$item2', '$item3')";
        mysqli_query($conn, $sql);
        if ($conn->query($sql) === FALSE) {
        echo "Added  ";
      }

      }
 
      fclose($handle);
    }
  }
}
//<button type="submit" name="submit">Add File</button>
?>
<!DOCTYPE html>
<html>
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
		<title>Upload csv of registered users</title>
	</head>
	<body>
		<form method='POST' enctype='multipart/form-data'>
			<div align = "center">
				<p><div align = "center">Upload Csv file of all users who are to be registered</div>
					<input type='file' name='file' /></p>
				<p><button type="submit" name="submit">Add to database</button></p>
			</div>
		</form>
	</body>
</html>