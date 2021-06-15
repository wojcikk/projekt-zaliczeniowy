<?php
 
    session_start();
     
    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)) {
        header('Location: main-page.php');
        exit();
    }
 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Logowanie</title>
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
        <a href="main-page.php"><img src="images/logo.png"></a>
    </nav>
    

    <div class="container">
        <div class="inner-container">
            <form action="login.php" method="POST">
                Login: <br><input type="text" name="login" class="form" placeholder="Wprowadź login"/> <br><br>
                Hasło: <br><input type="password" name="password" class="form" placeholder="Wprowadź hasło"/> <br> 
                <span class="err">
                    <?php
                        if(isset($_SESSION['error']))    echo $_SESSION['error'];
                    ?>
                </span>
                <br><input type="submit" value="Zaloguj się" class="button"><br>
            </form>
            
            <a href="register-page.php"><button class="button">Nie masz konta? Zarejestruj się!</button></a>
        </div>
    </div>

    <footer>
        <a href=""><div class="elements"><img src="images/opinions.png"><div class="text" style="opacity:50%;">PRZEŚLIJ OPINIE</div></div></a>
        <a href=""><div class="elements"><img src="images/about.png"><div class="text" style="opacity:50%;">O NAS</div></div></a>
        <a href=""><div class="elements"><img src="images/contact.png"><div class="text" style="opacity:50%;">KONTAKT</div></div></a>
    </footer>
    
        
</body>

</html>