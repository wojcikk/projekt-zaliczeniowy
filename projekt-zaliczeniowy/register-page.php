<?php
 
    session_start();
    
    if(isset($_POST['email']))
    {
        $correct = true;

        $nick = $_POST['nick'];

        if((strlen($nick) < 3) || (strlen($nick) > 20)) {
            $correct = false;
            $_SESSION['e_nick'] = "Login musi posiadać od 3 do 20 znaków!";
        }

        if (ctype_alnum($nick)==false)
        {
            $correct=false;
            $_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr";
        }

        $email = $_POST['email'];
        $email2 = filter_var($email, FILTER_SANITIZE_EMAIL);
         
        if ((filter_var($email2, FILTER_VALIDATE_EMAIL)==false) || ($email2!=$email))
        {
            $correct=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail!";
        }

        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
         
        if ((strlen($password1)<8) || (strlen($password1)>20))
        {
            $correct=false;
            $_SESSION['e_password']="Hasło musi posiadać od 8 do 20 znaków!";
        }
         
        if ($password1!=$password2)
        {
            $correct=false;
            $_SESSION['e_password']="Podane hasła nie są identyczne!";
        }   
 
        $password_hash = password_hash($password1, PASSWORD_DEFAULT);

        if (!isset($_POST['regulations']))
        {
            $correct=false;
            $_SESSION['e_regulations']="Potwierdź akceptację regulaminu!";
        }

        require_once "connect.php";

        try {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                $result = $connection->query("SELECT id FROM uzytkownicy WHERE email='$email'");
                 
                if (!$result) throw new Exception($connection->error);
                 
                $numberOfThisEmails = $result->num_rows;
                if($numberOfThisEmails>0)
                {
                    $correct=false;
                    $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
                }       
 
                $result = $connection->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
                 
                if (!$result) throw new Exception($connection->error);
                 
                $numberOfThisNicks = $result->num_rows;
                if($numberOfThisNicks>0)
                {
                    $correct=false;
                    $_SESSION['e_nick']="Istnieje już gracz o takim loginie! Wybierz inny.";
                }
                 
                if ($correct==true)
                {                   
                    if ($connection->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$password_hash', '$email')"))
                    {
                        header('Location: login-page.php');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
                     
                }
                 
                $connection->close();
            }
        } catch(Exception $error) {
            echo '<span style="color:red;">Błąd serwera!</span>';
            echo '<br>Error: '.$error;
        }
    }
 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="base-structure.css">
    <link rel="stylesheet" href="form-based-structure.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    
    <style>
        nav {
            margin-bottom: 47px;
            padding-bottom: 0px;
        }
    </style>
</head>

<body>

    <nav>
        <a href="main-page.php"><img src="images/logo.png" alt=""></a>
    </nav>

    <div class="container">
        <div class="inner-container">
            <form method="POST">
                Login: <br><input type="text" name="nick" class="form" placeholder="Wprowadź login"/><br>

                <span class="err">
                    <?php
                        if(isset($_SESSION['e_nick'])) {
                            echo '<span>'.$_SESSION['e_nick'].'</span>';
                            unset($_SESSION['e_nick']);
                        }
                    ?>
                </span><br>
                

                E-mail: <br><input type="text" name="email" class="form" placeholder="Wprowadź email"/><br>

                <span class="err">
                    <?php
                        if(isset($_SESSION['e_email'])) {
                            echo '<span>'.$_SESSION['e_email'].'</span>';
                            unset($_SESSION['e_email']);
                        }
                    ?>
                </span><br>
                

                Hasło: <br><input type="password" name="password1" class="form" placeholder="Wprowadź hasło"/><br><br>

                Powtórz hasło: <br><input type="password" name="password2" class="form" placeholder="Wprowadź hasło ponownie"/><br>

                <span class="err">
                    <?php
                        if(isset($_SESSION['e_password'])) {
                            echo '<span>'.$_SESSION['e_password'].'</span>';
                            unset($_SESSION['e_password']);
                        }
                    ?>
                </span><br>
                
                <label>
                    <input type="checkbox" name="regulations" class="button"/>    Akceptuje regulamin<br>
                </label>

                <span class="err">
                    <?php
                        if (isset($_SESSION['e_regulations']))
                        {
                            echo '<span>'.$_SESSION['e_regulations'].'</span>';
                            unset($_SESSION['e_regulations']);
                        }
                    ?> 
                </span><br>
                

                <input type="submit" value="Zarejestruj się" class="button"/><br>

            </form>
        </div> 
    </div> 

    <footer>
        <a href="about.php"><div class="elements"><img src="images/about.png" alt=""><div class="text">O NAS</div></div></a>
        <a href="contact.php"><div class="elements"><img src="images/contact.png" alt=""><div class="text">KONTAKT</div></div></a>
    </footer>

   
</body>

</html>