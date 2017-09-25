
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
              // calendar+= "<td class='" + dateString[k-1]+"' name='day' width='200' height='70'><li>" + dNum + "</li></td>"; //이런경우 날짜 입력
              calendar+= "<td class='" + dateString[k-1]+"' name='day' width='200' height='70'>" + dNum + "</td>"; //이런경우 날짜 입력
               dNum++;
             }
        }
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
