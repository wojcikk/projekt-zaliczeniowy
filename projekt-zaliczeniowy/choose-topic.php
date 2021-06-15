<?php
 
    session_start();
     
    if (!isset($_SESSION['logged'])) {
        header('Location: starting-page.php');
        exit();
    }
     
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Projekt zaliczeniowy</title>
    <link rel="stylesheet" href="base-structure.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

</head>

<body>
   
    <nav>
        <a href="main-page.php"><img src="images/logo.png"></a>
        <hr>
        <div class="logout-button"><a href="logout.php" >WYLOGUJ SIĘ</a></div>
    </nav>
     
    <div class="container">
        <a href="basic-chess.php"><div class="tile elements"><img src="images/basic.png"><div class="text">PODSTAWY GRY</div></div></a>
        <a href="openings.php"><div class="tile elements"><img src="images/openings.png"><div class="text">OTWARCIA</div></div></a>
    </div>
    
    
    <footer>
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png"><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href=""><div class="elements"><img src="images/about.png"><div class="text" style="opacity:50%;">O NAS</div></div></a>
        <a href=""><div class="elements"><img src="images/contact.png"><div class="text" style="opacity:50%;">KONTAKT</div></div></a>
    </footer>

</body>

</html>