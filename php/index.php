<?php
$dbc = mysqli_connect('localhost', 'root', '', 'myrecomp');
if(!isset($_COOKIE['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT `user_id` , `username` FROM `login` WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
				$home_url = 'http://' . $_SERVER['HTTP_HOST'];
				header('Location: '. $home_url);
			}
			else {
				echo 'Извините, вы должны ввести правильные имя пользователя и пароль';
			}
		}
		else {
			echo 'Извините вы должны заполнить поля правильно';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet">
</head>
<body  background="images/q.png">
<header >
            <h1><img src="images/logo.png" align = left height= 50px  width = 70px alt=""></a>
      
          
            MyReComp
        </h1>
        </header>
		<nav class="one">
            <h2></h2>
            <ul>
                <li><a href="C:\Users\mdani\OneDrive\Рабочий стол\Дима ананьев\html\mac.html">Mac</a></li>
                <li><a href="C:\Users\mdani\OneDrive\Рабочий стол\Дима ананьев\html\windows.html">Windows</a></li>
                <li><a href="C:\Users\mdani\OneDrive\Рабочий стол\Дима ананьев\html\service.html">Сервис</a></li>
                <li><a href="C:\Users\mdani\OneDrive\Рабочий стол\Дима ананьев\html\informacia.html">О нас</a></li>
                <li><a href="C:\Users\mdani\OneDrive\Рабочий стол\Дима ананьев\html\vhod.html"> Вход</a></li>
              
            </ul>
          </nav>
<section>
<?php
	if(empty($_COOKIE['username'])) {
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<label for="username">Логин:</label>
	<input type="text" name="username">
	<label for="password">Пароль:</label>
	<input type="password" name="password">
	<button type="submit" name="submit">Вход</button>
	<a href="signup.php">Регистрация</a>
	</form>
<?php
}
else {
	?>
	<p><a href="myprofile.php">Мой профиль</a></p>
	<p><a href="exit.php">Выйти(<?php echo $_COOKIE['username']; ?>)</a></p>
<?php	
}
?>
</section>
<content>
	<div >
	
	</div>
	

</content>

<footer class="clear">
	
</footer>

</body>

</html>