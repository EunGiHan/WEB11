<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$sql = "SELECT * FROM stores WHERE id={$_GET['store_id']}";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
  $name = $row['name'];
  $star = $row['star'];
  $review_amount = $row['review_amount'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/restaurant.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <title><?=$name?></title>
</head>

<body>
  <div class="container">
      <div class="top">
          <input type="button" class="btn" onclick="location.href='javascript:history.back()';" value="back">
          <input type="button" class="btn1" onclick="location.href='../index.php';" value="home" >
      </div>
      <div class="title">
          <b><?=$name?></b><br>
          <?php
            for($i=5; $i>0; $i--){
              if($star > 0){
                echo "<span class=\"fa fa-star checked\"></span>";
                $star = $star - 1;
              } else{
                echo "<span class=\"fa fa-star\"></span>";
              }
            }
            echo "($review_amount)";
          }
           ?>
      </div>
      <table>
          <td id="share">공유</td>
          <td><a href="../src/write_review.php?store_id=<?=$_GET['store_id']?>">리뷰 작성하기</td>
      </table>
      <div class="information">
          <strong>정보</strong>
          <a href=#none id="show" onclick="if(hide1.style.display=='none') {hide1.style.display='';show.innerText='▲'} else {hide1.style.display='none';show.innerText='▶'}">▶</a>
          <div id="hide1" style="display: none">
              <div class="text1">주소<div class="address">인천광역시 미추홀구 인하로 64</div></div>
              <div class="text2">영업시간<div class="time">평일 10:00~21:00<br>주말 12:00~19:00<br>일요일은 정기 휴무</div></div>
              <div class="text3">전화번호<div id="plus">사용자 추가</div></div>
              <div class="text4">웹사이트<div id="plus">사용자 추가</div></div>
              <div><a href="update_info.php?store_id=<?=$_GET['store_id']?>">정보 수정 제안하기</a></div>
          </div>
      </div>
      <div class="menubox">
          <strong>메뉴</strong><br>
          <div class="menu">
            <?php
            $sql = "SELECT main_menu, main_menu_price FROM stores WHERE id={$_GET['store_id']}";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)){
              echo "{$row['main_menu']}"."-------------------------"."{$row['main_menu_price']}"."원<br>";
            }
             ?>
          </div>
          <div id="show2"><a href=#none id="show2" onclick="if(hide2.style.display=='none') {hide2.style.display='';show2.innerText='닫기'} else {hide2.style.display='none';show2.innerText='더보기'}">더보기</a></div>
          <div id="hide2" style="display: none">
              나머지 메뉴 보이기!!<br>
              <a href="update_store_info.php?store_id=<?=$_GET['store_id']?>">정보 수정 제안하기</a>
          </div>
      </div>
      <div class="reviewbox">
          <strong>리뷰 (<?= $review_amount ?>건)</strong>
          <div class="review">
                    <div class="rating">
                        작성자<br>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="comment">
                        맛있어요 사케동 맛있어요.
                    </div>
      </div>
  </div>
</body>

</html>
