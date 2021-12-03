	<?php 
	include("db.php")
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
						<li><a href="author.php">Авторы </a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>	
	</header>
	<div class="img1"></div>

							<?php 

					if(isset($_GET['author_id'])){

					$id = $_GET['author_id'];
					$select = "select * from author where id='$id'";

						  		$run_select = mysqli_query($con,$select);

						  		while($row_select = mysqli_fetch_array($run_select)){

						  			$id = $row_select['id'];

						  			$fioauthor = $row_select['fioauthor'];
						  			$author_avatar = $row_select['author_avatar']; 
						  			$author_date_birth = $row_select['author_date_birth'];
						  			$text1 = $row_select['text1'];
						  		}
						  		?>
						  		<div class="block3" style=" background-color:#c3c3c3;">
						  		<div class="col-md-6" style="height: 300px;border-radius: 15px;border: 3rem solid #c3c3c3;">
					<div class="col-md-6">
						<img style="height:227px; width:189px; border-radius: 15px; margin-top:6px;" src="images/<?php echo $author_avatar;?>" class="img-responsive">
					</div>
					<div class="col-md-6" style="margin-top: 25px;">
						<h5><b>ФИО:</b><br><?php echo $fioauthor; ?></h5>
						<p><b>Текст:</b><br><?php echo $text1; ?><br></p>
						<p><b>Д.рождения:</b><br><?php echo $author_date_birth;	 ?></p>
					</div>
				</div>
				</div>
			<?php } ?>



	</body>
</html>