
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>


    <?php
    session_start(); //세션 시작
    $conn = mysqli_connect("localhost", "root", "lyg3716");
    mysqli_select_db($conn, "meminfo");
    $sql = 'SELECT * FROM member WHERE id='."'".$_POST['id']."'"." and "."pw ="."'".$_POST['pwd']."'";
    //echo $sql;

    $result = mysqli_query($conn, $sql); //쿼리문 날림
    $row = mysqli_fetch_assoc($result); //DB에서 가져옴

    if(!empty($row['id']) && !empty($row['pw'])){ //두개의 정보가 모두 들어왔을때
      //맞으면 DB에서 해당 회원 정보를 가져와서 세션에다가 저장
            $_SESSION['is_login'] = true;
            $_SESSION['nic'] = $row['nic'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            header('Location: http://localhost:8080/MusicAcademy/cal/cal.php');
            //header('Location: ./session.php'); //리다이렉션
            //exit;

        }
          //echo '로그인 하지 못했습니다.';

      ?>
      <script>
        alert("로그인 실패");
        location.href='http://localhost:8080/MusicAcademy/cal/cal.php';
      </script>


  </body>
</html>
