<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
        session_start();
        session_destroy();
        header('Location: index.php');
        exit;
    ?>
</body>
</html>