<?php


include('includes/header.php');
 include('includes/navbar.php');





?>

	<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">VIEW FILE
                        </h4>
                        <hr>
						<?php

						if(isset($_GET['location']) && ($_GET['location']!="none" || $_GET['location']!="NAN"))
						{
							// echo $_GET['location'];
							$filepath=$_GET['location'];
							$filename=basename($filepath);
							$ext = pathinfo($filename, PATHINFO_EXTENSION);
							// echo $ext;
							?>
							
							<h1><?php echo $filename; ?></h1>

							<?php
							// echo $ext;
							$ext=trim($ext);
							// echo $ext;
							if($ext=="png" || $ext=="jpeg" || $ext=="gif" || $ext=="jpg")
							{
								?>
								<img src="<?php echo $filepath; ?>" alt="file" style="width:100%;height:auto">
								<?php
							}
							else if($ext=="doc")
							{
								// $docObj = new DocxConversion($filepath);
								//$docObj = new DocxConversion("test.docx");
								//$docObj = new DocxConversion("test.xlsx");
								//$docObj = new DocxConversion("test.pptx");
								// echo $docText= $docObj->convertToText();

								?>
								<iframe src="https://docs.google.com/gview?url=http://lms-kjsce.somaiya.edu/cas/<?php echo $filepath; ?>&embedded=true"></iframe>
								<?php
							}
							else
							{
								?>
								<embed src="<?php echo $filepath; ?>" width="100%" height="500px" />
								<?php
							}
						}
						else
						{

							?>

							<p>File not found.</p>

							<?php

						}

						?>
						<br>
                    </div><!-- card Body ends -->
                </div><!-- card ends -->
            </div><!-- col ends -->
        </div><!-- main row ends -->
    </div><!-- content-wrapper ends -->

    <?php 
include("includes/footer.php");
?>