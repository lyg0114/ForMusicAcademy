



<?php

$conn = mysqli_connect("localhost", "root", "lyg3716");
mysqli_select_db($conn, "meminfo");

$sql = "INSERT INTO member (name,id,pw,nic,pnum) VALUES('".$_POST['name']."','".$_POST['id']."','".$_POST['pwd']."','".$_POST['nic']."','".$_POST['pnum']."')";

$result = mysqli_query($conn, $sql);

header('Location: http://localhost:8080/MusicAcademy/index.php');

?>
