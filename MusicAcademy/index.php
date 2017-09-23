<?php
  $conn = mysqli_connect("localhost","root","lyg3716");
  mysqli_select_db($conn,"opentutorials");
  $result = mysqli_query($conn, " SELECT * FROM topic");
 ?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <!-- <link rel="stylesheet" type="text/css" href="http://localhost:8080/MusicAcademy/style.css"> -->
     <style media="screen">
     body.white{
       background-color: white;
       color:black;
     }
     body.black{
       background-color: black;
       color:white;
     }

     header{
       border-bottom:5px solid gray;
       padding: 40px;
     }

     h1{
       padding-left: 100;
     }

     nav{
         border-right:5px solid gray;
         width:200px;
         height:600px;
         float:left;
       }
       nav ol
       {
         list-style: none;
         padding:0;

       }
       article{
         float:left;
         padding:20px;
         width:350px;
       }

     header img{
       float:right;
       height:100px;
     }
     #control{
         float:right;
       }

     </style>
</head>
<body id="target">

    <header>
      <img src="http://cafefiles.naver.net/20160825_43/16904659_1472123606443_SyUH5d_jpg/16904659_user_201326.jpg" alt="생활코딩">
      <h1><a href="http://localhost:8080/MusicAcademy/index.php">직장인 음악학원</a></h1>
    </header>

    <nav>
        <ol>
              <li><a href="http://localhost:8080/MusicAcademy/register/reg.php">회원가입</a></li>
              <li><a href="http://localhost:8080/MusicAcademy/login/login.html">로그인</a></li>
              <li><a href="">시간등록</a></li>

        </ol>
    </nav>

    <article>
      fas;kldf
    </article>

</body>
</html>
