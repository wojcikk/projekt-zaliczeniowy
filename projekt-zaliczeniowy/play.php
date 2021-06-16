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
        <a href="main-page.php"><img src="images/logo.png" alt=""></a>
        <hr>
        <div class="logout-button"><a href="logout.php" >WYLOGUJ SIĘ</a></div>
    </nav>
     
    <div class="container">     
        <a href="https://lichess.org/" target="_blank" class="tile"><img src="images/lichess-logo.png" height="170px" title="Przejdź do lichess.org"></a>
        <a href="https://www.chess.com/" target="_blank" class="tile"><img src="images/chesscom-logo.png" style="padding: 20px 0px;" height="130px" title="Przejdź do chess.com"></a>
    </div>
    
    
    <footer>
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png" alt=""><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href="about.php"><div class="elements"><img src="images/about.png" alt=""><div class="text">O NAS</div></div></a>
        <a href="contact.php"><div class="elements"><img src="images/contact.png" alt=""><div class="text">KONTAKT</div></div></a>
    </footer>


</body>

</html>