
function ShowDay()
  {

    var date=new Date(); //날짜 객체 생성
    var nowY=date.getFullYear(); //현재 연도
    var nowM=date.getMonth(); //현재 월
    var nowD=date.getDate(); //현재 일

  var year = document.getElementById('year');
  var month = document.getElementById('month');
  var show = document.getElementById('show');
  var str = new Array(year.value, month.value);
  show.innerHTML = str[0]+"."+str[1];
}

function printCalendar() {

    var kCalendar = document.getElementById('kCalendar');
    var title = document.getElementById('title');
    var nowYear = document.getElementById('year'); //년 객체 가져옴
    var nowMonth = document.getElementById('month'); //월 객체 가져옴
//① 현재 날짜와 현재 달에 1일의 날짜 객체를 생성합니다.
//실질적 달력 만드는 부분의 시작!!
      y = nowYear.value;
      m = nowMonth.value-1;
      /* 현재 월의 1일에 요일을 구합니다.
       그럼 그달 달력에 첫 번째 줄 빈칸의 개수를 구할 수 있습니다.*/
      var theDate=new Date(y, m, 1);
      var theDay=theDate.getDay(); //시작점 구함 일->0 월->1 화->2 ...
      //② 현재 월에 마지막 일을 구해야 합니다.
      //1월부터 12월까지 마지막 일을 배열로 저장함.
      var last=[31,28,31,30,31,30,31,31,30,31,30,31];
      /*현재 연도가 윤년(4년 주기이고 100년 주기는 제외합니다.
      또는 400년 주기)일경우 2월에 마지막 날짜는 29가 되어야 합니다.*/
      if(y%4 == 0 && y % 100 !=0 || y%400 == 0) lastDate=last[1]=29;
      var lastDate=last[m]; //현재 월에 마지막이 몇일인지 구합니다.
      /*③ 현재 월의 달력에 필요한 행의 개수를 구합니다.
      var row(행의 개수)= Math.ceil( (theDay(빈 칸)+lastDate(월의 전체 일수)) / 7)*/
      var row=Math.ceil((theDay+lastDate)/7); //필요한 행수

      //④ 달력 년도/월 표기 및  달력 테이블 생성
      //문자결합 연산자를 사용해 요일이 나오는 행을 생성
      var calendar="<table border='1' id='cal'>";
        calendar+="<tr>";
      calendar+="<th>일</th>";
      calendar+="<th>월</th>";
      calendar+="<th>화</th>";
      calendar+="<th>수</th>";
      calendar+="<th>목</th>";
      calendar+="<th>금</th>";
      calendar+="<th>토</th>";
        calendar+="</tr>";

      var dNum = 1;
      //이중 for문을 이용해 달력 테이블을 생성
      for(var i=1; i<=row; i++){//행 생성 (tr 태그 생성)
        calendar+="<tr>";

        for(var k=1; k<=7; k++){//열 생성 (td 태그 생성)
          /*행이 첫 줄이고 현재 월의 1일의 요일 이전은 모두 빈열로
          표기하고 날짜가 마지막 일보다 크면 빈열로 표기됩니다.*/
          if(i==1 && k <= theDay || dNum > lastDate){ //theDay->시작점 ,lastDate->끝점
            calendar+="<td> &nbsp; </td>"; //이런경우 빈칸
           }
           else{
            calendar+= "<td class='day' width='200' height='70'>" + dNum + "</td>"; //이런경우 날짜 입력
             dNum++;
           }
      }


      calendar+="</tr>";
  }//달력 완성!!

title.innerHTML = "<h2>"+y+"."+(m+1)+"</h2>"; //출력!!!
kCalendar.innerHTML = calendar;

} ///////printCalendar 함수 영역;

function search()
{
  var searchday = document.getElementById('searchday');
  var searchTime = document.getElementById('searchTime');

  var searchTime2 = document.getElementById('sele');

  searchday.value; // 찾는날짜

  var TheDay = document.getElementsByClassName('day');//class이름으로 검색
  var student = document.getElementById('student'); //학생이름


  for(var i=0; i < TheDay.length; i++){
    if(TheDay[i].firstChild.nodeValue == searchday.value){ //날짜 검색
//        TheDay[i].firstChild.nodeValue += student.value;
        var li = document.createElement('li');
        var text = document.createTextNode(searchTime2.value+":00"+" "+student.value);
            //text = document.createTextNode(searchTime.value);
        li.append(text); //태그 완성

        TheDay[i].append(li);
        console.log(searchday.value);
        console.log(TheDay[i].firstChild.nodeValue);
      }
    }

}
//printCalendar();
