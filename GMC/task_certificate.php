<?php include 'master3.php' ?>
<?php include 'connection.php' ?>
<?php
session_start();
 if($_SESSION['loggedin_s']==true){

}
else{
	header('Location:homepage.php');
} ?>

<?php startblock('head') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<?php endblock() ?>


<?php startblock('body') ?>


    <div class="content">
    	<form action="task_certificate.php" method="post">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Water Supply</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
					            <thead>
                                        <tr>
                                            <th>Users</th>
                                            <th>Complains</th>
                                            
                                        </tr>
                                    </thead>
					        <tbody>
					       
					        <?php
					            
					            $i=0;
					           $query="SELECT * FROM dep_1 LIMIT 100";
										$result=mysqli_query($link, $query);
					            while($row = mysqli_fetch_array($result)) {
					            	if(($row[3]==4) && ($row[4]==1)){


					            ?>
					                <tr>

					                    <td><?php echo $row[1]?></td>
					                    <?php if($row[2]==1){?>
					                    <td><?php echo "Pipeline Blockage" ?></td>
					                <?php } ?>
					                    <?php if($row[2]==2){?>
					                    <td><?php echo "Pipeline Leakage" ?></td>
					                <?php } ?>
					                    <td><input type="checkbox" <?php echo "name=\"check".$row[0]."\""; ?> value="task"></td>
					                    
					                </tr>

					            <?php
					            $i++;
					        }
					            }
					            ?>
					            </tbody>
					            </table>
					            <input type="submit" name="submit1" value="Issue Certificate"/>


					        </div>
					    </div>
					</div>
				</div>
			</div>
			</form>
			</div>
					   
					<?php

					if(isset($_POST['submit1'])){
						$counter=0;
						
						$query="SELECT * FROM dep_1 ";
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){
							$val="check".$row[0];
							$query_1="SELECT * FROM free_workers WHERE dep_no=1 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							
							if(($row[3]==4) && ($row[4]==1) &&(isset($_POST[$val]))){
								
								$usr=$row[1];
								$var=$row[2];
								if($var==1){
									$q1="UPDATE citizen SET c1=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+5;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=1";
									mysqli_query($link, $q3);
									
								}
								if($var==2){
									$q4="UPDATE citizen SET c2=5 WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="DELETE FROM dep_1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									$free=$free+3;
									$q6="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=1";
									mysqli_query($link, $q6);
									
								}
								$counter++;
								header('Location:task_certificate.php');
							}
							else if ($row[3]==4) {
								$counter++;
							}
							

						}
						$i=0;
						$query="SELECT * FROM dep_1 ";
						
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){
							$query_1="SELECT * FROM free_workers WHERE dep_no=1 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							if(($row[3]==3 || $row[3]==4) && ($row[4]>1)){
								$usr=$row[1];
								$var=$row[2];
								$que=$row[4];
								if($var==1){
									if($free>=5){
									$q1="UPDATE citizen SET q1=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_1 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-5;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=1";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q1=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_1 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==2){
									if($free>=3){
									$q1="UPDATE citizen SET q2=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_1 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-3;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=1";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q2=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_1 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
							}
						}

					}
					?>
					    	
    <div class="content">
    	<form action="task_certificate.php" method="post">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Road Management</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
					            <thead>
                                        <tr>
                                            <th>Users</th>
                                            <th>Complains</th>
                                        </tr>
                                    </thead>
					        <tbody>
					       
					        <?php
					            
					            $i=0;
					           $query="SELECT * FROM dep_2 LIMIT 100";
										$result=mysqli_query($link, $query);
					            while($row = mysqli_fetch_array($result)) {
					            	if(($row[3]==4) && ($row[4]==1)){


					            ?>
					                <tr>

					                    <td><?php echo $row[1]?></td>
					                    <?php if($row[2]==1){?>
					                    <td><?php echo "Potholes" ?></td>
					                <?php } ?>
					                <?php if($row[2]==2){?>
					                    <td><?php echo "Cleaning" ?></td>
					                <?php } ?>
					                <?php if($row[2]==3){?>
					                    <td><?php echo "Reconstruction" ?></td>
					                <?php } ?>
					                <?php if($row[2]==4){?>
					                    <td><?php echo "Speed breaker" ?></td>
					                <?php } ?>
					                    <td><input type="checkbox" <?php echo "name=\"check".$row[0]."\""; ?> value="task"></td>
					                    
					                </tr>

					            <?php
					            $i++;
					        }
					            }
					            ?>
					            </tbody>
					            </table>
					            <input type="submit" name="submit2" value="Issue Certificate"/>


					        </div>
					    </div>
					</div>
				</div>
			</div>
			</form>
			</div>
					<?php

					if(isset($_POST['submit2'])){
						$counter=0;
						
						$query="SELECT * FROM dep_2 ";
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){
							$val="check".$row[0];
							$query_1="SELECT * FROM free_workers WHERE dep_no=2 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							if(($row[3]==4) && ($row[4]==1) &&(isset($_POST[$val]))){
								
								$usr=$row[1];
								$var=$row[2];
								if($var==1){
									$q1="UPDATE citizen SET c3=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_2 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+7;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
									mysqli_query($link, $q3);
									
								}
								if($var==2){
									$q1="UPDATE citizen SET c4=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_2 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+3;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
									mysqli_query($link, $q3);
									
								}
								if($var==3){
									$q1="UPDATE citizen SET c5=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_2 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+20;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
									mysqli_query($link, $q3);
									
								}
								if($var==4){
									$q1="UPDATE citizen SET c6=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_2 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+5;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
									mysqli_query($link, $q3);
									
								}
								$counter++;
								header('Location:task_certificate.php');
							}
							else if ($row[3]==4) {
								$counter++;
							}
							
						}
						$i=0;
						$query="SELECT * FROM dep_2 ";
						
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){
							$query_1="SELECT * FROM free_workers WHERE dep_no=2 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							if(($row[3]==3 || $row[3]==4) && ($row[4]>1)){
								$usr=$row[1];
								$var=$row[2];
								$que=$row[4];
								if($var==1){
									if($free>=7){
									$q1="UPDATE citizen SET q3=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_2 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-7;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q3=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_2 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==2){
									if($free>=3){
									$q1="UPDATE citizen SET q4=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_2 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-3;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q4=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_2 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==3){
									if($free>=20){
									$q1="UPDATE citizen SET q5=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_2 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-20;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q5=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_2 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==4){
									if($free>=5){
									$q1="UPDATE citizen SET q6=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_2 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-5;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q6=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_2 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
							}
						}

					}
					?>
				
    <div class="content">
    	<form action="task_certificate.php" method="post">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sewage & Waste Management </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
					            <thead>
                                        <tr>
                                            <th>Users</th>
                                            <th>Complains</th>
                                            
                                        </tr>
                                    </thead>
					        <tbody>
					       
					        <?php
					            
					            $i=0;
					           $query="SELECT * FROM dep_3 LIMIT 100";
										$result=mysqli_query($link, $query);
					            while($row = mysqli_fetch_array($result)) {
					            	if(($row[3]==4) && ($row[4]==1)){


					            ?>
					                <tr>

					                    <td><?php echo $row[1]?></td>
					                   <?php if($row[2]==1){?>
					                    <td><?php echo "Manhole" ?></td>
					                <?php } ?>
					                 <?php if($row[2]==2){?>
					                    <td><?php echo "Drainage Leakage" ?></td>
					                <?php } ?>
					                 <?php if($row[2]==3){?>
					                    <td><?php echo "Drainage Cleaning" ?></td>
					                <?php } ?>
					                 <?php if($row[2]==4){?>
					                    <td><?php echo "Drainage Repair" ?></td>
					                <?php } ?>
					                 <?php if($row[2]==5){?>
					                    <td><?php echo "Dead Animal" ?></td>
					                <?php } ?>
					                 <?php if($row[2]==6){?>
					                    <td><?php echo "Dustbin installation" ?></td>
					                <?php } ?>
					                    <td><input type="checkbox" <?php echo "name=\"check".$row[0]."\""; ?> value="task"></td>
					                    
					                </tr>

					            <?php
					            $i++;
					        }
					            }
					            ?>
					            </tbody>
					            </table>
					            <input type="submit" name="submit3" value="Issue Certificate"/>


					        </div>
					    </div>
					</div>
				</div>
			</div>
			</form>
			</div>
					    
					<?php

					if(isset($_POST['submit3'])){
						$counter=0;
					
						$query="SELECT * FROM dep_3 ";
						
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){

							$val="check".$row[0];
							$query_1="SELECT * FROM free_workers WHERE dep_no=3 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							
							if(($row[3]==4) && ($row[4]==1) &&(isset($_POST[$val]))){
								
								$usr=$row[1];
								$var=$row[2];
								if($var==1){
									$q1="UPDATE citizen SET c7=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+5;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
								}
								if($var==2){
									$q1="UPDATE citizen SET c8=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+10;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
								}
								if($var==3){
									$q1="UPDATE citizen SET c9=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+7;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
									
								}
								if($var==4){
									$q1="UPDATE citizen SET c10=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+10;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
									
								}
								if($var==5){
									$q1="UPDATE citizen SET c11=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+4;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
								}
								if($var==6){
									$q1="UPDATE citizen SET c12=5 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="DELETE FROM dep_3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free+6;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
								}
								$counter++;
								header('Location:task_certificate.php');
							}
							else if ($row[3]==4) {
								$counter++;
							}
							
						}
						$i=0;
						$query="SELECT * FROM dep_3 ";
						
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){
							$query_1="SELECT * FROM free_workers WHERE dep_no=3 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							if(($row[3]==3 || $row[3]==4) && ($row[4]>1)){
								$usr=$row[1];
								$var=$row[2];
								$que=$row[4];
								if($var==1){
									if($free>=5){
									$q1="UPDATE citizen SET q7=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_3 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-5;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q7=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_3 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==2){
									if($free>=3){
									$q1="UPDATE citizen SET q8=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_3 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-3;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q8=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_3 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==3){
									if($free>=7){
									$q1="UPDATE citizen SET q9=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_3 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-7;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q9=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_3 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==4){
									if($free>=10){
									$q1="UPDATE citizen SET q10=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_3 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-10;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q10=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_3 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==5){
									if($free>=4){
									$q1="UPDATE citizen SET q11=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_3 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-4;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q11=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_3 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
								if($var==6){
									if($free>=6){
									$q1="UPDATE citizen SET q12=1 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_3 SET queue_no=1 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									$free=$free-6;
									$q3="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
									mysqli_query($link, $q3);
										$i++;
									}
									else{
										$que=$que-$i;
									$q4="UPDATE citizen SET q12=$que WHERE username='$usr'";
									mysqli_query($link, $q4);
									$q5="UPDATE dep_3 SET queue_no=$que WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q5);
									}
								}
							}
						}

					}
					?>

<?php endblock() ?>