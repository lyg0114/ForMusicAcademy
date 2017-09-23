
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>

  </body>
</html>

<?php
session_start(); //세션 시작
$id = 'egoing';
$pwd = 'codingeverybody'; //미리 저장되어있는 회원정보 --> DB연동 시킬것임

if(!empty($_POST['id']) && !empty($_POST['pwd'])){ //두개의 정보가 모두 들어왔을때

    if($_POST['id'] == $id && $_POST['pwd'] == $pwd){ //검증 DB에다가 반복문 쓰면서 확인
  //맞으면 DB에서 해당 회원 정보를 가져와서 세션에다가 저장
        $_SESSION['is_login'] = true;
        $_SESSION['nickname'] = '이영교';

        header('Location: ./session.php'); //리다이렉션
        exit;
    }
}
echo '로그인 하지 못했습니다.';
?>
