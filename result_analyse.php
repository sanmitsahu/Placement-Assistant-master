<?php 
include('dashboard/security.php');
date_default_timezone_set('Asia/Kolkata');
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
</div>
<center><h2>YOUR RESULT</h2></center>



<?php

error_reporting(0);

$q_count_records="select * from scorecard where user_name='".$_SESSION['username']."'";
$q_run_count_records=mysqli_query($connection,$q_count_records);
$count_records = mysqli_num_rows($q_run_count_records);
for($i=0;$i<$count_records;$i++){
if(isset($_POST[$i]))
{
    $test_name= $_POST['testid'];
    $score_arr= $_POST['score'];
    $no_of_ques= $_POST['no_of_ques'];
    $max= $_POST['max'];
    $min= $_POST['min'];
    $incorrect_arr= $_POST['incorrect'];
    $not_answered_arr= $_POST['not_answered'];

    $uname=$_SESSION['username'];
    $on=$_POST['testid'][$i];

    $correct = intval($score_arr[$i]);
    $wrong = intval($incorrect_arr[$i]);
    $null = intval($not_answered_arr[$i]);
   

    $totalmarks = ($correct) + ($wrong) + ($null) ;
    $arr1=array();
    array_push($arr1,($correct));
    array_push($arr1,($wrong));
    array_push($arr1,($null));
    //echo "   arr1  : ".$arr1[2];


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
    $sql_score1="SELECT `score` as score FROM `scorecard` Where `score`>$correct and `testid`='$on'  ORDER BY `score` DESC";
    $srun_score1=mysqli_query($connection,$sql_score1);
    $arr3=array();
    while($row=mysqli_fetch_array($srun_score1)){
        array_push($arr3,$row['score']);
    }
    $scoreabove90 = 0;
    $score8090 = 0;
    $score7080 = 0;
    $score6070 = 0;
    $score5060 = 0;
    $score4050 = 0;
    $score3040 = 0;
    $scorebelow30 = 0;

    $sql_arr5="SELECT `score` as score FROM `scorecard` Where `testid`='$on'  ORDER BY `score` DESC";
    $srun_arr5=mysqli_query($connection,$sql_arr5);
    $arr5=array();
    while($row=mysqli_fetch_array($srun_arr5)){
        array_push($arr5,$row['score']);
    }
    $arrlength = count($arr5);


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


    $sql1="SELECT * FROM `scorecard` where `testid`='$on' ";
    $result1=mysqli_query($connection,$sql1);
    $rowcount=mysqli_num_rows($result1);

    #echo "total";
    #echo $rowcount;


    $sql_greater="SELECT * FROM `scorecard` where `score`>$correct and `testid`='$on' ";
    $result_greater=mysqli_query($connection,$sql_greater);
    $rowcount_greater=mysqli_num_rows($result_greater);

       
    #echo "greater";
    #echo $rowcount_greater;

    $sql_lesser="SELECT * FROM `scorecard` where `score`<$correct and `testid`='$on' ";
    $result_lesser=mysqli_query($connection,$sql_lesser);
    $rowcount_lesser=mysqli_num_rows($result_lesser);

    #echo "Lessser";
    #echo $rowcount_lesser;

    $rowcount_equal = $rowcount-$rowcount_lesser-$rowcount_greater;

    #echo "equal";
    #echo $rowcount_equal;

    $arr4 = array();
    array_push($arr4, $rowcount_greater, $rowcount_equal, $rowcount_lesser);


    $sql_attempts="SELECT * FROM `scorecard` where `user_name`='".$_SESSION['username']."' and `testid`='$on' ORDER BY `end_time` ";
    //SELECT * FROM `scorecard` where `user_name`='sanmit.sahu@somaiya.edu' and `testid`='Compstest' ORDER BY `start_time` ;


    $result_attempts=mysqli_query($connection,$sql_attempts);
    $arr_attempts = array();
    $rowcount_attempts=mysqli_num_rows($result_attempts);
    while($row=mysqli_fetch_array($result_attempts)){
        array_push($arr_attempts,$row['score']);
    }
    #echo "Attempts";
    #echo $rowcount_attempts;
    $label_attempt = array();
    for($x=0;$x<$rowcount_attempts;$x++)
    {
        $label_attempt[$x] = "Attempt ".($x+1);
        #echo $arr_attempts[$x];
    }
?>


<div align="center">
    <p>Your Score is : </p>
    <p><?php echo $arr1[0]."/".$totalmarks ?></p>
    <p><?php
            $per =  ($arr1[0]/$totalmarks)*100;
            echo "Your Percentage is : ".$per."%" ?></p>
</div>
<center><canvas id="chart1" width="400" height="400"></canvas></center>
                <br><br><br>
                <p></p>
                <center><canvas id="chart2" width="400" height="400"></canvas></center>
                  <br><br><br>
                <center><canvas id="chart3" width="400" height="400"></canvas></center>
                  <br><br><br>
                <center><canvas id="chart4" width="400" height="400"></canvas></center>
                  <br><br><br>
                 <?php
                    if ($rowcount_attempts>1){
                        echo "<center><canvas id='chart5' width='400' height='400'></canvas></center>
                          <br><br><br>";
                    }
                 ?>
                <div class="options">
                    <!--<div align ='center'><a href="scorecard.php">VIEW SCORECARD</a></div>-->

                    <div align ='center'><a href="view_results.php">GO BACK</a></div>
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
    responsive: false,
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
        label: 'No. of Students',
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

                label: 'Marks',
                
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
            responsive: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                     scaleLabel: {
                        display:true,
                    labelString:'Marks'
                        }
                }],
                 xAxes: [ {
                    scaleLabel: {
                        display:true,
                    labelString:'Marks Compared to Other Students'}
          
        } ],

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
            responsive: false,
            scales: {
                yAxes: [{
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
                    labelString:'Marks Distribution'}
          
        } ],
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

}//if ends

}//for ends
include('include_root/footer.php');

?>



