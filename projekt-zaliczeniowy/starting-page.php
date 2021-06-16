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
    <title>Strona startowa</title>
    <link rel="stylesheet" href="base-structure.css">

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
        <div class="tile"><a href="login-page.php"><div class="elements"><img src="images/login.png" alt=""><div class="text">ZALOGUJ SIĘ</div></div></a></div>
        <div class="tile"><a href="register-page.php"><div class="elements"><img src="images/register.png" alt=""><div class="text">ZAREJESTRUJ SIĘ</div></div></a></div>
    </div>

    <footer>
        <a href="about.php"><div class="elements"><img src="images/about.png" alt=""><div class="text">O NAS</div></div></a>
        <a href="contact.php"><div class="elements"><img src="images/contact.png" alt=""><div class="text">KONTAKT</div></div></a>
    </footer>
    
        
</body>

</html>