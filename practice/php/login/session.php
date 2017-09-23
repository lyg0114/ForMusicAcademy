<?php
session_start();
if(!isset($_SESSION['is_login'])){
    header('Location: ./login.html');
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>
    <body>
        <?php echo $_SESSION['nickname'];?>welecome<br />
        <a href="./logout.php">logout</a>
    </body>
</html>
