<?php
//include('security.php');
include("db.php");
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
if(isset($_POST['order'])){
   $columnIndex = $_POST['order'][0]['column']; // Column index
//   if ( $columnName=='f_status'){
//       $columnName='(submissionLink && submission1)'
//   }
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $orderQuery=" order by $columnName $columnSortOrder ";
}else{
   // $columnName='sem,year';
   // $columnSortOrder='desc';
   $orderQuery=" order by email_id asc ";

}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = " where (email_id like '%".$searchValue."%' or 
   Ref_no like '%".$searchValue."%'  or 
   categ like '%".$searchValue."%' 
   ) ";
}
##`company_module`(`Ref_no`, `Announcement_date`, `year`, `Company_name`, `Address`, `Reg_deadline`, `email_id`, `primary_link`, `secondary_link`, `status`)
## Total number of records without filtering
$sel = mysqli_query($connection,"select count(*) as totalcount from google_user");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];
$sql="select * from google_user ".$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($connection, $sql);
$data = array();
$count=0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
    if ($row['status']==0)
    {
        $status="Pending";
    }
    else
    {
        $status="Submitted";
        
    }
    $linkdirection="applications.php?ref=".$row['Ref_no'];
    $categ="";
    if ($row['categ']== "not"){
        $categ="Not placed";
    }
    else if ($row['categ']== "dream"){
        $categ="Dream";
    }
    else if ($row['categ']== "nondream"){
        $categ="Non Dream";
    }
    else if ($row['categ']== "superdream"){
        $categ="Super Dream";
    }
    $f_status="";
    if (($row['submission1']== 1)&&($row['submission2']== 1)&&($row['submission3']== 1)&&($row['submission4']== 1)&&($row['submissionAcademics']== 1)&&($row['submissionLink']== 1)){
         $f_status="Complete";
    }
    else{
        $f_status="Incomplete";
    }

   $data[] = array( 
       
 

       
      "Ref_no"=>$row['Ref_no'],	 
      "email_id"=>$row['email_id'],
	  "categ"=>$categ,
	  "f_status"=>$f_status,

      "add_detail"=>'                      <div >

                          
                          <a class="btn btn-md btn-icon-only text-default" onclick="placed_student( \''.$row['email_id'].'\')"  role="button" aria-haspopup="true" aria-expanded="false"><i class="ni ni-settings"></i></a>
                       

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
