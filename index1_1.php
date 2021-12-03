	<?php 
	include("db.php")
	 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<title>Автор</title>
		<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
</head>
<body style="background: yellow;">
	<h1 style="color:black; margin-left: 210px;">Автор</h1>
	<form method="post" enctype="multipart/form-data">
		<div class="block">
			<div class="container">
	<div class="col-md-6" style="height: 400px;margin-left: 30px;border: 8px solid black;
    width: 310px;text-align: center;"><br>
		<label style="color: black; padding-top: 15px;">ФИО Автора</label><br><br>
		<input style="margin-left: 16px;" type="text" name="full_name_author"><br><br>
		<label style="color: black;">Аватар автора </label><br><br>
		<input style="margin-left: 16px;" type="file" name="author_avatar"><br><br>
		<label style="color: black;">Подпись автора </label><br><br>
		<input style="margin-left: 16px;" type="file" name="author_signature"><br><br>
		<input type="submit" name="add" style="width: 164px;height: 34px;border-radius: 15px;
    color: #868980;background: yellow; font-size: 17px;font-weight: 700;border: 3px solid black;">
	</div>
	</form>
		<?php 
	if (isset($_POST['add'])) {

		$full_name_author = $_POST['full_name_author'];

		//$author_avatar = $_POST['author_avatar'];
		$author_avatar = $_FILES['author_avatar']['name'];

					$tmp_name = $_FILES['author_avatar']['tmp_name'];

					move_uploaded_file($tmp_name, "images/$author_avatar");

		//$author_signature = $_POST['author_signature'];
		$author_signature = $_FILES['author_signature']['name'];

					$tmp_name = $_FILES['author_signature']['tmp_name'];

					move_uploaded_file($tmp_name, "images/$author_signature");

		$insert_author = "insert into author(full_name_author,author_avatar,author_signature) values ('$full_name_author','$author_avatar','$author_signature')";

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
        <h1 style="color:black; margin-left: 120px;margin-top: -52px;">Таблица Автора</h1>
        <tr bgcolor="#d8e4bc">
            <th bgcolor="#d8e4bc">№</th>
            <th bgcolor="#d8e4bc">ФИО Автора</th>
            <th bgcolor="#d8e4bc">Аватар автора</th>
            <th bgcolor="#d8e4bc">Подпись автора</th>
            <th bgcolor="#d8e4bc">Действия</th>
        </tr>
        					  <?php 
        					  $i = 0;
						  		$select = "select * from author";

						  		$run_select = mysqli_query($con,$select);

						  		while($row_select = mysqli_fetch_array($run_select)){

						  			$id = $row_select['id'];

						  			$full_name_author = $row_select['full_name_author'];
						  			$author_avatar = $row_select['author_avatar'];
						  			$author_signature = $row_select['author_signature'];
						  		$i++;
						   ?>  
        <tr>
        	<td bgcolor="#d8e4bc"><?php echo $id; ?></td>
        	<td><?php echo $full_name_author; ?></td>
        	<td><?php echo $author_avatar; ?><hr><img src="images/<?php echo $author_avatar;?>" class="myimage img-responsive" /></td>
        	<td><?php echo $author_signature; ?><hr><img src="images/<?php echo $author_signature;?>" class="myimage img-responsive" /></td>        	
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