<?php 
		session_start();
	include("db.php");
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
	<div class="img"></div>
<div class="block1" style="background:#efebe4; margin-top:-15px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><center>Новости</center></h1>
			</div>
			<?php 
						  		$select = "select * from news order by id DESC limit 16";

						  		$run_select = mysqli_query($con,$select);

						  		while($row_select = mysqli_fetch_array($run_select)){

						  			$id = $row_select['id'];

						  			$title = $row_select['title'];
						  			$img = $row_select['img']; 
						  			$announcement = $row_select['announcement'];
						  			$text = $row_select['text'];
						  			$heading = $row_select['heading'];
						  			$date = $row_select['date'];
						  			
						   ?>

						   <div style="background:#337ab7; color: white; border-radius: 15px; border: 2px solid #efebe4;" class="col-md-3">						   
					<h4><b>Загаловок: </b><?php echo substr("$title",0,25); ?></h4>
						<a href="news1.php?news_id=<?php echo $id ;?>"><img  style="width:350px; height: 120px; border-radius: 10px;" src="images/<?php echo $img;?>" class="myimage img-responsive"/></a>
				<h5><b>Анонс: </b><?php echo substr("$announcement",0,35); ?></h5>
				<h5><b>Текст: </b><?php echo substr("$text",0,60); ?></h5>
					<h5><b>Дата: </b><?php echo substr("$date",0,25); ?></h5>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>