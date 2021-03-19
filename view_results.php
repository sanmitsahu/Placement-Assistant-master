<?php 
include('dashboard/security.php');

include('include_root/header.php');
?>



<body>
      <form method="POST" action="result_analyse.php">
    <?php
include('include_root/navbar.php');
?>



    <!-- Masthead -->
    <header class="mastheader">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">View Results</h1>
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5"></p>

                </div>
            </div>
        </div>
    </header>



    <div class="container testsection">
  <h3>VIEW RESULTS HERE</h3><br>
  <p>STUDENT NAME: <?php echo $_SESSION['username'] ;?></p>
        <!--end row-->
        <?php 
    $name=$_SESSION['username'];
$q="select * from scorecard where user_name='$name'";
$q_run=mysqli_query($connection,$q);
if(mysqli_num_rows($q_run)==0)
{
  echo 'you have not given any tests yet';
}
else
{
    $i=0;
echo '<table class="table">';
 echo '<tr>
     
  <th>Test name</th>
  <th>Your Score</th>
    <th>Incorrect</th>
    <th>Not Answered</th>
    <th>Out of</th>
  <th>Max score</th>
  <th>Min score</th>

  </tr>';
  while($rows=mysqli_fetch_array($q_run)){
    $curr_id=$rows['testid'];
    $maxq="select max(score) from scorecard where testid='$curr_id'";
    $qmax=mysqli_query($connection,$maxq);
    $max=mysqli_fetch_array($qmax);
   
     $minq="select min(score) from scorecard where testid='$curr_id'";
    $qmin=mysqli_query($connection,$minq);
    $min=mysqli_fetch_array($qmin);
    $curr=trim($curr_id);
    $q="select * from tests_data where test_id='$curr'";
    $qrun=mysqli_query($connection,$q);
    $test=mysqli_fetch_array($qrun);
   ?>
   <?php 
   if($rows['score']<=$min[0]){
    $i+=1;
    ?>

        <tr class="table-danger">
           
      <td>
        <center><input type="hidden" name="testid[]"
        value="<?php echo $rows['testid'] ;?>" />
        <?php echo $test['test_name'] ;?></center></td>
        <td>
        <center><input type="hidden" name="score[]"
        value="<?php echo $rows['score'] ;?>"/>
        <?php echo $rows['score'] ;?></center></td>
        <td>
        <center><input type="hidden" name="incorrect[]"
        value="<?php echo $rows['incorrect'] ;?>"/>
        <?php echo $rows['incorrect'] ;?></center></td>
        <td>
        <center><input type="hidden" name="not_answered[]"
        value="<?php echo $rows['not_answered'] ;?>"/>
        <?php echo $rows['not_answered'] ;?></center></td>
        <td>
        <center><input type="hidden" name="no_of_ques[]"
        value="<?php echo $test['no_of_ques'];?>"/>
        <?php echo $test['no_of_ques'];?></center></td>
        <td>
        <center><input type="hidden" name="max[]"
        value="<?php echo $max[0]  ;?>"/>
        <?php echo $max[0]  ;?></center></td>
        <td>
        <center><input type="hidden" name="min[]"
        value="<?php echo $min[0]  ;?>"/>
        <?php echo $min[0]  ;?></center></td>
        <td><button name="<?php echo $i-1;?>" type="submit" id="submit" class="btn btn-outline-primary btn-block submit">Analyse Result</button></td>


      

        </tr>
        <!-- <button name="submit1" type="submit" id="submit1">Submit</button> -->
        <!-- </form> -->
   <?php } else if($rows['score']<=$max[0] && $rows['score']>$min[0] ){
    $i+=1;
    ?>
<!--     <form method="POST" action="result_analysis.php"> -->
    <tr class="table-info">
      <td>
        <center><input type="hidden" name="testid[]"
        value="<?php echo $rows['testid'] ;?>"/>
        <?php echo $test['test_name'] ;?></center></td>
        <td>
        <center><input type="hidden" name="score[]"
        value="<?php echo $rows['score'] ;?>"/>
        <?php echo $rows['score'] ;?></center></td>
        <td>
        <center><input type="hidden" name="incorrect[]"
        value="<?php echo $rows['incorrect'] ;?>"/>
        <?php echo $rows['incorrect'] ;?></center></td>
        <td>
        <center><input type="hidden" name="not_answered[]"
        value="<?php echo $rows['not_answered'] ;?>"/>
        <?php echo $rows['not_answered'] ;?></center></td>
        <td>
        <center><input type="hidden" name="no_of_ques[]"
        value="<?php echo $test['no_of_ques'];?>"/>
        <?php echo $test['no_of_ques'];?></center></td>
        <td>
        <center><input type="hidden" name="max[]"
        value="<?php echo $max[0]  ;?>"/>
        <?php echo $max[0]  ;?></center></td>
        <td>
        <center><input type="hidden" name="min[]"
        value="<?php echo $min[0]  ;?>"/>
        <?php echo $min[0]  ;?></center></td>
        <td><button name="<?php echo $i-1;?>" type="submit" id="submit" class="btn btn-outline-primary btn-block submit">Analyse Result</button></td>

   </tr>
        <!-- <button name="submit2" type="submit" id="submit2">Submit</button> -->
        </form>   
 <?php } ?>
        <?php }?>
        <?php
  echo '</table>';
}
     ?>


    </div>
    <!--end container-->


    <?php 
include('include_root/footer.php');
?>