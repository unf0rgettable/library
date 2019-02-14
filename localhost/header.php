<?php
	require_once 'include/database.php';
	require_once 'include/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Сайт для нелюбимых одногруппников</title>
	<!-- Meta -->
	<meta charset="utf-8">	<!-- Этот тег указывает кодировку страницы -->
	<meta name="description" content="Описание страницы"> <!-- Описание страницы для поисковиков и сниппетов -->
	<meta name="keywords" content="ключевые слова, самый лучший сайт, серега лох">	<!-- Этот тег устанавливает ключевые слова для поиска -->
	<meta name="viewport" content="width=device-width, initial-scale=1">	<!-- Этот тег выравнивает сайт под ширину устройства -->
	<meta name="robots" content="index,follow">	<!-- Этот тег разрешает или запрещает роботу индексировать страницу или ходить по ссылкам на странице -->
	<meta name="nosnippets">	<!-- Указывает что у сайта нет сниппета -->
	<!-- Stiles -->
	<link rel="stylesheet" type="text/css" href="./CSS/style.css">
	<link rel="stylesheet" type="text/css" href="./CSS/bootstrap.css">	<!-- Этот тег подключает стили (можно использовать несколько раз) -->
	<link rel="shortcut icon" href="Image/favicon.ico">	<!-- Устанавливает картинку для вкладки -->
	<!-- Scripts -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>	<!-- Этот тег подключает библиотеки которые рассположены не на локальном компьтере (можно использовать несколько раз) -->
	<script type="text/javascript" src="JS/shapka.js"></script>
	<!-- <script type="text/javascript" src="bootstrap.min.js"></script> --><!-- Этот тег подключает JAVA скрипты (можно использовать несколько раз) -->
</head>
<body>
	<header id="menu">
		<a href="/"><div id="upper-menu">Библиотека им.Филимонова </div></a>
		<div id="lower-menu">
			<form  method="post" action="search.php?go"  id="searchform">
				<input type="text" size=100% name="Enter" placeholder="Что искать?" class="form-control" style="padding-left: 6px;">   <input  class="btn btn-primary" type="submit" name="submit" value="Search">
				<div id="login">
					<?php if (isset($_SESSION['logged_user'])) : ?>
						Вы вошли как : <a href="/cabinet.php?user_id=<?= $_SESSION['logged_user']?>"><?php echo $_SESSION['logged_user']?></a><a href="logout.php"> выйти </a>
					<?php else: ?>
						<a href="/login.php" class="btn btn-success"> Войти  </a>
						<a href="/signup.php"class="btn btn-success">Зарегистрироваться </a>
					<?php endif; ?> 
				</div>
			</form>
				
		</div>
	</header>