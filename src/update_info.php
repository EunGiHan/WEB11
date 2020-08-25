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
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/add_store.css">
    <title>식당 정보 수정</title>
    </head>

    <body>
        <div class="container">
            <div class="top">
                <div style="text-align:center;"><a href="index.html"><b style="color:white; text-decoration:none;">INHA-POT</b></a></div>
                <input type="button" class="btn1" onclick="location.href='javascript:history.back()';" value="back">
            </div><br>
            <div class="title">
            <strong style="font-size:20px;"><?=$row['name']?></strong>
            </div><br>
            <div class="border"></div><br>
            <form action="process_create_store.php" method="POST">
                    <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
                    <div class="text">주소<input type="text" name="address" style="float:right;" value="<?=$article['address']?>"></div><br>
                    <div class="text">영업시간<input type="text" name="hour" style="float:right;" value="<?=$article['hour']?>"></div><br>
                    <div class="text">전화번호<input type="text" name="tel" style="float:right;" value="<?=$article['tel']?>"></div><br>
                    <p><input type="submit" name="리뷰 수정" style="text-align: right;margin: 20px;"></p>
            </form>
        </div>
    </body>

</html>
