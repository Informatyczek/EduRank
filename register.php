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
            $conn = new mysqli('localhost', 'root', '', 'EduRank');

            if ($conn->connect_errno) {
                echo "Baza danych niedostępna";
                exit();
            }
            $login = $_POST['login'];
            $login = $_POST['password'];
            $login = $_POST['confirm_password'];
            $login = $_POST['mail'];
        }

    ?>


    <form method="POST">
        Login: <input type="text" id="login" require>
        Hasło: <input type="text" id="password" require>
        Powtórz hasło: <input type="text" id="confirm_password" require>
        E-mail: <input type="mail" id="mail" require>
        <input type="submit" value="Zarejestruj">
    </form>
</body>
</html>
