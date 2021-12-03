<?php 

if(!isset($_SESSION['login'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<div class="block" style="height: 550px">
		<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>№</th>
								  <th>ФИО</th>
								  <th>Аватар автора</th>
								  <th>Дата рождения</th>
								  <th>текст</th>
								  <th>Пароль</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  <?php 

						  		$i = 0;

						  		$select = "select * from author where `status`=''";

						  		$run_select = mysqli_query($con,$select);

						  		while($row_select = mysqli_fetch_array($run_select)){

						  			$id = $row_select['id'];

						  			$fioauthor = $row_select['fioauthor'];
						  			$author_avatar = $row_select['author_avatar'];
						  			$author_date_birth = $row_select['author_date_birth'];
						  			$text1 = $row_select['text1'];
						  			$password1 = $row_select['password1'];

						  			$i++;
						  		
						   ?>  
						  <tbody>
							<tr>
								<td><?php echo $i; ?></td>
								<td class="center"><?php echo $fioauthor; ?></td>
								<td class="center"><?php echo $author_avatar; ?></td>
								<td class="center"><?php echo $author_date_birth; ?></td>
								<td class="center"><?php echo $text1; ?></td>
								<td class="center">
									<span class="label label-success"><?php echo $password1; ?></span>
								</td>
								<td class="center">
									<a class="btn btn-info" href="index.php?edit_author=<?php echo $id;?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="index.php?delete_author=<?php echo $id;?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						  </tbody>
						<?php } ?>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

</div>








<?php } ?>