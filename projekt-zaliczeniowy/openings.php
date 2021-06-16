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
    <link rel="stylesheet" href="video-based-structure.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>

<body>

    <script>
        function myFunction(i) {
            var x = document.getElementsByClassName("content")[i-1];
            if (x.style.display === 'none') {
                x.style.display = 'block';
            } else {
                x.style.display = 'none';
            }
        }
    </script>
   
    <nav>
        <a href="main-page.php"><img src="images/logo.png" alt=""></a>
        <hr>
        <div class="logout-button"><a href="logout.php" >WYLOGUJ SIĘ</a></div>
    </nav>
     
    

    <div class="container">
        <?php
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
                $sql = "select * from otwarcia;";

                $result = mysqli_query($connection, $sql);
                if(!$result) {
                    echo mysqli_error($conn);
                }
                while ($row=mysqli_fetch_assoc($result)){
                        echo "<div class=\"inner-container\"> 
                                <button onclick=\"myFunction(".$row['id'].")\"><p>".$row['title']."</p></button>
                                <div style=\"display:none;\" class=\"content\">
                                    <div class=\"videoWrapper\"><iframe src=\"".$row['link']."\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe></div>
                                    <div class=\"text\">".$row['content']."</div>
                                </div>
                                </div>";
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
    </div>
    
    <footer>
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png" alt=""><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href="about.php"><div class="elements"><img src="images/about.png" alt=""><div class="text">O NAS</div></div></a>
        <a href="contact.php"><div class="elements"><img src="images/contact.png" alt=""><div class="text">KONTAKT</div></div></a>
    </footer>

</body>

</html>