<?php 

if(!isset($_SESSION['login'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

	if(isset($_GET['delete_author'])){

		$delete_id = $_GET['delete_author'];

		$update = "update author set status = 'yes' where id = '$delete_id'";

		$run_update = mysqli_query($con,$update);

		 if($run_update){
		 	echo "<script>alert('Успешно удалено')</script>";

		 	echo "<script>window.open('index.php?wiev_author','_self')</script>";
		 }
	}


?>




<?php }?>
