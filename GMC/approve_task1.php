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
    	<form action="approve_task1.php" method="post">
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
					            	if($row[3]==2){


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
					            <input type="submit" name="submit1" value="Approve"/>


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
						$l=0;
						$max=0;
						$query="SELECT * FROM dep_1 ";
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){
							$val="check".$row[0];
							$query_1="SELECT * FROM free_workers WHERE dep_no=1 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							if(($row[3]==2) &&(isset($_POST[$val]))){
								
								$usr=$row[1];
								$var=$row[2];
								if($var==1){
									$q1="UPDATE citizen SET c1=3 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_1 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									if($free>=5){

										$free=$free-5;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=1";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;

									}
									$sql2="UPDATE citizen SET q1='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_1 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
									
								}
								if($var==2){
									$q3="UPDATE citizen SET c2=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_1 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=3){
										$free=$free-3;
										$sql4="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=1";
										mysqli_query($link, $sql4);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else{
										$l=$max+1;
										$max=$l;
									}
									$sql5="UPDATE citizen SET q2='$l' WHERE username='$usr'";
									mysqli_query($link, $sql5);
									$sql6="UPDATE dep_1 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql6);
								}
								$counter++;
								header('Location:approve_task1.php');
							}
							else if ($row[3]==2) {
								$counter++;
							}
							if($row[3]==3){
								if($max<$row[4]){
									$max=$row[4];
								}
							}

						}

					}
					?>
					    	
    <div class="content">
    	<form action="approve_task1.php" method="post">
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
					            	if($row[3]==2){


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
					            <input type="submit" name="submit2" value="Approve"/>


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
						$l=0;
						$max=0;
						$query="SELECT * FROM dep_2 ";
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){
							$val="check".$row[0];
							$query_1="SELECT * FROM free_workers WHERE dep_no=2 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							if(($row[3]==2) &&(isset($_POST[$val]))){
								
								$usr=$row[1];
								$var=$row[2];
								if($var==1){
									$q1="UPDATE citizen SET c3=3 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_2 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									if($free>=7){

										$free=$free-7;
									
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q3='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_2 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								if($var==2){
									$q3="UPDATE citizen SET c4=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_2 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=3){

										$free=$free-3;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q4='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_2 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								if($var==3){
									$q3="UPDATE citizen SET c5=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_2 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=20){

										$free=$free-20;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q5='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_2 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								if($var==4){
									$q3="UPDATE citizen SET c6=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_2 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=5){

										$free=$free-5;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=2";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q6='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_2 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								$counter++;
								header('Location:approve_task1.php');
							}
							else if ($row[3]==2) {
								$counter++;
							}
							if($row[3]==3){
								if($max<$row[4]){
									$max=$row[4];
								}
							}
						}
					}
					?>
				
    <div class="content">
    	<form action="approve_task1.php" method="post">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sewage & Waste Management</strong>
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
					            	if($row[3]==2){


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
					            <input type="submit" name="submit3" value="Approve"/>


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
						$l=0;
						$max=0;
						$query="SELECT * FROM dep_3 ";
						
						$result=mysqli_query($link, $query);
						while($row=mysqli_fetch_array($result)){

							$val="check".$row[0];
							$query_1="SELECT * FROM free_workers WHERE dep_no=3 ";
							$result_1=mysqli_query($link, $query_1);
							while($row1=mysqli_fetch_array($result_1)){
								$free=$row1[2];
							}
							if(($row[3]==2) &&(isset($_POST[$val]))){
								echo "string";
								$usr=$row[1];
								$var=$row[2];
								if($var==1){
									
									$q1="UPDATE citizen SET c7=3 WHERE username='$usr'";
									mysqli_query($link, $q1);
									$q2="UPDATE dep_3 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q2);
									if($free>=5){

										$free=$free-5;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q7='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_3 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								if($var==2){
									$q3="UPDATE citizen SET c8=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_3 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=10){

										$free=$free-10;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q8='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_3 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								if($var==3){
									$q3="UPDATE citizen SET c9=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_3 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=7){

										$free=$free-7;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q9='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_3 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								if($var==4){
									$q3="UPDATE citizen SET c10=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_3 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=10){

										$free=$free-5;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q10='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_3 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								if($var==5){
									$q3="UPDATE citizen SET c11=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_3 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=4){

										$free=$free-4;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q11='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_3 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								if($var==6){
									$q3="UPDATE citizen SET c12=3 WHERE username='$usr'";
									mysqli_query($link, $q3);
									$q4="UPDATE dep_3 SET status=3 WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $q4);
									if($free>=6){

										$free=$free-6;
										
										$sql1="UPDATE free_workers SET no_of_free_workers=$free WHERE dep_no=3";
										mysqli_query($link, $sql1);
										$l=1;
										if($max<1){
											$max=1;
										}
									}
									else
									{
										$l=$max+1;
										$max=$l;
									}
									$sql2="UPDATE citizen SET q12='$l' WHERE username='$usr'";
									mysqli_query($link, $sql2);
									$sql3="UPDATE dep_3 SET queue_no='$l' WHERE username='$usr' and complaint_no='$var'";
									mysqli_query($link, $sql3);
								}
								$counter++;
								header('Location:approve_task1.php');
							}
							else if ($row[3]==2) {
								$counter++;
							}
							if($row[3]==3){
								if($max<$row[4]){
									$max=$row[4];
								}
							}
						}
					}
					?>

<?php endblock() ?>