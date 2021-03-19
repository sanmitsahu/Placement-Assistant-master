<?php
require_once "db.php";
{

	$sql = "INSERT INTO  tests_data  (test_id, department, pass, no_of_ques, time_limit, min_marks, test_created, test_name) VALUES ('".$_POST["test_id"]."', '".$_POST["department"]."','".$_POST["pass"]."',  '" .$_POST["no_of_ques"]."', '".$_POST["time_limit"]."', '".$_POST["min_marks"]."', '".$_POST["test_created"]."', '".$_POST["test_name"]."')";

                              if ($conn->query($sql) === TRUE) {
                                echo "New record created successfully";
                              } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                              }
                              //echo '<div class="panel-heading"><a href="http://localhost:8080/tutorial/php-login-using-google-demo/redirect.php"></div>';
                              header("Location:http://localhost:8080/Placement-Assistant-master/dashboard/crud/all_tests.php");

//mysqli_query($conn, "INSERT INTO  tests_data  (test_id, department, pass, no_of_ques, time_limit, min_marks, test_created, test_name) VALUES ('".$_POST["department"]."','".$_POST["pass"]."',  '" .$_POST["no_of_ques"]."', '".$_POST["time_limit"]."', '".$_POST["min_marks"]."', '".$_POST["test_created"]."', '".$_POST["test_name"]."' WHERE test_id='".$_POST["test_id"]."'");



}





?>