<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>XMath</title>
    <link rel="icon" type="image/x-icon" href="Assets/favicon.ico">
    <link rel="stylesheet" href="App.css">
</head>
<body>
    <?php
    session_start();

    ?>
    <div id="nav">
        <div id ="menu">
            <p>Nowa gra</p>
            <p>Wybierz dział</p>
            <p>Challenge</p>
            <p>Ustawienia</p>
            <p>O nas</p>
        </div>

        <div id="user">

        
            <ol>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<li><a href="profile.php">'.$_SESSION['username'].'</a>';
                  echo "<ul>";
                    echo '<li><a href="logout.php">Wyloguj</a></li>';

                  echo "</ul></li></ol>";
                
                
            } else {
                echo '<h5> <a href="login.php">konto uzytokownika</a></h5>';
            }
            
            
            ?>
        </div>
        
        
    </div>
    <div id="main">
        <div id="ranking">
            <h5>ranking</h5>
        </div>
        <div id="task">
            <h5>ranking</h5>
        </div>
        <div id="control">
            <p>Wyzwij znajomego</p>
            <p>Przetrwanie</p>
            <p>3 życia</p>
            <p>Poziom trudności</p>
            <p>Wyświetl odpowiedź</p>
        </div>
    </div>
</body>
</html>

