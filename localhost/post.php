<?php
$post_id = $_GET['post_id'];
//ЕСЛИ В POST_ID НЕ ЧИСЛА, ОСТАНОВИМ СКРИПТ
if (!is_numeric($post_id)) exit();
require_once 'header.php';
//получаем массив поста
$post = get_post_by_id($post_id);
?>

<content>
	<div class="container">
	    <div class="row">
	        <div class="col-md-9">
	            <div class="page-header">
	                <h1><?=$post['Title']?></h1>
	            </div>
	            <ul class="list-inline">
	                <li><a href="/category.php?id=<?=$post['Category_id']?>"><?=get_category_title($post['Category_id'])?></a> |
	                <li><?=$post['Date']?> дата выхода книги |
	                <li><?=$post['Author']?> автор
	            </ul>
	            <hr>
	            <div class="post-content">
	                <img class="thumbnail" src="<?=$post['Image']?>" alt="">
	                <hr>
	                Описание:
	                <br>
	                <br>
	                <?=$post['Content']?>
	                <hr>
	                <? 	                
	                $kupil = false;

	                $posts = get_books_by_login($_SESSION['logged_user']);
	                for ($i=0; $i < count($posts); $i++) {
	                	if ($posts[$i] == $_SESSION['idbook']){
	                		$kupil = true;
	                	}
	                }

	                if($post['kolvo'] == 0)
	                 echo "Нет в наличии!";
	                elseif ($kupil) {
	                 	echo "Книга уже есть в вашей библиотеке!";
	                 }
	                else{
	                 echo "В наличии ",$post['kolvo'];
	                 $_SESSION['idbook'] = $post_id; 
	                 echo '<br>';
	                 echo '<br>';
	                 echo '<form action="/read.php" method="POST">
	            	  	<button type="submit" class="btn btn-success">Читать</button>
	            	 	</form>';
	                }
	                ?>

	            </div>
	        </div>
	        <div class="col-md-3">

	        </div>
	    </div>
	</div>
</content>
<?php
	require_once 'footer.php';
?>