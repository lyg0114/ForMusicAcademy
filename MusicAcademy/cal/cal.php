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
  <link rel="stylesheet" type="text/css" href="http://localhost:8080/MusicAcademy/cal/cal.css">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" type="text/css" href="http://localhost:8080/TwiterBootStrap/style.css">
  <link href="http://localhost:8080/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="target">
  <header class="jumbotron text-center">
      <img  style="width:500px" id="logo" src="http://cafefiles.naver.net/20160825_43/16904659_1472123606443_SyUH5d_jpg/16904659_user_201326.jpg">
      <h1><a href="http://localhost:8080/MusicAcademy/cal/cal.php">직장인 음악학원</a></h1>
      <h1 id="sayHi">반갑습니다.<?php  echo $_SESSION['name']." ";?> 님</h1>
  </header>

  <nav id="list">
      <ol>
            <li><a href="http://localhost:8080/MusicAcademy/login/logout.php">로그아웃</a></li>

      </ol>
  </nav>
  <?php // 년월에 해당되는 정보를 DB에서 가져옴!!
    $conn = mysqli_connect("localhost", "root", "lyg3716");
    mysqli_select_db($conn, "meminfo");

if(Empty($_POST['year']))
{
  print '<input style="display:none" id="recYear"' .'value='.'"'.date("Y").'"'.'>';
  print '<input style="display:none" id="recMonth"' .'value='.'"'.date("n").'"'.'>';
}
else{
  print '<input style="display:none" id="recYear"' .'value='.'"'.$_POST['year'].'"'.'>';
  print '<input style="display:none" id="recMonth"' .'value='.'"'.$_POST['month'].'"'.'>';

}

/////////////////////////////////////////////////////////////////////////////////////
    if(Empty($_POST['year']))
    {
      $sql = 'SELECT name'.",".'day'.","."time"." "."FROM"." "."`".date("Yn")."`";
    }
    else
    {
      $sql = 'SELECT name'.",".'day'.","."time"." "."FROM"." "."`".$_POST['year'].$_POST['month']."`";
    }
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
      print '<li style="display:none" class="DBname">'.$row['name'].'</li>';
      print '<li style="display:none" class="DBday">'.$row['day'].'</li>';
      print '<li style="display:none" class="DBtime">'.$row['time'].'</li>';
  }
  ?>
<nav id="basicInfo">
  <p> 시간 예약하기 </p>
  <form name = "success" method="post" id="send">
    <p> 년 : <input type="text" name ='year' id="year" value = "2017"/></p>
    <p> 월 : <select  id="month"  name= 'month'>
      <option calss ="c" value="1">1</option>
      <option calss ="c" value="2">2</option>
      <option calss ="c" value="3">3</option>
      <option calss ="c" value="4">4</option>
      <option calss ="c" value="5">5</option>
      <option calss ="c" value="6">6</option>
      <option calss ="c" value="7">7</option>
      <option calss ="c" value="8">8</option>
      <option calss ="c" value="9" >9</option>
      <option calss ="c" value="10">10</option>
      <option calss ="c" value="11">11</option>
      <option calss ="c" value="12">12</option>
    </select></p>
    <p id="show"> </p>
    <p> 선택날짜 : <input type="text" id="searchday" name="searchday" value = "10"/></p>
    <p> 선택시간 : <select id="sele" name="reserVationTime">
      <option id="six" value="6">6:00</option>
      <option id="seven" value="7">7:00</option>
      <option id="eight" value="8">8:00</option>
    </select>
  </p>
<input id ="mon" type="button" value="날짜확인" onclick= 'mySubmit(1)'/>
  <input id ="res" type="button" value="예약하기" onclick= 'mySubmit(2)'/>
  <input id ="del" type="button" value="예약취소" onclick= 'mySubmit(3)'/>

  </form>
</nav>

<h3 id = "title"></h3>
<div id="kCalendar"></div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://localhost:8080/MusicAcademy/cal/cal.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="http://localhost:8080/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

</body>
</html>
