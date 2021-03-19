<?php 
include('checking.php');
date_default_timezone_set('Asia/Kolkata');
//session_start(); 
//error_reporting(0);
$count1=0;
$count=0;
include('database/db.php');
include('include_root/header.php');

?>


<body>
    <?php
include('include_root/navbar.php');
?>


    <!-- Masthead -->
    <header class="mastheader">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Online Test</h1>
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5"></p>

                </div>
            </div>
        </div>
    </header>



    <div class="container testsection">
        <div class="row">

            <div class="col-md-8 left-side">


                <?php 
error_reporting(0);

if(isset($_POST['submit_test']))
{
    
$char=array();
//print_r($inner);
//print_r($res);
foreach( range('A', 'Z') as $elements) { 
      
    // Display all alphabetic elements 
    // one after another 
    array_push($char,$elements); 
}
    
    $_SESSION['submit']=true;
    $input=array();
    //print_r($_SESSION['row']);
    
    $input=$_POST['quizcheck'];
    //var_dump($input);
    $j=0;
 $count1=0;
 $wrong=0;
 $correct=0;
 $null=0;
 $st="not attempted";


    foreach ($_SESSION['row'] as $row) {
       $j=$j+1;  # code...
     $count=$count+1;
        
        //print_r ($input[$j]);
        
        if(empty($input[$j]))
        {
          //$wrong=$wrong+1;
          $null=$null+1;

          ?>
                <div class="questions">
                    <div class="row">
                        <p><?php echo 'Q) '.nl2br($row['question']) ; ?></p>
                    </div>
                    <?php for ($r=1;$r<=$row['num_of_option'];$r++){?>
                        <div class="row">

                            <label for="option<?php echo $r ;?>"><?php echo $char[$r-1].') '.$row['opt'.$r]; ?></label>
                        </div>
                        <?php } ?>
                        
                   
                    <p>
                        <button class="btn btn-outline-info btn-sm" type="button" data-toggle="collapse"
                            data-target="#collapseExample<?php echo $j; ?>" aria-expanded="false"
                            aria-controls="collapseExample">
                            View Solution
                        </button></p>
                    <div class="collapse" id="collapseExample<?php echo $j ;?>">
                        <div class="card card-body">
                            <p><?php echo 'YOUR ANSWER:'.$st; ?></p>
                            <p class="ans">Answer: Option <?php echo $row['ans'] ;?></p>
                            <p class="ans">Explanation:</p>
                            <p>
                                <?php echo $row['explaination']; ?>

                            </p>

                        </div>
                    </div>


                </div>

                <?php  
        }

        else
         { 
          if(!strcmp($input[$j],$row['ans']))
{
  $correct=$correct+1;
}
else
{
  $wrong=$wrong+1;
}

        ?>
                <div class="questions">
                    <div class="row">
                        <p><?php echo 'Q) '.nl2br($row['question']) ; ?></p>
                    </div>
                    <div class="row">

                        <label for="optionA"><?php echo 'A) '.$row['opta']; ?></label>
                    </div>
                    <div class="row">

                        <label for="optionB"><?php echo 'B) '.$row['optb']; ?></label>
                    </div>
                    <div class="row">

                        <label for="optionC"><?php echo 'C) '.$row['optc']; ?></label>
                    </div>
                    <div class="row">

                        <label for="optionD"><?php echo 'D) '.$row['optd']; ?></label>
                    </div>
                    <p>
                        <button class="btn btn-outline-info btn-sm" type="button" data-toggle="collapse"
                            data-target="#collapseExample<?php echo $j; ?>" aria-expanded="false"
                            aria-controls="collapseExample">
                            View Solution
                        </button></p>
                    <div class="collapse" id="collapseExample<?php echo $j ;?>">
                        <div class="card card-body">
                            <p><?php echo 'YOUR ANSWER:'.$input[$j]; ?></p>
                            <p class="ans">Answer: Option <?php echo $row['ans'] ;?></p>
                            <p class="ans">Explanation:</p>
                            <p>
                                <?php echo $row['explanation']; ?>

                            </p>

                        </div>
                    </div>


                </div>


                <?php   }?>

                <?php    
    }?>


                <?php  
}?>


            </div>






            <div class="col-md-4 sidebar">

                <h2>YOUR RESULT</h2>


                

                <?php 
$uname=$_SESSION['username'];
$on=$_POST['testid'];
$s_time=$_SESSION['start_time'];
$e_time=date('Y-m-d H:i:s', time());

$totalmarks = $correct + $wrong + $null ;

$q="insert into scorecard (user_name,testid,score,start_time,end_time,incorrect,not_answered) values('$uname','$on','$correct','$s_time','$e_time',$wrong,$null)" ;
$q_run=mysqli_query($connection,$q);
unset($_SESSION['row']);
unset($_SESSION['start_time']);
$arr1=array();
array_push($arr1,$correct);
array_push($arr1,$wrong);
array_push($arr1,$null);

#grouped by score maybe use for rank
    $sql="SELECT COUNT(*) as c,score FROM `scorecard` Where `testid`='$on'GROUP BY score ";
    $srun=mysqli_query($connection,$sql);
    $arr2=array();
    $arrscoregraph=array();
    while($row=mysqli_fetch_array($srun)){
        array_push($arr2,$row['c']);
        array_push($arrscoregraph,$row['score']);
    }

#ordered by score use for grpaph no of students vs score .... greater score lesser and equla in different colors
$sql_score1="SELECT `score` as score FROM `scorecard` Where `score`>$correct and `testid`='".$_POST['testid']."'  ORDER BY `score` DESC";
$srun_score1=mysqli_query($connection,$sql_score1);
$arr3=array();
while($row=mysqli_fetch_array($srun_score1)){
    array_push($arr3,$row['score']);
}
$totalmarks=0;
$scoreabove90 = 0;
$score8090 = 0;
$score7080 = 0;
$score6070 = 0;
$score5060 = 0;
$score4050 = 0;
$score3040 = 0;
$scorebelow30 = 0;

#echo "Total";
#echo $totalmarks;

$sql_arr5="SELECT `score` as score FROM `scorecard` Where `testid`='".$_POST['testid']."'  ORDER BY `score` DESC";
$srun_arr5=mysqli_query($connection,$sql_arr5);
$arr5=array();
while($row=mysqli_fetch_array($srun_arr5)){
    array_push($arr5,$row['score']);
}


$arrlength = count($arr5);
#echo "arrlength";
#echo $arrlength;
for($x = 0; $x < $arrlength; $x++) {
  if($totalmarks==0)
    $totalmarks=5;
  if($arr5[$x]/$totalmarks > 0.9)
    $scoreabove90 +=1;
  if($arr5[$x]/$totalmarks > 0.8 && $arr5[$x]/$totalmarks <= 0.9)
    $score8090 +=1;
  if($arr5[$x]/$totalmarks > 0.7 && $arr5[$x]/$totalmarks <= 0.8)
    $score7080 +=1;
  if($arr5[$x]/$totalmarks > 0.6 && $arr5[$x]/$totalmarks <= 0.7)
    $score6070 +=1;
  if($arr5[$x]/$totalmarks > 0.5 && $arr5[$x]/$totalmarks <= 0.6)
    $score5060 +=1;
  if($arr5[$x]/$totalmarks > 0.4 && $arr5[$x]/$totalmarks <= 0.5)
    $score4050 +=1;
  if($arr5[$x]/$totalmarks > 0.3 && $arr5[$x]/$totalmarks <= 0.4)
    $score3040 +=1;
  if($arr5[$x]/$totalmarks < 0.3)
    $scorebelow30 +=1;

}

$colors = array();
$mypos=0;
$myper=0;
$mypos1=0;
$mypos2=0;
$myper = $arr1[0]/$totalmarks;
if($myper > 0.9)
    $mypos = 0;
else if($myper > 0.8 && $myper <= 0.9)
    $mypos = 1;
else if($myper > 0.7 && $myper <= 0.8)
    $mypos = 2;
else if($myper > 0.6 && $myper <= 0.7)
    $mypos = 3;
else if($myper > 0.5 && $myper <= 0.6)
    $mypos = 4;
else if($myper > 0.4 && $myper <= 0.5)
    $mypos = 5;
else if($myper > 0.3 && $myper <= 0.4)
    $mypos = 6;
else if($myper <= 0.3)
    $mypos = 7;

$colors[$mypos] = "rgba(0, 0, 255, 0.2)";

for($x=0;$x<$mypos;$x++)
{
    $colors[$x] = "rgba(255, 0, 0, 0.2)";
}

for($x=$mypos+1;$x<8;$x++)
{
    $colors[$x] = "rgba(0, 255, 0, 0.2)";
}
$colors[$mypos] = "rgba(0, 0, 255, 0.2)";

$arr_score_range =array();
array_push($arr_score_range, $scoreabove90, $score8090, $score7080, $score6070, $score5060, $score4050, $score3040, $scorebelow30);


//DELETE FROM `scorecard` WHERE `user_name`='sanmit.sahu@somaiya.edu' and `score`=1;

#only no of students having >,< and = scores....maybe not useful
$sql1="SELECT * FROM `scorecard` where `testid`='".$_POST['testid']."' ";
$result1=mysqli_query($connection,$sql1);
$rowcount=mysqli_num_rows($result1);

#echo "total";
#echo $rowcount;


$sql_greater="SELECT * FROM `scorecard` where `score`>$correct and `testid`='".$_POST['testid']."' ";
$result_greater=mysqli_query($connection,$sql_greater);
$rowcount_greater=mysqli_num_rows($result_greater);

   
#echo "greater";
#echo $rowcount_greater;

$sql_lesser="SELECT * FROM `scorecard` where `score`<$correct and `testid`='".$_POST['testid']."' ";
$result_lesser=mysqli_query($connection,$sql_lesser);
$rowcount_lesser=mysqli_num_rows($result_lesser);

#echo "Lessser";
#echo $rowcount_lesser;

$rowcount_equal = $rowcount-$rowcount_lesser-$rowcount_greater;

#echo "equal";
#echo $rowcount_equal;

$arr4 = array();
array_push($arr4, $rowcount_greater, $rowcount_equal, $rowcount_lesser);


$sql_attempts="SELECT * FROM `scorecard` where `user_name`='".$_SESSION['username']."' and `testid`='".$_POST['testid']."' ORDER BY `end_time` ";
//SELECT * FROM `scorecard` where `user_name`='sanmit.sahu@somaiya.edu' and `testid`='Compstest' ORDER BY `start_time` ;


$result_attempts=mysqli_query($connection,$sql_attempts);
$arr_attempts = array();
$rowcount_attempts=mysqli_num_rows($result_attempts);
while($row=mysqli_fetch_array($result_attempts)){
    array_push($arr_attempts,$row['score']);
}
//echo "Attempts";
//echo $rowcount_attempts;
$label_attempt = array();
for($x=0;$x<$rowcount_attempts;$x++)
{
    $label_attempt[$x] = "Attempt ".($x+1);
    //echo $arr_attempts[$x];
}

//printf($arr_attempts[1]);
//printf($arr_attempts[2]);

$tempmarks=$correct+$null+$wrong;
?>
<div align="center">
    <p>Your Score is : </p>
    <p><?php echo $correct."/".$tempmarks ?></p>
    <p><?php
            $per =  ($correct/($correct+$null+$wrong))*100;
            echo "Your Percentage is : ".$per."%" ?></p>
</div>
<canvas id="chart1" width="300" height="300"></canvas>
                <br><br><br>
                <canvas id="chart2" width="400" height="400"></canvas>
                  <br><br><br>
                  <canvas id="chart3" width="400" height="400"></canvas>
                  <br><br><br>
                <canvas id="chart4" width="400" height="400"></canvas>
                  <br><br><br>
                 <?php
                    if ($rowcount_attempts>1){
                        echo "<center><canvas id='chart5' width='400' height='400'></canvas></center>
                          <br><br><br>";
                    }
                 ?>
                <div class="options">
                    <!--<div align ='center'><a href="scorecard.php">VIEW SCORECARD</a></div>-->

                    <div align ='center'><a href="index.php">GO BACK</a></div>
                </div>



            </div>



        </div>
    </div>


<script type="text/javascript">
var mysize = "<?php echo $rowcount_attempts ?>";
var myjsarr = new Array(mysize); 
var myjsarr = <?php echo json_encode($label_attempt); ?>;
</script>


<script>
 var ctxP = document.getElementById("chart1").getContext('2d');
    var myPieChart = new Chart(ctxP, {
    type: 'pie',
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    data: {
    
    labels:['CORRECT', 'WRONG','NOT ATTEMPTED'],
    datasets: [{
        data:<?php echo json_encode($arr1)?>,
        backgroundColor:['Green','Red','Black'],
        //hoverBackgroundColor:<?php echo json_encode($hover_bg_color)?>,
    }]
    },
    options: {
    responsive: true,
    title:{
        display:true,
        text: "performance status"
    },
    animationEnabled: true,
    exportEnabled: true,
    }
    });
    
    var ctxP1 = document.getElementById("chart2").getContext('2d');
    var line= new Chart(ctxP1, {
    type: 'bar',
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    data: {
    
    labels:<?php echo json_encode($arrscoregraph)?>,
    datasets: [{
        data:<?php echo json_encode($arr2)?>,
        label: 'Marks',
        //backgroundColor:['Green','Red','Black'],
        //hoverBackgroundColor:<?php echo json_encode($hover_bg_color)?>,
    }]
    },
    options: {
    responsive: false,
    title:{
        display:true,
        text: "performance status"
    },
    animationEnabled: true,
    exportEnabled: true,
        scales: {
            yAxes: [{
                stacked: true,
                ticks: {
                  beginAtZero: true
                },
                scaleLabel: {
                        display:true,
                    labelString:'Number of Students'}

            }],
            xAxes: [ {
                    scaleLabel: {
                        display:true,
                    labelString:'Marks'}
          
        } ],
        }
    }
    });

    var ctx3 = document.getElementById('chart3').getContext('2d');
    var chart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Greater', 'Equal', 'Lesser'],
            
            datasets: [{
                    data:<?php echo json_encode($arr4)?>,
                    backgroundColor:['Green','Red','Black'],

                label: 'No of students',
                
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

//, '80% - 90%', '70% - 80%', '60% - 70%', '50% - 60%', '40% - 50%', '30% - 40%', 'Below 30%'
    var ctx4 = document.getElementById('chart4').getContext('2d');
    var chart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: ['Above 90%', '80% - 90%', '70% - 80%', '60% - 70%', '50% - 60%', '40% - 50%', '30% - 40%', 'Below 30%'],
            
            datasets: [{
                    data:<?php echo json_encode($arr_score_range)?>,
                    

                label: 'No of students',
                
                backgroundColor:[
                    <?php echo json_encode($colors[0])?>,
                    <?php echo json_encode($colors[1])?>,
                    <?php echo json_encode($colors[2])?>, 
                    <?php echo json_encode($colors[3])?>,
                    <?php echo json_encode($colors[4])?>,
                    <?php echo json_encode($colors[5])?>,
                    <?php echo json_encode($colors[6])?>,
                    <?php echo json_encode($colors[7])?>
                    ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx5 = document.getElementById("chart5").getContext('2d');
    var chart5= new Chart(ctx5, {
    type: 'bar',
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    data: {
    
    //labels:[<?php echo json_encode($label_attempt)?>],
    labels:myjsarr,
    datasets: [{
        data:<?php echo json_encode($arr_attempts)?>,
        label: 'Score in Test',
        backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    
                ],
        //backgroundColor:['Green','Red','Black'],
        //hoverBackgroundColor:<?php echo json_encode($hover_bg_color)?>,
    }]
    },
    options: {
    responsive: false,
    title:{
        display:true,
        text: "performance status"
    },
    animationEnabled: true,
    exportEnabled: true,
    scales: {
            yAxes: [{
                stacked: true,
                ticks: {
                  beginAtZero: true
                },
                scaleLabel: {
                        display:true,
                    labelString:'Marks'}

            }],
            xAxes: [ {
                    scaleLabel: {
                        display:true,
                    labelString:'Attempts'}
          
        } ],
        }
    }
    });
//DELETE FROM `scorecard` WHERE `user_name`='sanmit.sahu@somaiya.edu' and `score`=1;
</script>

    <?php
include('include_root/footer.php');


//DELETE FROM `scorecard` WHERE `user_name`='sanmit.sahu@somaiya.edu' and `start_time` like "2020-12-30%";

?>