<?php
	include_once 'header.php';

	$data = $_POST;
	if(isset($data['do_login'])){
		$errors = array();

		$login = $data['login'];
		if(search_login($login)){
			{
				if(password_verify($data['password'], search_password_by_Login($login))){
					$_SESSION['logged_user'] = $login;
					$_SESSION['Group'] = search_group_by_Login($login);
					echo '<div style="color: green;">Вы успешно Вошли! Можете перейти на <a href="/">главную</a> страницу</div><hr>';
				}
				else{
					$errors[] = 'Пароль введен неверно!';
				}
			}
		}
		else{
			$errors[] = 'Пользователя с таким логином не существует!';
		}

		if(empty($errors)){

		}
		else{
			echo '<div style="color: red">'.array_shift($errors).'</div><hr>';
		}
	}
?>
<login>
	<form action="/login.php" method="POST">
		
		
		<p>
			<p>Ваш логин</p>
			<input type="text" name="login" class="form-control" value="<?php echo @$data['login']; ?>">
		</p>

		<p>
			<p>Ваш пароль</p>
			<input type="password" name="password" class="form-control" value="<?php echo @$data['password']; ?>">
		</p>

		<p>
			<button type="submit" name="do_login" class="btn btn-success">Войти</button>
		</p>
	</form>
</login>
<?php
	include_once 'footer.php';
?>