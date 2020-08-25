<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/add_store.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <title>식당 추가</title>
  </head>
  <body>
    <div class="container">
      <div class="top">
            <div style="text-align:center;"><a href="index.html"><b style="color:white; text-decoration:none;">INHA-POT</b></a></div>
            <input type="button" class="btn1" onclick="location.href='javascript:history.back()';" value="back">
      </div><br>
      <div class="title">
        <strong style="font-size:20px;"><?="{$row['category']}"?></strong>
      </div><br>
      <div class="border"></div><br>
      <form action="process_create_store.php" method="POST">
        <input type="hidden" name="category" value="<?=$_GET['id']?>">
        <div class="text">업체명<input type="text" name="name" placeholder = "업체명을 입력하세요." style="float:right;"required></div><br>
        <div class="text">대표메뉴<input type="text" name="main_menu" placeholder = "대표 메뉴를 입력하세요." style="float:right;" required></div><br>
        <div class="text">대표메뉴 가격<input type="text" name="main_menu_price" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');" placeholder = "대표 메뉴의 가격을 입력하세요." style="float:right;" required></div><br>
        <div class="text">주소<input type="text" name="address" placeholder = "주소를 입력하세요." style="float:right;"></div><br>
        <div class="text">운영시간<input type="text" name="hour" placeholder = "운영시간을 입력하세요." style="float:right;"></div> <br>
        <div class="text">전화번호<input type="text" name="tel" placeholder = "전화번호를 입력하세요." style="float:right;"></div> <br>
        <div style="text-align: right;margin: 20px;"><input type="submit" name="추가하기"></div>
      </form>
    </div>
  </body>
</html>
