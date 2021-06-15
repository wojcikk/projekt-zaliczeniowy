<?php
    session_start();

    if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {
        header('Location: login-page.php');
        exit();
    }

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try 
	{
		$connection = new mysqli($host, $db_user, $db_password, $db_name);
		
		if ($connection->connect_errno!=0)
		{
			throw new Exception(mysqli_connect_errno());
		}
		else
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
			if ($result = $connection->query(
			sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
			mysqli_real_escape_string($connection,$login))))
			{
				$numberOfThisUsers = $result->num_rows;
				if($numberOfThisUsers>0)
				{
					$row = $result->fetch_assoc();
					
					if (password_verify($password, $row['pass']))
					{
						$_SESSION['logged'] = true;
						$_SESSION['id'] = $row['id'];
						$_SESSION['user'] = $row['user'];
						$_SESSION['email'] = $row['email'];
											
						unset($_SESSION['error']);
						$result->free_result();
						header('Location: main-page.php');
					}
					else 
					{
						$_SESSION['error'] = '<span>Nieprawidłowy login lub hasło!</span>';
						header('Location: login-page.php');
					}
					
				} else {
					
					$_SESSION['error'] = '<span>Nieprawidłowy login lub hasło!</span>';
					header('Location: login-page.php');
					
				}
				
			}
			else
			{
				throw new Exception($connection->error);
			}
			
			$connection->close();
		}
	}
	catch(Exception $e)
	{
		echo '<span style="color:red;">Błąd serwera!</span>';
		echo '<br />Error: '.$e;
	}
?>