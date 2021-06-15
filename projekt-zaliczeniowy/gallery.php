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
    <title>Galeria arcymistrzów</title>
    <link rel="stylesheet" href="base-structure.css">
    <link rel="stylesheet" href="gallery-structure.css">

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
        <div class="row">
            <div class="column">
                <img src="images/gallery/2.jpg">
                <img src="images/gallery/3.jpg">
                <img src="images/gallery/4.jpg">
                <img src="images/gallery/5.jpg">
                <img src="images/gallery/6.jpg">
                <img src="images/gallery/7.jpg">
            </div>
            <div class="column">
                <img src="images/gallery/8.jpg">
                <img src="images/gallery/9.jpg">
                <img src="images/gallery/10.jpg">
                <img src="images/gallery/11.png">
                <img src="images/gallery/12.jpg">
                <img src="images/gallery/13.jpg">
            </div>
            <div class="column">
                <img src="images/gallery/15.png">
                <img src="images/gallery/16.jpg">
                <img src="images/gallery/17.jpg">
                <img src="images/gallery/18.jpg">
                <img src="images/gallery/19.jpg">
                <img src="images/gallery/20.jpg">
            </div>
            <div class="column">
                <img src="images/gallery/21.jpg">
                <img src="images/gallery/22.jpg">
                <img src="images/gallery/23.jpg">
                <img src="images/gallery/24.jpg">
                <img src="images/gallery/25.jpg">
                <img src="images/gallery/26.jpg">
            </div>
        </div>
    </div>
    
    
    <footer>
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png"><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href=""><div class="elements"><img src="images/about.png"><div class="text" style="opacity:50%;">O NAS</div></div></a>
        <a href=""><div class="elements"><img src="images/contact.png"><div class="text" style="opacity:50%;">KONTAKT</div></div></a>
    </footer>

</body>

</html>