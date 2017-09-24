<!DOCTYPE html>
<html>

<head>
    <title>New Computer</title>
    <meta charset="utf-8">
</head>

<body>

    <?php

function connect()
			{
				$mysqli = new mysqli (
					"localhost",
					"malkivan",
					"123",
					"computers"
				);		
				return $mysqli;
			}	

		function createCom($name="",$login="",$password="")
			{
				$mysqli = connect();
				$mysqli->query
				("INSERT INTO computer 
					(name,login,password)
				VALUES
					('$name','$login','$password')
				");
				return true;
			}	

		if (isset($_POST['add-user'])) {
			if (
				!empty($_POST['name']) &&
				!empty($_POST['login']) &&
				!empty($_POST['password'])
				) 
			{
				$name = trim(stripslashes(htmlspecialchars($_POST['name'])));
				$login = trim(stripslashes(htmlspecialchars($_POST['login'])));
				$password = trim(stripslashes(htmlspecialchars($_POST['password'])));

				$result_answer=createCom($name,$login,$password);
			}
			else {
				echo "Заполните все поля";
			}
		}		

	?>

        <form method="post">
            <p>Название: <input type="text" name="name" /></p>
            <p>Логин: <input type="text" name="login" /></p>
            <p>Пароль: <input type="password" name="password" /></p>
            <p><input type="submit" name="add-user" value="Добавить компьютер"><a href="http://localhost/computer.php">Назад</a></p>
        </form>

</body>

</html>