<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="UTF-8">

</head>

<body>


    <?php

		require_once 'function.php';

		if (isset($_GET['delete'])) {
			$id = abs((int)$_GET['delete']);

			$mysqli = connect();

			$result = $mysqli->query("
				SELECT id FROM computer WHERE id='$id' 
			");

			if ($result && $result->num_rows == 1) {
				$mysqli->query("
					DELETE FROM computer WHERE id = '$id'
				");
				echo "Удаленно! <a href='http://localhost/computer.php'>Назад</a>";
			}
			else {
				echo "Ошибка";
			}
			exit;
		}
		if (isset($_GET['char'])) {
				$id = $_GET['char'];

				$mysqli = connect();

				$result = $mysqli->query("
					SELECT * FROM characteristics WHERE id='$id' 
				");
				$com=$result->fetch_assoc();
					do 
						{
							echo "<p>Дисплей:".$com['дисплей']."</p>";
							echo "<p>Процессор:".$com['процессор']."</p>";
							echo "<p>ОЗУ:".$com['озу']."</p>";
							echo "<p>ОС:".$com['ос']."</p>";
						}
					while ($com = $result->fetch_assoc());

				echo "<h1><a href='computer2.php'>Добавить характеристики...</a></h1>";
				echo "<a href='/computer.php'>Назад</a>";

			exit;
		}
		function Computers ()
			{
				$mysqli = connect();
				$result = $mysqli->query(
					"SELECT * FROM computer"
					);
				$com=$result->fetch_assoc();
					do 
						{
							echo "<p>Panel: <a href='?delete=".$com['id']."'>[X]</a></p>";
							echo "<p>Название:".$com['name']."</p>";
							echo "<p>Логин:".$com['login']."</p>";
							echo "<p>Пароль:".$com['password']."</p>";
							echo "<p><a href='?char=".$com['id']."'>Характеристики...</a></p>";
							echo "<hr />";
						}
					while ($com = $result->fetch_assoc());
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
		Computers ();
	?>
        <h1><a href="config.php">Добавить компьютер...</a></h1>

</body>

</html>
