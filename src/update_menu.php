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
  <link rel="stylesheet" href="../css/update_menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <title>식당 메뉴 수정</title>
</head>

<body>
  <div class="container">
      <div class="top">
            <div style="text-align:center;"><a href="index.html"><b style="color:white; text-decoration:none;">INHA-POT</b></a></div>
            <input type="button" class="btn1" onclick="location.href='javascript:history.back()';" value="back">
      </div><br>
      <div class="title">
          <b style="font-size:20px;"><?=$name?></b>
      </div><br>
      <div class="border"></div><br>
      <div class="menubox">
        <form action="process_update_menu.php" method="POST">
          <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
          <div class="best">
            <?php
            $sql = "SELECT main_menu, main_menu_price FROM stores WHERE id={$_GET['store_id']}";
            $result = mysqli_query($conn, $sql);
            $main_menu = mysqli_fetch_array($result);
             ?>
            <b>대표메뉴: </b><input type="text" name="main_menu" value="<?=$main_menu['main_menu']?>"><div style="float:right;"><input type="text" name="main_menu_price" value="<?=$main_menu['main_menu_price']?>">원</div><br>
          </div><br>
          <div class="text">
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
              echo "<input type=\"text\" name=\"menu[]\" value=\"{$arr_menu[$i]}\"><div style="float:right;"><input type=\"text\" name=\"price[]\" value=\"{$arr_price[$i]}\">원</div><br><br>";
              $i = $i + 1;
            }
            ?>
          </div>
          <input type="submit" name="정보 수정" style="float:right; margin:20px;">
        </form>
      </div>
  </div>
</body>

</html>
