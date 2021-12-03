<?php 

if(!isset($_SESSION['login'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<div class="block" style="height: 515px;">
	<h1>Доброе пожаловать!!!!</h1>
	<h1>Новостной сайт!!!!</h1>
	<h1>IT-NEWS.TJ!!!!</h1>
	
</div>

			<?php 

}

			 ?>