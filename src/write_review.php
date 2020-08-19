<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'inhapot'
);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/topbar.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <title>리뷰 작성</title>
</head>

<body>
    <h1>식당이름(PHP로 넣기/해당 페이지에서 연결될 때 계속 설정 가져가는 법?)</h1>
    <p>별점 선택</p>
    <p>별점을 선택하세요.</p>
    <p>
      <form action="process_create.php" method="POST">
          <input type="hidden" name="num" value="<?=$_GET['store_id']?>">  --여기 id값을 식당 아이디로?URL파라미터 GET으로
          <p><textarea name="review" cols="30" rows="10" placeholder="리뷰를 입력하세요"></textarea></p>
          <p><input type="submit" name="리뷰 등록"></p>
      </form>
    </p>

</body>

</html>
