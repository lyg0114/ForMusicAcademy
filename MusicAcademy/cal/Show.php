<?php
session_start();
if(!isset($_SESSION['is_login'])){
    header('Location: http://localhost:8080/MusicAcademy/login/login.html');
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title> 달력만들기 </title>
</head>

<body>

  <?php // 년월에 해당되는 정보를 DB에서 가져옴!!

    $conn = mysqli_connect("localhost", "root", "lyg3716");
    mysqli_select_db($conn, "meminfo");

     print '<li style="display:none" id="year">'.$_POST['year'].'</li>';
     print '<li style="display:none" id="month">'.$_POST['month'].'</li>';
/////////////////////////////////////////////////////////////////////////////////////
     print '<form name = "success2" method="post" id="send">';
     print '<input style="display:none" name="year"' .'value='.'"'.$_POST['year'].'"'.'>';
     print '<input style="display:none" name="month"' .'value='.'"'.$_POST['month'].'"'.'>';
     print '<input style="display:none" name="searchday"'.'value='.'"'.$_POST['searchday'].'"'.'>';
     print '<input style="display:none" name="time"'.'value='.'"'.$_POST['reserVationTime'].'"'.'>';
     print '<input style="display:none" id ="res" type="button" value="예약하기"'."onclick=".'mySubmit(2)'.">";
     print '</form>';

  ?>
<h3 id = "title"></h3>
<div id="kCalendar"></div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script >

		    $("#res").bind("click", mySubmit(2)); //자동클릭
        $("#res").trigger("click");


function mySubmit(index) {

  var send = document.getElementById('send');

  if(index == 1) {
    send.action="http://localhost:8080/MusicAcademy/cal/calInsertDataProcess.php";
    send.submit();
    }
    if(index == 2) {
    send.action="http://localhost:8080/MusicAcademy/cal/cal.php";
    send.submit();
    }
}


</script>

</body>
</html>
