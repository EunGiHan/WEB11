<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'inhapot'
);

$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)) {
  $list = $list."<a href=\"store_list.php?id={$row['id']}\"><i class=\"fas fa-pepper-hot\">{$row['category']}</i></a>";
  // 각 카테고리 맞게 아이콘 수정 필요
}
$sql2 = "SELECT * FROM reviews LEFT JOIN stores ON reviews.store_id = stores.id ORDER BY created DESC limit 3";
$result2 = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="homepage.css">
  <link rel="stylesheet" href="responsive.css">
  <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
  <title>INHA-Pot</title>
</head>

<body>
  <div class="container">
    <div class="banner">
        INHA-POT
    </div>
    <div class="icon_box">
      <?=$list?>
      <!--<a href="store_list_korean.html"><i class="fas fa-pepper-hot">한식</i></a>
      <a href="store_list_japanese.html"><i class="fas fa-fish">일식</i></a>
      <a href="store_list_chinese.html"><i class="fas fa-egg">중식</i></a>
      <a href="store_list_western.html"><i class="fas fa-drumstick-bite">양식</i></a>
      <a href="store_list_bunsik.html"><i class="fas fa-cookie-bite">분식</i></a>

      <a href="store_list_cafe.html"><i class="fas fa-coffee">카페</i></a>
      <a href="store_list_takeout.html"><i class="fas fa-shipping-fast">takeout</i></a>
      <a href="store_list_honbap.html"><i class="fas fa-child">혼밥</i></a>
      <a href="store_list_24hours.html"><i class="fas fa-clock">24시간</i></a>
      <a href="store_list_etc.html"><i class="fas fa-utensils">etc</i></a>-->
    </div>

    <div id="review"><b>최근 등록된 리뷰</b></div>
    <?php
    $i = 0;
    while($i<3){
      $row = mysqli_fetch_array($result2)
      // 클래스에 review_box 한 개로 수정하기, 가게의 카테고리 출력, $row['name']해도 출력 잘 되나?
      $recent_review1 = "<div class=\"reviewbox_1\">
        <div>{$row['name']}</div>
        <div class=\"rating\">";
      $recent_review2 = "<div class=\"date\">{$row['created']}</div>
            <div class=\"text\">{$row['review']}</div>
            </div>
          </div>";
      echo $recent_review1;
      $stars = $row['star'];
      $shine_star="<span class=\"fa fa-star checked\"></span>";
      $dead_star="<span class=\"fa fa-star\"></span>"
      for($i=0;$i<5;$i++){
        if($stars!=0){
          //echo "<span class=\"fa fa-star checked\"></span>";
          echo $shine_star;
          $stars = $stars - 1;
        } else{
          echo $dead_star;
          //echo "<span class=\"fa fa-star\"></span>";
        }
      }
      echo $recent_review2;
      $i = $i + 1;
    }
     ?>
  </div>
</body>

</html>
