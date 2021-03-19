
<?php
$user = 'root';
$password = '';
$db = 'placement_assistant';
$host = 'localhost';


$con = mysqli_connect($host,$user,$password,$db);
if($con)
{

}
else
{
  die("connection failed becaues ".mysqli_connect_error() );
}

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
$searchByName = $_POST['searchByName'];
$searchByGender = $_POST['searchByGender'];
$searchBycgpi = $_POST['searchBycgpi'];

## Search 
$searchQuery = " ";

if($searchByName != ''){
   $searchQuery .= " and (prog='".$searchByName."') ";
}
if($searchByGender != ''){
   $searchQuery .= " and (dept='".$searchByGender."') ";
}
 if($searchBycgpi != ''){
    $searchQuery .= " and (BCGPI >='".$searchBycgpi."') ";
 }

// if($ref_no != ''){
//    //$searchQuery .= " and (BCGPI >='".$searchBycgpi."') ";
// }

// if($searchByGender != '' && $searchBycgpi  != ''){
//   $searchQuery = " where (dept='".$searchByGender."') and (BCGPI >='".$searchBycgpi."') ";
// }
// if($searchBycgpi  != '' && $searchByName != ''){
//   $searchQuery = " where (BCGPI >='".$searchBycgpi."') and (prog='".$searchByName."') ";
// }
// if($searchByGender != '' && $searchByName != ''){
//   $searchQuery = " where (dept='".$searchByGender."') and (prog='".$searchByName."') ";
// }
// if($searchByGender != '' && $searchByName != '' && $searchBycgpi != ''){
//   $searchQuery = " where (dept='".$searchByGender."') and (prog='".$searchByName."') and (BCGPI >='".$searchBycgpi."')  ";
// }

if($searchValue != ''){
   $searchQuery .= " and (personal.Email like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from personal");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from personal inner join academics on personal.Email=academics.Email ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery ="select * from personal inner join academics on personal.Email=academics.Email ".$searchQuery." limit ".$row.",".$rowperpage;

$empRecords = mysqli_query($con, $empQuery);
// if($empRecords)
// {
//   echo $empQuery;
// }
// else
// {
//   echo $empQuery;
// }
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
      $sql2 = "select * from internships WHERE Email ='".$row['Email']."';";
    $result2 = mysqli_query($con, $sql2);
    $no_internship = mysqli_num_rows($result2);
    $sql3 = "select skillinfo from technical_skills where Email ='".$row['Email']."';";
    $result3 = mysqli_query($con, $sql3);
    $skill = array();
    while($row2 = mysqli_fetch_assoc($result3)){
      array_push($skill,$row2['skillinfo']);
    }
        $skills = implode(', ', $skill); 
    $sql4 = "select grade from academics where Email ='".$row['Email']."';";
    $result4 = mysqli_query($con, $sql4);
    $SSC_ICSE = mysqli_fetch_assoc($result4)['grade'];
    $sql4 = "select grade12 from academics where Email ='".$row['Email']."';";
    $result4 = mysqli_query($con, $sql4);
    $HSC = mysqli_fetch_assoc($result4)['grade12'];
    $sql4 = "select Format(((BSEM3 + BSEM4 )/ 2),2) as a FROM academics where Email ='".$row['Email']."';";
    $result4 = mysqli_query($con, $sql4);
    $SY = mysqli_fetch_assoc($result4)['a'];
    $sql4 = "select Format(((BSEM5 + BSEM6 )/ 2),2) as a FROM academics where Email ='".$row['Email']."';";
    $result4 = mysqli_query($con, $sql4);
    $TY = mysqli_fetch_assoc($result4)['a'];
    $sql4 = "select Format(((BSEM7 + BSEM8 )/ 2),2) as a FROM academics where Email ='".$row['Email']."';";
    $result4 = mysqli_query($con, $sql4);
    $LY = mysqli_fetch_assoc($result4)['a'];
   // echo "ssss". $row['Fname'];
    $data[] = array(
    "Name"=>$row['Fname'].' '.$row['Lname'],
    "Email"=>$row['Email'], 
    "prog"=>$row['prog'],
    "rollno" => $row['Rno'],
    "dept"=>$row['dept'],
    "Technical_skills" => $skills,
    "num_internships" => $no_internship,
    "SSCICSE" => $SSC_ICSE,
    "HSC" => $HSC,
    "SY" => $SY,
    "TY" => $TY,
    "LY" => $LY
    );

}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);