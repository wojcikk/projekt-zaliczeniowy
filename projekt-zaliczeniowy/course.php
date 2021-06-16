<?php
 
    session_start();
        
    if (!isset($_SESSION['logged'])) {
        header('Location: starting-page.php');
        exit();
    }
    
    if(isset($_POST['email']))
    {
        $correct = true;
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $birth = $_POST['birth'];  
        $email = $_POST['email'];
        $email2 = filter_var($email, FILTER_SANITIZE_EMAIL);
         
        if ((filter_var($email2, FILTER_VALIDATE_EMAIL)==false) || ($email2!=$email))
        {
            $correct=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail!";
        }

        $phoneNumber = $_POST['phoneNumber'];

        if (strlen($phoneNumber) != 9)
        {
            $correct=false;
            $_SESSION['e_phoneNumber']="Numer musi posiadać dokładnie 9 cyfr!";
        }
        

        require_once "connect.php";

        try {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                $result = $connection->query("SELECT id FROM szkolenie WHERE email='$email'");
                 
                if (!$result) throw new Exception($connection->error);
                 
                $numberOfThisEmails = $result->num_rows;
                if($numberOfThisEmails>0)
                {
                    $correct=false;
                    $_SESSION['e_email']="Na ten email ktoś już zapisał się na szkolenie!";
                }       
 
                                
                if ($correct==true)
                {                   
                    if ($connection->query("INSERT INTO szkolenie VALUES (NULL,'$name', '$surname', '$birth', '$email', '$phoneNumber')"))
                    {
                        header('Location: thanks-for-apply.php');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
                     
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
    <title>Formularz zgłoszeniowy</title>
    <link rel="stylesheet" href="base-structure.css">
    <link rel="stylesheet" href="form-based-structure.css">

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
        <div class="inner-container">
            <form method="POST">
                FORMULARZ ZGŁOSZENIOWY<br><br>
                Imię: <br><input type="text" name="name" class="form" placeholder="Wprowadź imię"/><br><br>
                Nazwisko: <br><input type="text" name="surname" class="form" placeholder="Wprowadź nazwisko"/><br><br>
                Rok urodzenia: <br><input type="text" name="birth" class="form" placeholder="Wprowadź datę urodzenia"/><br><br>

                <span class="err">
                    <?php
                        if(isset($_SESSION['e_birth'])) {
                            echo '<span>'.$_SESSION['e_birth'].'</span>';
                            unset($_SESSION['e_birth']);
                        }
                    ?>
                </span>

                E-mail: <br><input type="text" name="email" class="form" placeholder="Wprowadź e-mail"/><br>

                <span class="err">
                    <?php
                        if(isset($_SESSION['e_email'])) {
                            echo '<span>'.$_SESSION['e_email'].'</span>';
                            unset($_SESSION['e_email']);
                        }
                    ?>
                </span><br>

                Nr telefonu: <br><input type="text" name="phoneNumber" class="form" placeholder="Wprowadź numer telefonu"/><br>

                <span class="err">
                    <?php
                        if(isset($_SESSION['e_phoneNumber'])) {
                            echo '<span>'.$_SESSION['e_phoneNumber'].'</span>';
                            unset($_SESSION['e_phoneNumber']);
                        }
                    ?>
                </span><br><br>
                
    
                <input type="submit" value="ZAPISZ SIĘ!" class="button"/><br>

            </form>
        </div> 
    </div> 

    <footer>
        <a href="opinions.php"><div class="elements"><img src="images/opinions.png" alt=""><div class="text">PRZEŚLIJ OPINIE</div></div></a>
        <a href="about.php"><div class="elements"><img src="images/about.png" alt=""><div class="text">O NAS</div></div></a>
        <a href="contact.php"><div class="elements"><img src="images/contact.png" alt=""><div class="text">KONTAKT</div></div></a>
    </footer>
   
</body>

</html>