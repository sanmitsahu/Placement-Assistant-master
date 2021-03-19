<?php
error_reporting(0);
$user = 'root';
$password = '';
$db = 'placement_assistant';
$host = 'localhost';


$connection = mysqli_connect($host,$user,$password,$db);
if($connection)
{

}
else
{
  die("connection failed becaues ".mysqli_connect_error() );
}
?>