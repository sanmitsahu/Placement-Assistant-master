<?php
include('security.php');
include("db.php");
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
if(isset($_POST['order'])){
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $orderQuery=" order by $columnName $columnSortOrder ";
}else{
   // $columnName='sem,year';
   // $columnSortOrder='desc';
   $orderQuery=" order by user_name asc ";

}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = "  where (testid like '%".$searchValue."%' or 
   user_name like '%".$searchValue."%'
    )";
}

## Total number of records without filtering
$sel = mysqli_query($connection,"select count(*) as totalcount from scorecard");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];
$sql="SELECT count(*) as total FROM scorecard ".$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($connection, $sql);
//$filtered=$courseRecords['t'];
$sql="SELECT * FROM scorecard ".$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($connection, $sql);
$data = array();
$count=0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
	
	
   $data[] = array( 
      "user_name"=>$row['user_name'],
					 
      "testid"=>$row['testid'],
	  "score"=>$row['score'],
	  "end_time"=>$row['end_time'],
	  "start_time"=>$row['start_time'],
      
	
      
     
   );
   $count++;
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecords,
  "aaData" => $data,
);

echo json_encode($response);
// select cname,cid,sem,dept_name,max,min,no_of_allocated,(SELECT aad.dept_id as app FROM audit_course_applicable_dept aad WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year) from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1

?>
