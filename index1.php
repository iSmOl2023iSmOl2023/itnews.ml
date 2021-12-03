	<?php 
	include("db.php")
	 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<title>Новост</title>
		<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
</head>
<body style="background: yellow;">
	<h1 style="color:black; margin-left: 210px; font-weight: 700;">Новост</h1>
	<form method="post" enctype="multipart/form-data">
		<div class="block">
			<div class="container">
	<div class="col-md-6" style="height: 365px;margin-left: 30px;border: 8px solid black;
    width: 330px;text-align: center; border-radius: 15px;"><br>
		<label style="color: black;width: 110px;">Заглавие</label>
		<input type="text" name="title"><br>
		<label style="color: black; width: 110px;">Объявление</label>
		<input  type="text" name="announcement"><br>
		<label style="color: black; width: 110px;">Текст</label>
		<input  type="text" name="text"><br>
		<label style="color: black;width: 110px;">Авторы</label>		
		<input type="text" name="author"><br>
		<label style="color: black;width: 110px;">Заголовок</label>
		<input  type="text" name="heading"><br>		
		<input type="submit" name="add" style="width: 164px;height: 34px;border-radius: 15px;
    color: #868980;background: yellow; font-size: 17px;font-weight: 700;border: 3px solid black; margin-top: 15px;">
	</div>
	</form>
		<?php 
	if (isset($_POST['add'])) {

		$title = $_POST['title'];
		$announcement = $_POST['announcement'];
		$text = $_POST['text'];
		$author = $_POST['author'];
		$heading = $_POST['heading'];

		$insert_author = "insert into news(title,announcement,text,author,heading) values ('$title','$announcement','$text','$author','$heading')";
		$run_author = mysqli_query($con,$insert_author);
	
	 

	 if($run_author){
		echo "<script>alert(' Запрос принять!!!')</script>";
	}else{
		echo "<script>alert(' Запрос откланён!!!')</script>";
	}
	 }
?>
<div class="col-md-6" style="float:right;">
	 <table border="8" cellpadding="2">
        <h1 style="color:black; margin-left: 120px;margin-top: -52px;">Таблица Новости</h1>
        <tr bgcolor="#d8e4bc">
            <th bgcolor="#d8e4bc">№</th>
            <th bgcolor="#d8e4bc">Заглавие</th>
            <th bgcolor="#d8e4bc">Объявление</th>
            <th bgcolor="#d8e4bc">Текст</th>
            <th bgcolor="#d8e4bc">Авторы</th>
            <th bgcolor="#d8e4bc">Заголовок</th>
            <th bgcolor="#d8e4bc">Действия</th>
        </tr>
        					  <?php 
        					  $i = 0;
						  		$select = "select * from news";

						  		$run_select = mysqli_query($con,$select);

						  		while($row_select = mysqli_fetch_array($run_select)){

						  			$id = $row_select['id'];

						  			$title = $row_select['title'];
						  			$announcement = $row_select['announcement'];
						  			$text = $row_select['text'];
						  			$author = $row_select['author'];
						  			$heading = $row_select['heading'];
						  		$i++;
						   ?>  
        <tr>
        	<td bgcolor="#d8e4bc"><?php echo $id; ?></td>
        	<td><?php echo $title; ?></td>
        	<td><?php echo $announcement; ?></td>
        	<td><?php echo $text; ?></td>  
        	<td><?php echo $author; ?></td>
        	<td><?php echo $heading; ?></td>       	
        	<td class="center">
				<a class="btn btn-info" href="edit_author=<?php echo $id;?>">
						<i class="fa fa-edit"></i>  
					</a>
				<a class="btn btn-danger" href="delete_author=<?php echo $id;?>">
					<i class="fa fa-trash"></i> 
				</a>
			</td>
        </tr>
        <?php } ?>
    </table>
</div>
</div>
</div>
</body>
</html>