

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="http://localhost:8080/MusicAcademy/style.css">
</head>
<body id="target">
    <header>
      <img src="http://cafefiles.naver.net/20160825_43/16904659_1472123606443_SyUH5d_jpg/16904659_user_201326.jpg" alt="생활코딩">
      <h1><a href="http://localhost:8080/MusicAcademy/index.php">직장인 음악학원</a></h1>
    </header>

    <nav>
        <ol>
              <li><a href="">회원가입</a></li>
              <li><a href="http://localhost:8080/MusicAcademy/login/login.html">로그인</a></li>
              <li><a href="">시간등록</a></li>

        </ol>
    </nav>

    <article>

      <form action = "http://localhost:8080/MusicAcademy/register/register_process.php" method="post">
          <p><label>아이디 : </label> <input type="text" name="id" /></p>
          <p><label>비밀번호 : </label ><input type="text" name="pwd" /></p>
          <p><label>이름 : </label> <input type="text" name="name" /></p>
          <p><label>전화번호 : </label> <input type="text" name="pnum" /></p>
          <p><label>닉네임 : </label> <input type="text" name="nic" /></p>
            <input type="submit" value = "confirm"/>
    </article>

</body>
</html>
