<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>로그인</title>
        <link rel="stylesheet" href="../css/login.css">
    </head>

    <body>
      <?php
        echo "
        <div class='login_box'>
        <div class='home'><a href='../index.php'><b>INHA-POT</b></a></div><br>
          <form action='../member/login_ok.php' method='POST'>
            <p><input type='text' name='userid' placeholder='사용자ID'></p>
            <p><input type='password' name='userpw' placeholder='비밀번호'></p>
            <button type='submit' id='btn' onClick='location.href=\"../index.php\"'>로그인</button><br><br>
            <a href='../member/member.php'>회원가입 하러가기</a>
          </form>
      </div>
        ";
      ?>
    </body>
</html>
