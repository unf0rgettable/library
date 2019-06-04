<?php
	function get_categories($db){
		$sql = "SELECT * FROM `categories`";
		$result = mysqli_query($db,$sql);
		$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $categories;
	}
	$categories = get_categories($db);



	function get_posts($limit, $offset){
		global $db;

	$page = isset($_GET['page']) ? $_GET['page']: 1;
	$limit = 5;
	$offset = $limit * ($page - 1);

		$sql = "SELECT * FROM `books` LIMIT $limit OFFSET $offset";
		$result = mysqli_query($db,$sql);
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $posts;
	}


	$posts = get_posts($limit, $offset);


	function get_post_by_id($post_id) {
	    global $db;
	    
	    $sql = "SELECT * FROM books WHERE Id = ".$post_id;
	    
	    $result = mysqli_query($db, $sql);
	    
	    $post = mysqli_fetch_assoc($result);
	    
	    return $post;
	}

	function get_posts_by_category($category_id) {
	    
	    global $db;
	    
	    $category_id = mysqli_real_escape_string($db, $category_id);
	    
	    $sql = 'SELECT * FROM books WHERE Category_id = "'.$category_id.'"';
	    
	    $result = mysqli_query($db, $sql);
	    
	    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	    
	    return $posts;
	    
	}
	function get_category_title($category_id)  {
	    
	    global $db;
	    
	    $category_id = mysqli_real_escape_string($db, $category_id);
	    
	    $sql = 'SELECT Title FROM categories WHERE Id = "'.$category_id.'"';
	    
	    $result = mysqli_query($db, $sql);
	    
	    $category = mysqli_fetch_assoc($result);
	    
	    return $category['Title'];
	}

	function insert_user($login ,$email,$password){
		global $db;

		$insert_query = "INSERT INTO users (Login, Password, Email) VALUES ('$login', '$password', '$email')";

		$result = mysqli_query($db, $insert_query);
	}

	function search_login($login){
		global $db;

		$search_query = 'SELECT Login FROM users WHERE Login = "'.$login.'"';

		$result = mysqli_query($db, $search_query);

		$result_1 = mysqli_fetch_assoc($result);

		return $result_1;
	}

	function search_password_by_Login($login){
		global $db;

		$search_query = 'SELECT Password FROM users WHERE Login = "'.$login.'"';

		$result = implode (mysqli_fetch_assoc(mysqli_query($db, $search_query)));

		return $result;
	}

	function search_group_by_Login($login){
		global $db;

		$search_query = 'SELECT Graup FROM users WHERE Login = "'.$login.'"';

		$result = implode (mysqli_fetch_assoc(mysqli_query($db, $search_query)));

		return $result;
	}

	function count_category_id(){
		global $db;

		$sql = 'SELECT COUNT(*) FROM Id.COLUMNS WHERE table_catalog = "library" AND table_name = "categories"';

		$result = mysqli_query($db, $sql);

		return $result;
	}

	function add_book_by_login($login,$book_id){
		global $db;

		$find = 'SELECT my_books FROM users WHERE "'.$login.'" = Login';

		$asd .= implode (mysqli_fetch_assoc(mysqli_query($db, $find)));
		$asd .= $book_id;
		$asd .= ",";
		$sql = 'UPDATE users SET my_books = "'.$asd.'"  WHERE "'.$login.'" = Login';

		$result = mysqli_query($db, $sql);

		return $result;
	}

	function get_books_by_login($login){
		global $db;

		$sql = 'SELECT my_books FROM users WHERE "'.$login.'" = Login';

		$result = implode (mysqli_fetch_assoc(mysqli_query($db, $sql)));

		$result = str_replace(',', '', $result);

		$result_1 = str_split($result);

		return $result_1;
	}

	function minus_one_book($book_id){
		global $db;

		$sql = 'UPDATE books SET kolvo = kolvo - 1 WHERE Id = "'.$book_id.'"';

		$result = mysqli_query($db, $sql);

		return $result;
	}

	function search_email($email){
		global $db;

		$search_query = 'SELECT Email FROM users WHERE Email = "'.$email.'"';

		$result = mysqli_fetch_assoc(mysqli_query($db, $search_query));

		return $result;
	}

	function insert_subscriber($email) {
    global $bd;
    
    $email = mysqli_real_escape_string($bd, $email);
    //1. Проверить есть ли подписчик в таблице subscribers
    $query = "SELECT * FROM subscribers WHERE Email = '$email'";
    
    $result = mysqli_query($bd, $query);
    
    if (!mysqli_num_rows($result)) {
        //2. Если его нет, то создаем подписчика с уникальным кодом (неактивного)
        $subscriber_code = generate_code();
        
        $insert_query = "INSERT INTO subscribers (Email, Code) VALUES ('$email', '$subscriber_code')";
        
        $result = mysqli_query($bd, $insert_query);
        
        if ($result) {
            return 'created';
        } else {
            return 'fail';
        }
        
    } else {
        return 'exist';
    }
     
	}
?>