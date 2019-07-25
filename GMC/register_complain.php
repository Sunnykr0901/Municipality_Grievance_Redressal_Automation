<?php include 'master.php' ?>
<?php include 'connection.php' ?>
<?php
session_start();
 if($_SESSION['loggedin_citizen']==true){

}
else{
	header('Location:homepage.php');
} ?>

<?php startblock('body') ?>
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
	    <div class="row m-0">
	        <div class="col-sm-4">
	            <div class="page-header float-left">
	                <div class="page-title">
	                    	<!DOCTYPE html>
								<html>
								<head>
								
								<link rel="stylesheet" href="css/php_checkbox.css" />
								</head>
								<body>
								<div class="container">
								<div class="main">
								<h2>Water Supply</h2>
								<form action="register_complain.php" method="post"></br>
								
								<input type="checkbox" name="check1" value="t1">Pipeline Blockage</br>
								<input type="checkbox" name="check2" value="t2">Pipeline Leakage</br></br>
								<h2>Road Management</h2></br>
								
								
								<input type="checkbox" name="check3" value="t3">Potholes</br>
								<input type="checkbox" name="check4" value="t4">Cleaning</br>
								<input type="checkbox" name="check5" value="t5">Reconstruction</br>
								<input type="checkbox" name="check6" value="t6">Speed breaker</br></br>
								<h2>Sewage & Waste Management</h2></br>
								
								
								<input type="checkbox" name="check7" value="t7">Manhole</br>
								<input type="checkbox" name="check8" value="t8">Drainage Leakage </br>
								<input type="checkbox" name="check9" value="t9">Drainage Cleaning </br>
								<input type="checkbox" name="check10" value="t10">Drainage Repair</br>
								<input type="checkbox" name="check11" value="t11">Dead Animal </br>
								<input type="checkbox" name="check12" value="t12">Dustbin installation </br></br>
								<input type="submit" name="submit" value="submit"/>
								<!----- Including PHP Script ----->
								</form>
								</div>
								</div>
								</body>
								</html>
								<?php
									if(isset($_POST['submit'])){
										$username=$_SESSION['username'];
										$query="SELECT * FROM citizen WHERE username = '$username'";
										$result=mysqli_query($link, $query);
										
 
									    while($row=mysqli_fetch_row($result))
									    {
									        $c1=$row[5];
									        $c2=$row[6];
									        $c3=$row[7];
									        $c4=$row[8];
									        $c5=$row[9];
									        $c6=$row[10];
									        $c7=$row[11];
									        $c8=$row[12];
									        $c9=$row[13];
									        $c10=$row[14];
									        $c11=$row[15];
									        $c12=$row[16];
									        $c13=$row[17];
									      
									    }
										
										if(isset($_POST['check1'])){
											if($c1==0 || $c1==5){
												$query1="INSERT INTO dep_1 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',1,1,0)";  
												mysqli_query($link, $query1);
												$q1="UPDATE citizen SET c1=1 WHERE username='$username'";
												mysqli_query($link, $q1);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("Complain:Pipeline Blockage is already registered")';
													echo '</script>';
											}
											
										}

										if(isset($_POST['check2'])){
											if($c2==0 || $c2==5){
												$query2="INSERT INTO dep_1 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',2,1,0)";  
												mysqli_query($link, $query2);
												$q2="UPDATE citizen SET c2=1 WHERE username='$username'";
												mysqli_query($link, $q2);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Pipeline Leakage already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check3'])){
											if($c3==0 || $c3==5){
												$query3="INSERT INTO dep_2 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',1,1,0)";  
												mysqli_query($link, $query3);
												$q3="UPDATE citizen SET c3=1 WHERE username='$username'";
												mysqli_query($link, $q3);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Potholes already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check4'])){
											if($c4==0 || $c4==5){
												$query4="INSERT INTO dep_2 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',2,1,0)";  
												mysqli_query($link, $query4);
												$q4="UPDATE citizen SET c4=1 WHERE username='$username'";
												mysqli_query($link, $q4);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Cleaning already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check5'])){
											if($c5==0 || $c5==5){
												$query5="INSERT INTO dep_2 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',3,1,0)";  
												mysqli_query($link, $query5);
												$q5="UPDATE citizen SET c5=1 WHERE username='$username'";
												mysqli_query($link, $q5);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Reconstruction already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check6'])){
											if($c6==0 || $c6==5){
												$query6="INSERT INTO dep_2 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',4,1,0)";  
												mysqli_query($link, $query6);
												$q6="UPDATE citizen SET c6=1 WHERE username='$username'";
												mysqli_query($link, $q6);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Speed breaker already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check7'])){
											if($c7==0 || $c7==5){
												$query7="INSERT INTO dep_3 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',1,1,0)";  
												mysqli_query($link, $query7);
												$q7="UPDATE citizen SET c7=1 WHERE username='$username'";
												mysqli_query($link, $q7);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Manhole already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check8'])){
											if($c8==0 || $c8==5){
												$query8="INSERT INTO dep_3 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',2,1,0)";  
												mysqli_query($link, $query8);
												$q8="UPDATE citizen SET c8=1 WHERE username='$username'";
												mysqli_query($link, $q8);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Drainage Leakage already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check9'])){
											if($c9==0 || $c9==5){
												$query9="INSERT INTO dep_3 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',3,1,0)";  
												mysqli_query($link, $query9);
												$q9="UPDATE citizen SET c9=1 WHERE username='$username'";
												mysqli_query($link, $q9);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Drainage Cleaning already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check10'])){
											if($c10==0 || $c10==5){
												$query10="INSERT INTO dep_3 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',4,1,0)";  
												mysqli_query($link, $query10);
												$q10="UPDATE citizen SET c10=1 WHERE username='$username'";
												mysqli_query($link, $q10);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Drainage Repair already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check11'])){
											if($c11==0 || $c11==5){
												$query11="INSERT INTO dep_3 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',5,1,0)";  
												mysqli_query($link, $query11);
												$q11="UPDATE citizen SET c11=1 WHERE username='$username'";
												mysqli_query($link, $q11);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Dead Animal already registered")';
													echo '</script>';
											}
											
										}
										if(isset($_POST['check12'])){
											if($c12==0 || $c12==5){
												$query12="INSERT INTO dep_3 (username,complaint_no,status,queue_no) VALUES ( '". $_SESSION['username'] ."',6,1,0)";  
												mysqli_query($link, $query12);
												$q12="UPDATE citizen SET c12=1 WHERE username='$username'";
												mysqli_query($link, $q12);
												
											}
											else{
													echo '<script language="javascript">';
													echo 'alert("complain:Dustbin installation already registered")';
													echo '</script>';
											}
											
										}
									}
								?>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</div>
</div>

<?php endblock() ?>