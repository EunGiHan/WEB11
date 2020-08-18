<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'web11'
);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/store_icon_box.css">
  <link rel="stylesheet" href="../css/topbar.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
  <title>INHA-Pot</title>
</head>

<body>
  <img class="home_top" src="../assets/home_top_img.jpg">
  <div>
    <h2>메뉴/테마별 식당 목록 보기</h2>
    <div class="box-gray">
      <a href="store_list_korean.php"><span>한식</span></a>
      <a href="write_refiew.php?id=2"><span>중식</span></a>
      <a href="write_refiew.php?id=3"><span>일식</span></a>
      <a href="write_refiew.php?id=4"><span>양식</span></a>
      <a href="write_refiew.php"><i class="fas fa-pizza-slice fa-2x"></i></a>
      <a href="write_refiew.php"><i class="fas fa-drumstick-bite fa-2x"></i></a>
      <a href="write_refiew.php"><i class="fas fa-hamburger fa-2x"></i></a>
      <a href="write_refiew.php"><i class="fas fa-cookie-bite fa-2x"></i></a>
      <a href="write_refiew.php"><i class="fas fa-mug-hot fa-2x"></i></a>
      <a href="write_refiew.php"><i class="fas fa-beer fa-2x"></i></a>
    </div>
  </div>
  <div>
    <h2>최근 등록된 리뷰</h2>
    <div class="box-gray">
      <?php
      $lately_reivew = "SELECT author, created, star, review FROM reviews LEFT JOIN stores ON reviews.store_id = stores.id LIMIT 3"
      echo "{$row['author']}  {$row['created']}'<br>'{$row['star']}'<br>'{$row['review']}"; 박스에 넣기
        ?>
    </div>
  </div>
</body>

</html>
