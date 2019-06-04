<?php
	include_once 'header.php';

	if ($_SESSION['Group'] == "administrator"){
		echo 'admin';
	}
	if ($_SESSION['Group'] == "moderator"){
		echo 'moder'; ?>
		<form action="/add.php" method="POST">
		<p>
			<p>Введите название</p>
			<input type="text" name="title" class="form-control">
		</p>

		<p>
			<p>Введите описание</p>
			<input type="text" name="opisanie" class="form-control">
		</p>

		<p>
			<p>Введите автора</p>
			<input type="text" name="avtor" class="form-control">
		</p>

		<p>
			<p>Введите дату выхода</p>
			<input type="date" name="date" class="form-control">
		</p>

		<p>
			<p>Вставьте ссылку на картинку</p>
			<input type="text" name="ssilka" class="form-control">
		</p>

		<p>
			<p>Вставьте id категории</p>
			<input type="number" min="1" max="<?php count_category_id() ?>" name="category" class="form-control">
		</p>

		<p>
			<button type="submit" name="send" class="btn btn-success">Добавить книгу</button>
		</p>
		</form>
		<?php
	}
	if ($_SESSION['Group'] == "user"){
		echo 'user';
	}
?>
<hr>
<h1><center>Ваши книги</center></h1>
<hr>
	<?php
        $posts = get_books_by_login($_SESSION['logged_user']);
        if ($posts[0] == "") exit();
    ?>
<main>
	<?php foreach ($posts as $post): ?>
		<?$book = get_post_by_id($post);?>
        <div class="col-md-3">
          <a href="/post.php?post_id=<?=$book['Id']?>">
            <img class="thumbnail" src="<?=$book['Image']?>" alt="">
          </a>
          <br>
          <br>
        </div>
    <?php endforeach; ?>
</main>
<?php
	include_once 'footer.php';
?>