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
   $orderQuery=" order by type asc ";

}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = " where (type like '%".$searchValue."%' or 
   question like '%".$searchValue."%' or id like '%".$searchValue."%' 
   ) ";
}

## Total number of records without filtering
$sel = mysqli_query($connection,"select count(*) as totalcount from gd_hr");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];
$sql="SELECT * FROM gd_hr  ".$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($connection, $sql);
$data = array();
$count=0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
	$rid=$row['id'];
	$c="select count(*) as total_res from forum where id='$rid'";
	$crun=mysqli_query($connection,$c);
	$res=mysqli_fetch_array($crun);
	
   $data[] = array( 
      "id"=>$row['id'],
					 
      "type"=>$row['type'],
	  "response_count"=>$res['total_res'],
	  "question"=>$row['question'],
      
	
      
      "action"=>'<div class="dropdown">
                        <a class="btn btn-md btn-icon-only text-default" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        
                              <!-- Button trigger modal -->
                              <form action="update_gd.php" method="POST">
                                <input type="hidden" name="uptitle" value="'.$row['id'].'">
                               <button type="submit" name="gd_update" class="dropdown-item">
                               <i class="ni ni-fat-add"></i>  <span>Update</span>
                                </button>
                               </form>

                              <form action="verify.php" method="POST">
                              <input type="hidden" name="deltitle" value="'. $row['id'].'">
                              <button type="submit" name="gd_remove" class="dropdown-item">
                               <i class="ni ni-fat-remove">&nbsp;</i>Remove
                              </button> 
                              </form>
                        </div>
          
                      </div>',
   );
   $count++;
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecords,
  "aaData" => $data
);

echo json_encode($response);
// select cname,cid,sem,dept_name,max,min,no_of_allocated,(SELECT aad.dept_id as app FROM audit_course_applicable_dept aad WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year) from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1

?>
