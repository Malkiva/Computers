<!DOCTYPE html>
<html>

<head>
    <title>Добавить характеристики</title>
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

		function createChar($display="",$pro="",$ozy="",$oc="")
			{
				$mysqli = connect();
				$mysqli->query
				("INSERT INTO characteristics 
					(дисплей,процессор,озу,ос)
				VALUES
					('$display','$pro','$ozy','$oc')
				");
				return true;
			}	

		if (isset($_POST['add-char'])) {
			if (
				!empty($_POST['display']) &&
				!empty($_POST['pro']) &&
				!empty($_POST['ozy']) &&
				!empty($_POST['oc'])
				) 
			{
				$display = trim(stripslashes(htmlspecialchars($_POST['display'])));
				$pro = trim(stripslashes(htmlspecialchars($_POST['pro'])));
				$ozy = trim(stripslashes(htmlspecialchars($_POST['ozy'])));
				$oc = trim(stripslashes(htmlspecialchars($_POST['oc'])));
				$result_answer=createChar($display,$pro,$ozy,$oc);
			}
			else {
				echo "Заполните все поля";
			}
		}		
		
	?>

        <form method="post">
            <p>Дисплей: <input type="text" name="display" /></p>
            <p>Процессор: <input type="text" name="pro" /></p>
            <p>ОЗУ: <input type="text" name="ozy" /></p>
            <p>ОС: <input type="text" name="oc" /></p>
            <p><input type="submit" name="add-char" value="Добавить характеристики"><a href="http://localhost/computer.php">Назад</a></p>
        </form>

</body>

</html>