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
?>