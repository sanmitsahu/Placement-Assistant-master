<?php
//include('security.php');
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
   $orderQuery=" order by Company_name asc ";

}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = " where (Company_name like '%".$searchValue."%' or 
   Ref_no like '%".$searchValue."%' 
   ) ";
}
##`company_module`(`Ref_no`, `Announcement_date`, `year`, `Company_name`, `Address`, `Reg_deadline`, `email_id`, `primary_link`, `secondary_link`, `status`)
## Total number of records without filtering
$sel = mysqli_query($connection,"select count(*) as totalcount from company_module");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];
$sql="select * from company_module ".$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
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
    
   $data[] = array( 
       
 
       
       
      "Ref_no"=>$row['Ref_no'],	 
      "Announcement_date"=>$row['Announcement_date'],
	  "Reg_deadline"=>$row['Reg_deadline'],
	  "Company_name"=>$row['Company_name'],
      "year"=>$row['year'],
       
      "status"=>$status,
      "View/Edit_data"=>'                      <div >

                          <a class="btn btn-md btn-icon-only text-default" onclick="updateModal( \''.$row['Ref_no'].'\')"  role="button" aria-haspopup="true" aria-expanded="false">
                         <button type="button" class="btn btn-secondary btn-sm"> <i class="ni ni-settings"></i></button>
                       </a>

                      </div>',
	  "Process_now"=>'                              <div >
                         
                          <a class="btn btn-md btn-icon-only text-default" href='.$linkdirection.' role="button" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-archive"></i></button></a>
                        

                      </div>',
      "Delete"=>'                      <div >
      
      <a class="btn btn-md btn-icon-only text-default" onclick="deleteModal( \''.$row['Ref_no'].'\')"  role="button" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-window-close"></i></button></a>
                          

                        

                      </div>',
//	
//            "Delete"=>'                      <div >
//      
//      <button type="button" class="btn btn-secondary btn-sm" class="delete_company"  ><a class="btn btn-md btn-icon-only text-default" role="button" aria-haspopup="true" aria-expanded="false"><input type="text" class="ref_no_delete" value="'.$row['Ref_no'].'" name="ref_no_delete" hidden> <i class="fa fa-window-close"></i></a></button>
//                          
//
//                        
//
//                      </div>',
       
      "action"=>'<div class="dropdown">
                                        <a class="btn btn-md btn-icon-only text-default" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ni ni-settings"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="update_test.php" method="POST">
                                                <input type="hidden" name="updateuname"
                                                    value="'.$row['Company_name'].'">
                                                <!-- Button trigger modal -->
                                                <button type="submit" class="dropdown-item" name="updatebtn">
                                                    <i class="ni ni-fat-add">&nbsp;</i>Update
                                                </button>
                                            </form>

                                            <form action="verify.php" method="POST">
                                                <input type="hidden" name="deluname"
                                                    value="'.$row['Company_name'].'">
                                                <button type="submit" class="dropdown-item" name="deletebtntest">
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
