<?php
$conn = mysqli_connect("localhost", "root", "lyg3716");
mysqli_select_db($conn, "opentutorials");
$sql = "INSERT INTO topic (title,description,created,id) VALUES('".$_POST['title']."', '".$_POST['description']."', '".$_POST['author']."', 4)";
$result = mysqli_query($conn, $sql);
echo $sql;
echo $result;
header('Location: http://localhost:8080/TwiterBootStrap/index.php');
?>
