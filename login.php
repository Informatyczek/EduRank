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


        if (isset($_POST["password"]) && isset($_POST["login"])) {
            $login = $_POST["login"];
            $pass = $_POST["password"];
            $pass = md5($pass);            
            
            $conn = new mysqli('localhost', 'root', '', 'edurank');

            if ($conn->connect_errno) {
                echo "Wyrzuciło błąd ;')";
                exit();
            }       

            $query = "SELECT * FROM users WHERE username = '$login' AND password = '$pass'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                echo "loguje";
                $query2 = "SELECT role FROM users WHERE username = ?"; 
                $safe = mysqli_real_escape_string($conn, $login); 
                
                if ($polecenie = $conn->prepare($query2)) { 
                    $polecenie->bind_param('s', $safe); 
                    $polecenie->execute(); 
                    $polecenie->bind_result($role);                  
                    $polecenie->store_result(); 
                    $polecenie->fetch();
                }
                $_SESSION['role'] = $role;    
                $_SESSION['username'] = $login;
                header('Location: http://localhost/edurank/edurank/index.php');
                exit;
            } else {
                echo 'Nieprawidłowe dane logowania!<br> ';
            }

            
        }
    ?>


    <form method="POST">
        Login: <input type="text" name="login"><br>
        Hasło: <input type="password" name="password">
        <input type="submit" value="Zaloguj">
    </form>
    
    <p>Nie masz konta? <a href="register.php">Zarejestruj się!</a></p>
</body>
</html>
