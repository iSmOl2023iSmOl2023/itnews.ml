	<?php 

if(!isset($_SESSION['login'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

	if(isset($_GET['delete_admin'])){

		$delete_id = $_GET['delete_admin'];

		$delete = "delete from user where id='$delete_id'";

		$run_delete = mysqli_query($con,$delete);

		 if($run_delete){
		 	echo "<script>alert('Успешно удалено')</script>";

		 	echo "<script>window.open('index.php?wiev_admin','_self')</script>";
		 }
	}


?>




<?php }?>
 
 