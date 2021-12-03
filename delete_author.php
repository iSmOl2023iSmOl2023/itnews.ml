	<?php 

if(isset($_GET['delete_author'])){


		$delete_id = $_GET['delete_author'];

		$delete = "delete from author where id='$delete_id'";

		$run_delete = mysqli_query($con,$delete);

		 if($run_delete){
		 	echo "<script>alert('Успешно удалено')</script>";

		 	echo "<script>window.open('index2323.php','_self')</script>";
		 }
	}


?>

 
 