<?php
	include_once 'header.php';

	$data = $_POST;
	if(isset($data['do_signup'])){

		$errors = array();
		if(trim($data['login']) == ''){
			$errors[] = 'Введите логин!';
		}
		if(trim($data['email']) == ''){
			$errors[] = 'Введите email!';
		}
		if($data['password'] == ''){
			$errors[] = 'Введите пароль!';
		}
		if($data['password_2'] != $data['password']){
			$errors[] = 'Повторный пароль введён не верно!';
		}

		$login = $data['login'];

		if(search_login($login)){
			$errors[] = 'Такой логин уже существует!';
		}

		$email = $data['email'];

		if(search_email($email)){
			$errors[] = 'Такой email уже существует!';
		}

		if(empty($errors)){

			$login = $data['login'];
			$email = $data['email'];
			$password = password_hash($data['password'],PASSWORD_DEFAULT);
			
			insert_user($login ,$email,$password);

			echo '<div style="color: green;">Вы успешно зарегистрировались!</div><hr>';
			
		}
		else{
			echo '<div style="color: red">'.array_shift($errors).'</div><hr>';
		}
	}
?>
<login id="log">
	<form action="/signup.php" method="POST">
		
		<p>
			<p>Ваш логин</p>
			<input type="text" name="login" class="form-control" value="<?php echo @$data['login']; ?>">
		</p>

		<p>
			<p>Ваш Email</p>
			<input type="email" name="email" class="form-control" value="<?php echo @$data['email']; ?>">
		</p>

		<p>
			<p>Ваш пароль</p>
			<input type="password" name="password" class="form-control" value="<?php echo @$data['password']; ?>">
		</p>

		<p>
			<p>Ваш пароль еще раз</p>
			<input type="password" name="password_2" class="form-control" value="<?php echo @$data['password_2']; ?>">
		</p>

		<p>
			<button type="submit" name="do_signup" class="btn btn-success">Зарегистрироваться</button>
		</p>
	</form>
</login>
<?php
	include_once 'footer.php';
?>