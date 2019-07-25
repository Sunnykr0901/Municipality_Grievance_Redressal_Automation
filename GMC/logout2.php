<?php include 'master3.php' ?>

<?php startblock('body') ?>
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
	    <div class="row m-0">
	        <div class="col-sm-4">
	            <div class="page-header float-left">
	                <div class="page-title">
	                    <?php
	                    session_start();
	                    session_destroy();
	                    header('Location: login2.php');
	                    ?>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</div>
</div>

<?php endblock() ?>