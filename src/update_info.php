<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$sql = "SELECT * FROM stores WHERE id={$_GET['store_id']}";  // 식당의 아이디로. POST방식임에 유의
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
$article = array(
  'main_menu'=>htmlspecialchars($row['main_menu']),
  'main_menu_price' => htmlspecialchars($row['main_menu_price']),
  'address' => htmlspecialchars($row['address']),
  'hour' => htmlspecialchars($row['hour']), // 만약에 입력값에 줄바꿈 있다면?
  'tel'=> htmlspecialchars($row['tel'])
);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/topbar.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <title>식당 정보 수정</title>
</head>

<body>
    <h1><?=$row['name']?></h1>
    <div>
      <form action="process_update_info.php" method="POST">
          <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
          <div id="hide1" style="display: none">
              <div class="text1">주소<div class="address"><input type="text" name="address"><?=$article['address']?></div></div>
              <div class="text2">영업시간<div class="time"><input type="text" name="hour"><?=$article['hour']?></div></div>
              <div class="text3">전화번호<div id="plus"><input type="text" name="tel"><?=$article['tel']?></div></div>
          </div>
          <p><input type="submit" name="리뷰 수정"></p>
      </form>
    </div>

</body>

</html>
