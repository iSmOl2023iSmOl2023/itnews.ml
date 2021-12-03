	<?php 

if(!isset($_SESSION['login'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

	if(isset($_GET['edit_news'])){
		$edit_id = $_GET['edit_news'];
		$selet_user = "select * from news where id='$edit_id'";
		$run_select = mysqli_query($con,$selet_user);
		$row_select = mysqli_fetch_array($run_select);
		$title = $row_select['title'];
		$img = $row_select['img'];
		$announcement = $row_select['announcement'];
		$text = $row_select['text'];
		$author = $row_select['author'];
		$heading = $row_select['heading'];
		$date = $row_select['date'];
	}


							if(isset($_POST['edit'])){
								$title = $_POST['title'];
								$img = $_POST['img'];
								$announcement = $_POST['announcement'];
								$text = $_POST['text'];
								$author = $_POST['author'];								
								$heading = $_POST['heading'];
								$date = $_POST['date'];
								$update = "update news set title='$title', img='$img', announcement='$announcement', text='$text',author='$author',heading='$heading',date='$date'  where id='$edit_id'";

								$run_update = mysqli_query($con,$update);

								if($run_update){
									echo "<script>alert('Изминение успешно сохранино')</script>";
									echo "<script>window.open('index.php?wiev_news','_self')</script>";
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
							  <label class="control-label" for="typeahead">Загаловок </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="title" value="<?php echo  $title;?>">
							  </div>
							</div>
							 <div class="control-group">
							  <label class="control-label" for="typeahead">Фото </label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" id="typeahead" name="img" value="<?php echo  $img;?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Анонс</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="announcement" value="<?php echo  $announcement;?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">О вас </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="text" value="<?php echo  $text;?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Автор </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="author" value="<?php echo  $author;?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Рубрика </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="heading" value="<?php echo  $heading;?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Дата </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="date" value="<?php echo  $date;?>">
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

