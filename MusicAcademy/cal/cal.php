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
<style media="screen">

<style media="screen">
@import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);
* {font-family: 'Nanum Gothic', serif;}

header{
  border-bottom:5px solid gray;
  padding: 40px;
}
header img{
  float:right;
  height: 100px;
}
#basicInfo{
  padding-left: 250px;
}
#list{
    border-right:5px solid gray;
    width:200px;
    height:900px;
    float:left;
  }
  #list ol
  {
    list-style: none;
    padding:0;

  }
  #sayHi{
    float:right;
    list-style: none;

    float: left;
    list-style: none;
    font-size: unset;
    font-style: oblique;
    font-variant-caps: titling-caps;
}
table{
    border-top-width: 2px;
    border-bottom-width: 2px;
    border-left-width: 2px;
    border-right-width: 2px;
}
table th{
  height: 40px;
}
table td{
  width : 150px;
  height: 100px;


}
.sun {text-align:left; color: deeppink;}
.mon {text-align:left;}
.tue {text-align:left;}
.wed {text-align:left;}
.thu {text-align:left;}
.fri {text-align:left;}
.sat {text-align:left; color: deepskyblue;}
#kCalendar{
  padding-left: 250px;
}
#dayinfo{
  padding-left: 250px;
}
#info{
  list-style: none;
  padding-left: 10px;
  padding-bottom: 5px;
  border: 2px;
}
#s,#m,#t,#w,#th,#f,#sa
{
  text-align: center;
}
</style>
</head>

<body id="target">
  <header>
    <img src="http://cafefiles.naver.net/20160825_43/16904659_1472123606443_SyUH5d_jpg/16904659_user_201326.jpg" alt="생활코딩">
    <h1><a href="http://localhost:8080/MusicAcademy/cal/cal.php">직장인 음악학원</a></h1>
    <li id="sayHi">반갑습니다. <?php  echo $_SESSION['name']." ";?> 님</li>
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
  <h1>TEST whdnseowkd</h1>
  <h1>TEST whdnseowkd2</h1>
  <h1>TEST whdnseowkd3</h1>
  <h1>TEST whdnseowkd4</h1>
  <h1>TEST whdnseowkd5</h1>
  <h1>TEST whdnseowkd6</h1>
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
<script>
Act();
selectMonth();
function selectMonth()
{
  var ThisMonth = new Date();
  var mon = document.getElementById('month');
  for(var i=0 ; i<mon.length ; i++)
  {
    if((mon[i].value == ThisMonth.getMonth()+1))
    { mon[i].selected = true;
    }
  }

}

function mySubmit(index) {

  var send = document.getElementById('send');
  if(index == 1) {
    send.action="http://localhost:8080/MusicAcademy/cal/Show.php";
    send.submit();
    }
    if(index == 2){
    send.action="http://localhost:8080/MusicAcademy/cal/calInsertDataProcess.php";
    send.submit();
    }
    if(index == 3){
    send.action="http://localhost:8080/MusicAcademy/cal/calDeleteData.php";
    send.submit();
    }
}
function printCalendar() {

    var kCalendar = document.getElementById('kCalendar');
    var title = document.getElementById('title');
    var nowYear = document.getElementById('recYear');
    var nowMonth = document.getElementById('recMonth');

      y = nowYear.value;
      m = nowMonth.value-1;

      var theDate=new Date(y, m, 1);
      console.log(theDate);
      var theDay=theDate.getDay();
      console.log(theDay);
      var last=[31,28,31,30,31,30,31,31,30,31,30,31];
      if(y%4 == 0 && y % 100 !=0 || y%400 == 0) lastDate=last[1]=29;
      var lastDate=last[m];
      var row=Math.ceil((theDay+lastDate)/7);
      console.log(row);
      var calendar="<table border='1' id='cal'>";
        calendar+="<tr>";
      calendar+="<th id='s' class='sun'>일</th>";
      calendar+="<th id='m' class='mon'>월</th>";
      calendar+="<th id='t' class='tue'>화</th>";
      calendar+="<th id='w' class='wed'>수</th>";
      calendar+="<th id='th' class='thu'>목</th>";
      calendar+="<th id='f' class='fri'>금</th>";
      calendar+="<th id='sa' class='sat'>토</th>";
        calendar+="</tr>";
var dateString = new Array('sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat');

      var dNum = 1;
      for(var i=1; i<=row; i++){
        calendar+="<tr>";


        for(var k=1; k<=7; k++){//열 생성 (td 태그 생성)
            /*행이 첫 줄이고 현재 월의 1일의 요일 이전은 모두 빈열로
            표기하고 날짜가 마지막 일보다 크면 빈열로 표기됩니다.*/
            if(i==1 && k <= theDay || dNum > lastDate){
              calendar+="<td class='" + dateString[k-1]+"'> &nbsp; </td>"; //이런경우 빈칸
             }
             else{
              calendar+= "<td class='" + dateString[k-1]+"' name='day' width='200' height='70'>" + dNum + "</td>"; //이런경우 날짜 입력
               dNum++;
             }
        }


      /*for(var k=1; k<=7; k++){

          if(i==1 && k <= theDay || dNum > lastDate){
            calendar+='<td class="' + dateString[k] + '"> </td>';
           }
           else{
            calendar+= calendar+= '<td name="day" class="' + dateString[j] + '">' + dNum + '</td>';
            dNum++;
           }
         }*/


      calendar+="</tr>";
  }//달력 완성!!
title.innerHTML = "<h2 id='dayinfo'>"+y+"."+(m+1)+"</h2>";
kCalendar.innerHTML = calendar;
}

function Act(){//완성된 calendar를 만든다!!
  printCalendar();
  var DBname = document.getElementsByClassName('DBname');
  var DBday = document.getElementsByClassName('DBday');
  var DBtime = document.getElementsByClassName('DBtime');
  var TheDay = document.getElementsByName('day');//class이름으로 검색
  for(var i=0; i < TheDay.length ; i++){
      for(var j=0; j< DBday.length; j++){
        if(TheDay[i].firstChild.nodeValue == DBday[j].firstChild.nodeValue) //날짜 검색
        {
          var li2 = document.createElement('li');
          var text2 = document.createTextNode(DBtime[j].firstChild.nodeValue+":00"+" "+DBname[j].firstChild.nodeValue);
          li2.append(text2);
          li2.id ="info";
          TheDay[i].append(li2);
        }

        }
    }

}
</script>

</body>
</html>
