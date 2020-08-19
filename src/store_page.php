<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);


$store_review = "SELECT author, created, star, review FROM reviews WHERE store_id=GET으로 URL에 있는 id";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/topbar.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
  <title><?php 식당 이름 받아오기 ?></title>
</head>

<body>
    <h1>식당이름(PHP로 넣기)</h1>
    별점(리뷰수)
    <div>
      정보 탭
    </div>
    <div>
      <?php
      $result = mysqli_query($conn, $store_review);

      while($row = mysqli_fetch_array($result)){
        echo "{$row['author']}  {$row['created']}'<br>'{$row['star']}'<br>'{$row['review']}"; 여기 박스 안에 넣는 걸로 바꾸기
      }
       ?>
    </div>
</body>

</html>
