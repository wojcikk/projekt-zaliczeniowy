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

    <style>
        .container {
            align-items: center;
        }

        .container p {
            text-align: center;
            background-color: white;
            border-radius: 3px;
            width: 50%;
            padding: 30px;
        }

    </style>

</head>

<body>
   
    <nav>
        <a href="main-page.php"><img src="images/logo.png"></a>
        <hr>
        <div class="logout-button"><a href="logout.php" >WYLOGUJ SIĘ</a></div>
    </nav>
     
    <div class="container">
        <p>
            Dziękujemy za przesłanie opinii!
        </p>
    </div>
    
    
    <footer>
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png"><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href=""><div class="elements"><img src="images/about.png"><div class="text" style="opacity:50%;">O NAS</div></div></a>
        <a href=""><div class="elements"><img src="images/contact.png"><div class="text" style="opacity:50%;">KONTAKT</div></div></a>
    </footer>

</body>

</html>