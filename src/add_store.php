<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/category.css">
    <title>식당 추가</title>
  </head>
  <body>
    <div class="container">
      <div class="top">
        <input type="button" class="btn" onclick="location.href='javascript:history.back()';" value="back">
        <input type="button" class="btn1" onclick="location.href='../index.php';" value="home" >
      </div>
      <div class="title">
        <strong><?="{$row['category']}"?></strong>
      </div>
      <form action="process_create_store.php" method="POST">
        <input type="hidden" name="category" value="<?=$_GET['id']?>">
        <div>업체명</div> <div style="text-align:right;"><input type="text" name="name" placeholder = "업체명을 입력하세요." required></div>
        <div>대표메뉴</div> <div style="text-align:right;"><input type="text" name="main_menu" placeholder = "대표 메뉴를 입력하세요." required></div>
        <div>대표메뉴 가격</div> <div style="text-align:right;"><input type="text" name="main_menu_price" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');" placeholder = "대표 메뉴의 가격을 입력하세요." required></div>
        <div>주소</div> <div style="text-align:right;"><input type="text" name="address" placeholder = "주소를 입력하세요."></div>
        <div>운영시간</div> <div style="text-align:right;"><input type="text" name="hour" placeholder = "운영시간을 입력하세요."></div>
        <div>전화번호</div> <div style="text-align:right;"><input type="text" name="tel" placeholder = "전화번호를 입력하세요."></div>
        <div style="text-align: right;margin: 20px;"><input type="submit" name="추가하기"></div>
      </form>
    </div>
  </body>
</html>
