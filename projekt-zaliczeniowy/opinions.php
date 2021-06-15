<?php
 
    session_start();
     
    if (!isset($_SESSION['logged'])) {
        header('Location: starting-page.php');
        exit();
    }
    

    if(!empty($_POST['commentf']))
    {
        require_once "connect.php";
        $login = $_SESSION['user'];
        $comment = $_POST['commentf'];

        echo $login;

        try {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                if ($connection->query("INSERT INTO komentarze VALUES (NULL, '$login', '$comment')"))
                {
                    header('Location: thanks-for-opinion.php');
                    
                }
                else
                {
                    throw new Exception($connection->error);
                }

                $connection->close();
            }
        } catch(Exception $error) {
            echo '<span style="color:red;">Błąd serwera!</span>';
            echo '<br>Error: '.$error;
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Prześlij opinię</title>
    <link rel="stylesheet" href="base-structure.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <style>
        .container {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .comment-block {
            background-color: white;
            text-align: center;
            margin: 5px 0px;
            border-radius: 3px;
        }

        .button, .form {
            background-color: white;
            color: rgb(58, 58, 58);
            border-radius: 3px;
            padding: 9px 9px;
            margin: 1px;
            border-color: lightgray;
            border-width: 1px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }
        .form {
            padding: 18px 9px;
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
        <form method="POST">
            <br><input type="text" name="commentf" class="form" placeholder="Wpisz komentarz"/>
            <input type="submit" value="PRZEŚLIJ OPINIĘ" class="button"/><br>
        </form>
        
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
                $sql = "select * from komentarze;";

                $result = mysqli_query($connection, $sql);
                if(!$result) {
                    echo mysqli_error($conn);
                }
                while ($row=mysqli_fetch_assoc($result)){
                        echo "<div class=\"comment-block\"> 
                                <p><b>".$row['login']."</b></p><p>".$row['comment']." </p>                               
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