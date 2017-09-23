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
      </body>
</html>

<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
     <link rel="stylesheet" type="text/css" href="http://localhost:8080/MusicAcademy/style.css">
</head>
<body id="target">
    <header>
      <img src="http://cafefiles.naver.net/20160825_43/16904659_1472123606443_SyUH5d_jpg/16904659_user_201326.jpg" alt="생활코딩">
      <h1><a href="http://localhost:8080/MusicAcademy/index.php">직장인 음악학원</a></h1>
    </header>

    <nav>
        <ol>
              <li><a href="http://localhost:8080/MusicAcademy/register/reg.php">회원가입</a></li>
              <li><a href="">로그인</a></li>
              <li><a href="">시간등록</a></li>

        </ol>
    </nav>

    <article>
      <?php echo $_SESSION['nic']." ";?> welecome <br />
      <?php echo $_SESSION['name']." ";?> welecome <br />
      <?php echo $_SESSION['id']." ";?> welecome <br />

      <a href="./logout.php">logout</a>

      <table border="1" width="500px" height="500">
        <thead>
          <tr>

          </tr>
        </thead>
        <tbody>
          <tr height = "30px">
              <td>1</td>  <td>2</td>      <td >3</td>   <td >4</td>
          </tr>

            <tr>
                <td>6:00~7:00 </td>  <td></td>      <td ></td>   <td ></td>
            </tr>

            <tr>
                <td>7:00~8:00</td>  <td></td>      <td></td>    <td ></td>
            </tr>

            <tr>
                <td>8:00~9:00</td>  <td></td>      <td ></td>   <td ></td>
            </tr>

            <tr>
                <td>9:00~10:00</td>  <td></td>      <td></td>   <td ></td>
            </tr>

        </tbody>

      </table>


    </article>

</body>
</html>
