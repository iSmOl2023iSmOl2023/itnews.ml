<?php 

if(!isset($_SESSION['login'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<div class="block" style="height: 600px">
		<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
<h1>Удалино новости</h1>
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
								  <th>Автор</th>
								  <th>Загаловок</th>
								  <th>Картинка</th>
								  <th>Анонс</th>
								  <th>Текст</th>					  
								  <th>Рубрика</th>
								  <th>Дата</th>
							  </tr>
						  </thead> 
						  <?php 

						  		$i = 0;

						  		$select = "select * from news  where `status`='yes'";

						  		$run_select = mysqli_query($con,$select);

						  		while($row_select = mysqli_fetch_array($run_select)){

						  			$id = $row_select['id'];

						  			$author = $row_select['author'];
						  			$title = $row_select['title'];
						  			$img = $row_select['img'];
						  			$announcement = $row_select['announcement'];
						  			$text = $row_select['text'];
						  			$heading = $row_select['heading'];
						  			$date = $row_select['date'];

						  			$i++;
						  		
						   ?>  
						  <tbody>
							<tr>
								<td><?php echo $i; ?></td>
								<td class="center"><?php echo $author; ?></td>
								<td class="center"><?php echo $title; ?></td>
								<td class="center"><?php echo $img; ?></td>
								<td class="center"><?php echo $announcement; ?></td>
								<td class="center">
									<span class="center"><?php echo $text; ?></span>
								</td>
								<td class="center">
									<span class="center"><?php echo $heading; ?></span>
								</td>
								<td class="center">
									<span class="center"><?php echo $date; ?></span>
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