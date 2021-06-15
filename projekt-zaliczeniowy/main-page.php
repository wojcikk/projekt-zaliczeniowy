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
        <div class="logout-button"><a href="logout.php">WYLOGUJ SIĘ</a></div>
    </nav>
   
    <div class="container">
        <a href="choose-topic.php"><div class="tile elements"><img src="images/learn.png"><div class="text">UCZ SIĘ</div></div></a>
        <a href="informations.php"><div class="tile elements"><img src="images/informations.png"><div class="text">CIEKAWOSTKI</div></div></a>
        <a href="play.php"><div class="tile elements"><img src="images/play.png"><div class="text">GRAJ</div></div></a>
        <a href="gallery.php"><div class="tile elements"><img src="images/gallery.png"><div class="text">GALERIA POLSKICH ARCYMISTRZÓW</div></div></a>
        <a href="course.php"><div class="tile elements"><img src="images/course.png"><div class="text">ZAPISZ SIĘ NA SZKOLENIE</div></div></a>
    </div>
    
    
    <footer>
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png"><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href=""><div class="elements"><img src="images/about.png"><div class="text" style="opacity:50%;">O NAS</div></div></a>
        <a href=""><div class="elements"><img src="images/contact.png"><div class="text" style="opacity:50%;">KONTAKT</div></div></a>
    </footer>

</body>

</html>