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
            margin-top: 10px;
        }

        .inner-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: column;
            background-color: white;
            margin-bottom: 10px;
            border-radius: 3px;
        }

        .inner-container h3 {
            padding: 5px 20px 0px 20px;
        }

        .inner-container p {
            padding: 0px 20px 5px 20px;
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
                $sql = "select * from ciekawostki;";

                $result = mysqli_query($connection, $sql);
                if(!$result) {
                    echo mysqli_error($conn);
                }
                while ($row=mysqli_fetch_assoc($result)){
                        echo "<div class=\"inner-container\"> 
                                <h3>".$row['title']."</h3>
                                <p>".$row['content']."</p>
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
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png"><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href=""><div class="elements"><img src="images/about.png"><div class="text" style="opacity:50%;">O NAS</div></div></a>
        <a href=""><div class="elements"><img src="images/contact.png"><div class="text" style="opacity:50%;">KONTAKT</div></div></a>
    </footer>

</body>

</html>