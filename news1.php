	<?php 
	include("db.php");
	//Добавить новости
	

	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>News</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<body style="background:#efebe4;">
	<header>
		<nav>
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<button class="navbar-toggle collapsed menu_btn" data-toggle="collapse" data-target="#top_menu">
							<div class="as"></div>
							<div class="as"></div>
							<div class="as"></div>	
						</button>

						<a href="index.php" class="navbar-brand logo">
							<h3 style="font-weight: 700;">IT-NEWS</h3>
						</a>
					</div>
					<div class="collapse navbar-collapse navbar-right"id="top_menu">
						<ul class="menu">
						<li><a href="index.php">Главный</a></li>
						<li><a href="news.php">Новости</a></li>
						<li><a href="heading.php">Рубрика </a></li>
						<li><a href="author.php">Авторы </a></li>

						</ul>
					</div>
				</div>
			</div>
		</nav>	
	</header>
	<div class="img"></div>
<div class="block2" style="margin-bottom: 20px;">
	<div class="container">
		<div class="row">
				
				<h1 style="margin-left: 25px;">Добавить новости</h1>
				<div style="border: 5px solid black; padding: 30px; width: 350px;">	
			
				  <form method="post" enctype="multipart/form-data">     

					<label style="width:80px;">Заголовок: </label>
					<input type="text" name="title"><br><br>
		<div class="example-2">
    				<input type="file" name="img" id="file" class="input-file" required class="mom">
    				<label for="file" class="btnm btnm-tertiary js-labelFile">
      				<center style="margin-top:-2px;">Фото</center>
   					 </label>
 				<div><br>
					<label style="width:80px;">Анонс: </label>
					<input type="text" name="announcement"><br><br>
					<label style="width:80px;">Текст: </label>
					<input type="text" name="text"><br><br>
					<label style="width:80px;">Рубрика: </label>
					<input type="text" name="heading"><br><br>
					<label style="width:80px;">Дата: </label>
					<input type="date" name="date"><br><br>
					<input type="submit" name="add" style="width: 164px;height: 34px;border-radius: 15px;
    color: #000; font-size: 17px;font-weight: 700;border: 3px solid black; margin-left:20%;">
			</form>
			<?php
			if(isset($_POST['add'])) {

		$title = $_POST['title'];
		  $img = $_FILES['img']['name'];

	          $tmp_name = $_FILES['img']['tmp_name'];

	          move_uploaded_file($tmp_name, "images/$img");
		$announcement = $_POST['announcement'];
		$text = $_POST['text'];
		$heading = $_POST['heading'];
		$date = $_POST['date'];
		$insert = "insert into news(title,img,announcement,text,heading,date,status) values ('$title','$img','$announcement','$text','$heading','$date','')";
		$run_insert = mysqli_query($con,$insert);
	
	 

	 if($run_insert){
		echo "<script>alert(' Запрос принять!!!')</script>";
	}else{
		echo "<script>alert(' Запрос откланён!!!')</script>";
	}
	 }

			 ?>
				</div>

				</div>
		</div>
	</div>
</div>



</body>
</html>