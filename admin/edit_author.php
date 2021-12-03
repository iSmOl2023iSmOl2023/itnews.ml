	<?php 

if(!isset($_SESSION['login'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

	if(isset($_GET['edit_author'])){
		$edit_id = $_GET['edit_author'];
		$selet_user = "select * from author where id='$edit_id'";
		$run_select = mysqli_query($con,$selet_user);
		$row_select = mysqli_fetch_array($run_select);
		$fioauthor = $row_select['fioauthor'];
		$author_avatar = $row_select['author_avatar'];
		$author_date_birth = $row_select['author_date_birth'];
		$text1 = $row_select['text1'];
		$password1 = $row_select['password1'];
	}


							if(isset($_POST['edit'])){
								$fioauthor = $_POST['fioauthor'];
								$author_avatar = $_POST['author_avatar'];
								$author_date_birth = $_POST['author_date_birth'];
								$text1 = $_POST['text1'];
								$password1 = $_POST['password1'];
								$update = "update author set fioauthor='$fioauthor', author_avatar='$author_avatar', author_date_birth='$author_date_birth', text1='$text1', password1='$password1' where id='$edit_id'";

								$run_update = mysqli_query($con,$update);

								if($run_update){
									echo "<script>alert('Изминение успешно сохранино')</script>";
									echo "<script>window.open('index.php?wiev_author','_self')</script>";
								}
							}
?>
<?php } ?>

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
							  <label class="control-label" for="typeahead">Фио </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="fioauthor" value="<?php echo  $fioauthor;?>">
							  </div>
							</div>
							 <div class="control-group">
							  <label class="control-label" for="typeahead">Фото </label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" id="typeahead" name="author_avatar" value="<?php echo  $author_avatar;?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Дата рождения </label>
							  <div class="controls">
								<input type="date" class="span6 typeahead" id="typeahead" name="author_date_birth" value="<?php echo  $author_date_birth;?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">О вас </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="text1" value="<?php echo  $text1;?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Пароль </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="password1" value="<?php echo $password1;?>">
							  </div>
							</div>
						
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div><!--/span-->

			</div><!--/row-->

