<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>EduRank</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='App.css'>
</head>
<body>
    <?php
        session_start();

        if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]) && isset($_POST["mail"])) {
            $conn = new mysqli('localhost', 'root', '', 'edurank');

            if ($conn->connect_errno) {
                echo "Baza danych niedostępna";
                exit();
            }
            $login = $_POST['login'];
            $pass = $_POST['password'];
            $pass2 = $_POST['confirm_password'];
            $mail = $_POST['mail'];


            
        if ($pass == $pass2) {
            $pass = md5($pass);
            $role = 'guest';
            $query = "SELECT * FROM users WHERE username = '$login' AND password = '$pass'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0) {
                
                $query = "INSERT INTO users (id, username, mail, password, role) VALUES (NULL,?,?,?,?);";
                $polecenie = $conn->prepare($query);
                $polecenie->bind_param("ssss", $login, $mail, $pass, $role);
                $polecenie->execute();
                $polecenie->free_result();
                header('Location: http://localhost/edurank/edurank/login.php/');
                
            } else {
                echo 'Takie konto już istnieje! <br>';
            }
            
        } else {
            echo "Hasła nie są zgodne";
        }
        
        $conn->close();
    } 
    ?>


    <form method="POST">
        Login: <input type="text" name="login" required>
        Hasło: <input type="password" name="password" required>
        Powtórz hasło: <input type="password" name="confirm_password" required>
        E-mail: <input type="mail" name="mail" required>
        <input type="submit" value="Zarejestruj">
    </form>


    
</body>
</html>
