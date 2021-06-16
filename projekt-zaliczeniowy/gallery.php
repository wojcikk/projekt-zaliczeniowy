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
        <a href="main-page.php"><img src="images/logo.png" alt=""></a>
        <hr>
        <div class="logout-button"><a href="logout.php">WYLOGUJ SIĘ</a></div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="column">
                <img src="images/gallery/2.jpg" alt="">
                <img src="images/gallery/3.jpg" alt="">
                <img src="images/gallery/4.jpg" alt="">
                <img src="images/gallery/5.jpg" alt="">
                <img src="images/gallery/6.jpg" alt="">
                <img src="images/gallery/7.jpg" alt="">
            </div>
            <div class="column">
                <img src="images/gallery/8.jpg" alt="">
                <img src="images/gallery/9.jpg" alt="">
                <img src="images/gallery/10.jpg" alt="">
                <img src="images/gallery/11.png" alt="">
                <img src="images/gallery/12.jpg" alt="">
                <img src="images/gallery/13.jpg" alt="">
            </div>
            <div class="column">
                <img src="images/gallery/15.png" alt="">
                <img src="images/gallery/16.jpg" alt="">
                <img src="images/gallery/17.jpg" alt="">
                <img src="images/gallery/18.jpg" alt="">
                <img src="images/gallery/19.jpg" alt="">
                <img src="images/gallery/20.jpg" alt="">
            </div>
            <div class="column">
                <img src="images/gallery/21.jpg" alt="">
                <img src="images/gallery/22.jpg" alt="">
                <img src="images/gallery/23.jpg" alt="">
                <img src="images/gallery/24.jpg" alt="">
                <img src="images/gallery/25.jpg" alt="">
                <img src="images/gallery/26.jpg" alt="">
            </div>
        </div>
    </div>
    
    
    <footer>
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png" alt=""><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href="about.php"><div class="elements"><img src="images/about.png" alt=""><div class="text">O NAS</div></div></a>
        <a href="contact.php"><div class="elements"><img src="images/contact.png" alt=""><div class="text">KONTAKT</div></div></a>
    </footer>

</body>

</html>