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
  <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/restaurant.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <title>식당 메뉴 수정</title>
</head>

<body>
  <div class="container">
      <div class="top">
          <input type="button" class="btn" onclick="location.href='javascript:history.back()';" value="back">
          <input type="button" class="btn1" onclick="location.href='../index.php';" value="home" >
      </div>
      <div class="title">
          <b><?=$name?></b><br>
      </div>
      <div class="menubox">
        <form action="process_update_menu.php" method="POST">
          <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
          <div>
            <?php
            $sql = "SELECT main_menu, main_menu_price FROM stores WHERE id={$_GET['store_id']}";
            $result = mysqli_query($conn, $sql);
            $main_menu = mysqli_fetch_array($result);
             ?>
            <b>대표 메뉴</b><input type="text" name="main_menu" value="<?=$main_menu['main_menu']?>"><input type="text" name="main_menu_price" value="<?=$main_menu['main_menu_price']?>">원<br>
          </div>
          <div>
            <?php
            $sql = "SELECT * FROM menus WHERE store_id={$_GET['store_id']} ORDER BY price";
            $result = mysqli_query($conn, $sql);
            $arr_menu = array();
            $arr_price = array();
            $arr_id = array();
            $i = 0;
            while($row = mysqli_fetch_array($result)){
              $arr_menu[$i] = $row['menu'];
              $arr_price[$i] = $row['price'];
              $arr_id[$i] = $row['id'];
              echo "<input type=\"hidden\" name=\"menu_id[]\" value=\"{$arr_id[$i]}\">";
              echo "<input type=\"text\" name=\"menu[]\" value=\"{$arr_menu[$i]}\"><input type=\"text\" name=\"price[]\" value=\"{$arr_price[$i]}\">원<br>";
              $i = $i + 1;
            }
            ?>
          </div>
          <input type="submit" name="정보 수정">
        </form>
      </div>
  </div>
</body>

</html>
