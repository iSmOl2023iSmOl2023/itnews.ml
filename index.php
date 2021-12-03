<?php
	session_start();
	include("db.php");
 
 	// registration
			 if(isset($_POST['add'])){
			$fioauthor = $_POST['fioauthor'];	
	    $author_avatar = $_FILES['author_avatar']['name'];
	    $tmp_name = $_FILES['author_avatar']['tmp_name'];
	    move_uploaded_file($tmp_name, "images/$author_avatar");
			$author_date_birth = $_POST['author_date_birth'];	
			$text1 = $_POST['text1'];	
			$password1 = $_POST['password1'];			
			$insert = "insert into author (fioauthor, author_avatar, author_date_birth, text1, password1, status) values ('$fioauthor','$author_avatar', '$author_date_birth', '$text1', '$password1', '')";
			$run_insert = mysqli_query($con, $insert);
 			if($run_insert){
  		echo "<script>alert(' Запрос принять!!!')</script>";
			}else{
  		echo "<script>alert(' Запрос откланён!!!')</script>";
			}
				}

	// auth
	if(isset($_POST['loged'])){
					
			$fioauthor = $_POST['fioauthor'];
			$password1 = $_POST['password1'];
			$select = "select * from author where fioauthor='$fioauthor' AND password1='$password1'";
			$run_select = mysqli_query($con,$select);
			$count = mysqli_num_rows($run_select);
			if($count == 1){
				$_SESSION['fioauthor']=$fioauthor;
			}else{
				echo "<script>alert('Логин ва парол хато')</script>";
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>News</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="libs/bootstrap/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css" />
  <link rel="shortcut icon" href="#" />
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
						<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Регистрация
            </button></li>
            
	 								<li>
	 								<?php 
	 									if (isset($_SESSION['fioauthor'])) {
	 									 		echo $_SESSION['fioauthor'];
	 									 echo '<li><a href="news1.php"><button type="button" class="btn btn-danger">Добавить новость</button></a></li>';
	 									 }
	 									  ?>
	 								</li>	
 							
						</ul>
					</div>
				</div>
			</div>
		</nav>	
	</header>
<div class="img"></div>
<!-- Большие модальное окно -->
<!-- Кнопка запуска модального окна -->


<!-- Модальное окно -->


<div class="blockf">
	<div class="container">
		<div class="row">
			<h1><center>Добро пожаловать</center></h1>
			<div class="col-md-6">
					<a href="news.php">
				<img style="width:100%; height:150px;" src="images/news.png" class="img-responsive">
				<center><h2>Наши Новости</h2></center>
				</a>
			</div>
			<div class="col-md-6">
				<a href="author.php">
				<img style="width:100%; height:150px;" src="images/avtor.jpg" class="img-responsive">
				<center><h2>Наши Автори</h2></center>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
      </div>
        <div class="container-fluid">

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#description">Регистрация</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#characteristics">Вход</a>
      </li>
    </ul>
  <div class="tab-content">
     <div class="tab-pane active" id="description">
        <form method="post" enctype="multipart/form-data">     
         <label>Фио</label><br>
         <input type="text" name="fioauthor"><br>
         <label>Выберите фото</label><br>
         <input type="file" name="author_avatar"><br>
         <label>Дата рождения</label><br>
         <input type="date" name="author_date_birth"><br>
         <label>О себе</label><br>
         <input type="text" name="text1"><br>
         <label>Пароль</label><br>
         <input type="password" name="password1"><br><br>
        <input type="submit" name="add" class="btn btn-primary">   
			 </form>		
</div>
      <div class="tab-pane" id="characteristics">
        <h2 class="h4">Вход</h2>
        <form method="post">
        	<label>ФИО</label><br>
        	<input type="text" name="fioauthor"><br>
        	<label>Пароль</label><br>
        	<input type="password" name="password1"><br><br>
        	<button class="btn btn-danger" name="loged">Вход</button>
        </form>
      </div>	

      </div>
    </div>
  </div>
</div>
</div>



</body>
</html>