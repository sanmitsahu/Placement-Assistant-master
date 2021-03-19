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
   $orderQuery=" order by department asc ";

}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = "  where (department like '%".$searchValue."%' or 
   dept_id like '%".$searchValue."%'
    )";
}

## Total number of records without filtering
$sel = mysqli_query($connection,"select count(*) as totalcount from subject");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];
$sql="SELECT count(*) as total FROM subject ".$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($connection, $sql);
//$filtered=$courseRecords['t'];
$sql="SELECT * FROM subject ".$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($connection, $sql);
$data = array();
$count=0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
	
	
   $data[] = array( 
      "department"=>$row['department'],
					 
      "dept_id"=>$row['dept_id'],  

      "action"=>'<div class="dropdown">
                                        <a class="btn btn-md btn-icon-only text-default" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ni ni-settings"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="update_subject.php" method="POST">
                                                <input type="hidden" name="up_sub"
                                                    value="'.$row['department'].'">
                                                    <input type="hidden" name="up_dptid"
                                                    value="'.$row['dept_id'].'">
                                                    <input type="hidden" name="up_subid"
                                                    value="'.$row['sub_id'].'">
                                                <!-- Button trigger modal -->
                                                <button type="submit" class="dropdown-item" name="update_sub">
                                                    <i class="ni ni-fat-add">&nbsp;</i>Update
                                                </button>
                                            </form>

                                            <form action="verify.php" method="POST">
                                                <input type="hidden" name="delsub"
                                                    value="'.$row['department'].'">
                                                    <input type="hidden" name="delsubid"
                                                    value="'.$row['dept_id'].'">
                                                    <input type="hidden" name="up_subid"
                                                    value="'.$row['sub_id'].'">
                                                <button type="submit" class="dropdown-item" name="deletesub">
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
  "aaData" => $data,
);

echo json_encode($response);
// select cname,cid,sem,dept_name,max,min,no_of_allocated,(SELECT aad.dept_id as app FROM audit_course_applicable_dept aad WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year) from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1

?>
