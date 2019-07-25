<?php include 'master.php' ?>
<?php include 'connection.php' ?>
<?php
session_start();
 if($_SESSION['loggedin_citizen']==true){

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
    	<form action="track.php" method="post">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h1>Welcome&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username']; ?></h1></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
					            <thead>
                                        <tr>
                                            <th>Complains</th>
                                            <th>Status</th>
                                            <th>Queue Number</th>
                                            
                                        </tr>
                                    </thead>
					        <tbody>
					       
					        <?php
					            $username=$_SESSION['username'];
					           $query="SELECT * FROM citizen WHERE username='$username'";
								$result=mysqli_query($link, $query);
					            while($row = mysqli_fetch_array($result)) {
					            	 ?>
					                <tr>
					                	<?php if($row[5]>=1){?>
					                    <td><?php echo "Pipeline Blockage" ?></td>
					                    <?php if($row[5]==1 || $row[5]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[5]==3 || $row[5]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[17] ?></td>
					                <?php } ?>
					                <?php if($row[5]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[6]>=1){?>
					                    <td><?php echo "Pipeline Leakage" ?></td>
					                    <?php if($row[6]==1 || $row[6]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[6]==3 || $row[6]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[18] ?></td>
					                <?php } ?>
					                <?php if($row[6]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[7]>=1){?>
					                    <td><?php echo "Potholes" ?></td>
					                    <?php if($row[7]==1 || $row[7]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[7]==3 || $row[7]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[19] ?></td>
					                <?php } ?>
					                <?php if($row[7]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[8]>=1){?>
					                    <td><?php echo "Cleaning" ?></td>
					                    <?php if($row[8]==1 || $row[8]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[8]==3 || $row[8]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[20] ?></td>
					                <?php } ?>
					                <?php if($row[8]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[9]>=1){?>
					                    <td><?php echo "Reconstruction" ?></td>
					                    <?php if($row[9]==1 || $row[9]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[9]==3 || $row[9]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[21] ?></td>
					                <?php } ?>
					                <?php if($row[9]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[10]>=1){?>
					                    <td><?php echo "Speed breaker" ?></td>
					                    <?php if($row[10]==1 || $row[10]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[10]==3 || $row[10]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[22] ?></td>
					                <?php } ?>
					                <?php if($row[10]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[11]>=1){?>
					                    <td><?php echo "Manhole" ?></td>
					                    <?php if($row[11]==1 || $row[11]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[11]==3 || $row[11]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[23] ?></td>
					                <?php } ?>
					                <?php if($row[11]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[12]>=1){?>
					                    <td><?php echo "Drainage Leakage " ?></td>
					                    <?php if($row[12]==1 || $row[12]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[12]==3 || $row[12]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[24] ?></td>
					                <?php } ?>
					                <?php if($row[12]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[13]>=1){?>
					                    <td><?php echo "Drainage Cleaning" ?></td>
					                    <?php if($row[13]==1 || $row[13]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[13]==3 || $row[13]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[25] ?></td>
					                <?php } ?>
					                <?php if($row[13]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[14]>=1){?>
					                    <td><?php echo "Drainage Repair" ?></td>
					                    <?php if($row[14]==1 || $row[14]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[14]==3 || $row[14]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[26] ?></td>
					                <?php } ?>
					                <?php if($row[14]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[15]>=1){?>
					                    <td><?php echo "Dead Animal" ?></td>
					                    <?php if($row[15]==1 || $row[15]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[15]==3 || $row[15]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[27] ?></td>
					                <?php } ?>
					                <?php if($row[15]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>
					                 <tr>
					                	<?php if($row[16]>=1){?>
					                    <td><?php echo "Dustbin installation" ?></td>
					                    <?php if($row[16]==1 || $row[16]==2){?>
					                    <td><?php echo "Pending" ?></td>
					                     <td><?php echo "Not Allotted" ?></td>
					                <?php } ?>
					                <?php if($row[16]==3 || $row[16]==4){?>
					                    <td><?php echo "Approved" ?></td>
					                     <td><?php echo $row[28] ?></td>
					                <?php } ?>
					                <?php if($row[16]==5){?>
					                    <td><?php echo "Your Task is Completed" ?></td>
					                     <td><?php echo "Not Valid" ?></td>
					                <?php } ?>
					                <?php } ?>
					                </tr>

					            <?php
					            }
					            ?>
					            </tbody>
					            </table>
					            


					        </div>
					    </div>
					</div>
				</div>
			</div>
			</form>
			</div>
					   
					
					    	
   

<?php endblock() ?>
