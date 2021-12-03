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
						<li><a href="heading.php">Рубрика </a></li>
						<li><a href="author.php">Авторы </a></li>
						<li><a href="regist.php">Регистрация </a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>	
	</header>
	<div class="img1"></div>
	<div class="block3">
		<div class="container">
			<div class="row">
					<h1><center>Автор</center></h1>
				<?php 
						  		$select = "select * from author order by id DESC limit 16";

						  		$run_select = mysqli_query($con,$select);

						  		while($row_select = mysqli_fetch_array($run_select)){

						  			$id = $row_select['id'];

						  			$fioauthor = $row_select['fioauthor'];
						  			$author_avatar = $row_select['author_avatar']; 
						  			$author_date_birth = $row_select['author_date_birth'];
						  			$text1 = $row_select['text1'];
						   ?>
				<div class="col-md-3" style="border-radius: 15px;border: 3px solid #efebe4;; background: #c3c3c3;">
					<div class="col-md-6">
						<a href="author1.php?author_id=<?php echo $id ;?>"><img style=" margin-top: 5px; width: 113px; height: 151px;" width="200" src="images/<?php echo $author_avatar;?>" class="img-responsive"></a>
					</div>
					<div class="col-md-6">
						<h5><b>ФИО:</b><br><?php echo substr("$fioauthor",0,10); ?></h5>
						<p><b>Текст:</b><br><?php echo substr("$text1",0,10); ?><br></p>
						<p><b>Д.рождения:</b><br><?php echo substr("$author_date_birth",0,10); ?></p>
					</div>
				</div>
			<?php } ?>
				
			</div>
		</div>
	</div>
</body>
</html>