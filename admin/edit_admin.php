	<?php 

if(!isset($_SESSION['login'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

	if(isset($_GET['edit_admin'])){

		$edit_id = $_GET['edit_admin'];

		$selet_admin = "select * from admin where id='$edit_id'";

		$run_select = mysqli_query($con,$selet_admin);

		$row_select = mysqli_fetch_array($run_select);

		$login = $row_select['login'];

		$password = $row_select['password'];
	}

?>
<div class="block" style="height: 550px">
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">login </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="name" value="<?php echo  $login;?>">
							  </div>
							</div>
							 
							<div class="control-group">
							  <label class="control-label" for="typeahead">Password </label>
							  <div class="controls">
								<input type="text" class="span typeahead" id="typeahead" name="password" value="<?php echo $password;?>">
							  </div>
							</div>
						
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
						<?php 


							if(isset($_POST['edit'])){

								$login = $_POST['name'];

								$password = $_POST['password'];

								$update = "update admin set login='$login',password='$password' where id='$edit_id'";

								$run_update = mysqli_query($con,$update);

								if($run_update){
									echo "<script>alert('Изминение успешно сохранино')</script>";
									echo "<script>window.open('index.php?wiev_admin','_self')</script>";
								}else{
									echo "<script>alert('Неудалось измениь')</script>";
								}
							}


						 ?>
					</div>
				</div><!--/span-->

			</div><!--/row-->
</div>
<?php } ?>