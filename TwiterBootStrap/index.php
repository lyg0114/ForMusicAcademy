<?php
$conn = mysqli_connect("localhost", "root", "lyg3716");
mysqli_select_db($conn, "opentutorials");
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" type="text/css" href="http://localhost:8080/TwiterBootStrap/style.css">
  <link href="http://localhost:8080/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">

  </head>

<body id="target">
    <header>
    <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩">
        <h1><a href="http://localhost:8080/TwiterBootStrap/index.php">JavaScript</a></h1>
  </header>

  <div class="row">

    <nav class="col-md-3">
        <ol>
    <?php
    while( $row = mysqli_fetch_assoc($result)){
      echo '<li><a href="http://localhost:8080/TwiterBootStrap/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
    }
    ?>
        </ol>
    </nav>

<div class="col-md-9">
  <div id="control">
      <input type="button" value="white" onclick="document.getElementById('target').className='white'"/>
      <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
      <a href="http://localhost:8080/TwiterBootStrap/write.php">쓰기</a>
    </div>

    <article>
    <?php
    if(empty($_GET['id']) === false ) {
        $sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<h2>'.$row['title'].'</h2>';
        echo $row['description'];
    }
    ?>

    </article>

</div>




  </div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost:8080/bootstrap-3.3.4-dist/css/bootstrap.min.js"></script>

</body>
</html>
