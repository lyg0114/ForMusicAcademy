
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>

    <?php
    session_start();
    if(!isset($_SESSION['is_login'])){
        header('Location: http://localhost:8080/MusicAcademy/login/login.html');
      }
       print '<form name = "success3" method="post" id="send">';
       print '<input style="display:none" name="year"' .'value='.'"'.$_POST['year'].'"'.'>';
       print '<input style="display:none" name="month"' .'value='.'"'.$_POST['month'].'"'.'>';
       print '<input style="display:none" name="searchday"'.'value='.'"'.$_POST['searchday'].'"'.'>';
       print '<input style="display:none" name="time"'.'value='.'"'.$_POST['reserVationTime'].'"'.'>';
       print '<input style="display:none" id ="res" type="button" value="예약하기"'."onclick=".'mySubmit(1)'.">";
       print '</form>';

      $conn = mysqli_connect("localhost", "root", "lyg3716");
      mysqli_select_db($conn, "meminfo");
      $sql ='INSERT INTO'."`".$_POST['year'].$_POST['month']."`"."("."id".","."time".","."day".","."name".') VALUES('."'".$_SESSION['id']."'".",".$_POST['reserVationTime'].",".$_POST['searchday'] .","."'".$_SESSION['name']."'".")" ;
      $result = mysqli_query($conn, $sql); //쿼리문 날림
      //header('Location: http://localhost:8080/MusicAcademy/cal/cal.php'); //리다이렉션
    ?>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
    $("#res").bind("click", mySubmit(1));
    $("#res").trigger("click");

    function mySubmit(index) {
      var send = document.getElementById('send');
        if(index == 1) {
        send.action="http://localhost:8080/MusicAcademy/cal/cal.php";
        send.submit();
        }

    }
    </script>
  </body>
</html>
