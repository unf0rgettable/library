<?php
	include_once 'header.php';
?>
	<content>
		<table width=100%>
			<td id="a1">
				<h1>Категории:<h1>
				<ul>
					<li><a href="/">Все категории</a></li>
					<?php foreach ($categories as $category): ?>
						<li><a href="/category.php?id=<?=$category['Id']?>"><?=$category['Title']?></a></li>
					<?php endforeach; ?>
				</ul>
			</td>
			<td id="a2">
				<h3><?=get_category_title($_GET['id'])?>:</h3>

			<?php
                $category_id = $_GET['id'];
                $posts = get_posts_by_category($category_id);
            ?>
	<?php foreach ($posts as $post): ?>
      <!-- Project One -->
      <div class="row">
        <div class="col-md-5">
          <a href="#">
            <img class="thumbnail" src="<?=$post['Image']?>" alt="">
          </a>
        </div>
        <div class="col-md-6">
          <h3><?=$post['Title']?></h3>
          <p><?=mb_substr($post['Content'], 0, 256, 'utf-8').'...'?></p>
          <a class="btn btn-primary" href="/post.php?post_id=<?=$post['Id']?>">View Book</a>
          <ul class="list-inline">
        	<li><?=$post['Author']?></li>
          </ul>
        </div>
      </div>
      <!-- /.row -->
      <hr>
    <?php endforeach; ?>
			</td>
			<td id="a3">
				<div class="well">
					<div class="form-group">
						<form action="/subscribe.php" method="post">
							<h3>Подпишись на новости!</h3>
							<input type="email" name="email" class="form-control" value="" placeholder="Введите ваш E-mail">
							<br>
							<button type="submit" class="btn btn-success">Подписаться</button>
						</form>
					</div>
				</div>
			</td>
		</table>
	</content>
<?php
	include_once 'footer.php';
?>