<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$sql = "SELECT * FROM stores WHERE id='{$_GET['store_id']}'";
$result = mysqli_query($conn, $sql);

// stores에 저장된 정보 가져오기
while($row = mysqli_fetch_array($result)){
  $category = $row['category']; // 식당 카테고리
  $name = $row['name']; // 식당 이름
  $star = $row['star']; // 식당 별점 평균
  $review_amount = $row['review_amount']; // 식당 리뷰 수
  $address = $row['address']; // 주소
  $hour = $row['hour']; // 운영시간
  $tel = $row['tel']; // 전화번호
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/restaurant.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
  <title><?=$name?></title>
</head>

<body>
  <div class="container">
    <div class="top">
      <div style="text-align:center;"><a href="../index.php"><b style="color:white; text-decoration:none;">INHA-POT</b></a></div>
      <input type="button" class="btn1" onclick="location.href='store_list.php?id=<?=$category?>';" value="back">
    </div><br>

    <div class="title">
      <b class="name"><?=$name?></b><br>
        <?php
          $star_origin = $star;
          // 식당 별점 평균에 따라 별 출력하기
          for($i=5; $i>0; $i--){
            if($star > 0){
              echo "<span class=\"fa fa-star checked\"></span>";
              $star = $star - 1;
            } else{
              echo "<span class=\"fa fa-star\"></span>";
            }
          }
          // 식당 리뷰 수를 별점 옆에 출력하기
          echo "($review_amount)";
       ?>
    </div>

    <table>
      <?php
      // 만약 로그인을 한 상태라면? 공유&리뷰작성 둘 다 활성화
      if(isset($_SESSION['name'])) {
      ?>

      <td id="share"><a id="kakao-link-btn" href="javascript:sendLink()">카카오톡으로 공유하기</a></td>
      <script type="text/javascript">
      //카카오톡 공유기능
      Kakao.init('2d9e02bbf3e491073a84b72ed8376f1f');
      function sendLink() {
          Kakao.Link.sendCustom({
              templateId: 34900,
              templateArgs: {
                  title: 'INHA-POT',
                  description: 'http://inhapot.dothome.co.kr/src/store_page.php?store_id=<?=$_GET['
                  store_id ']?>',
              },
          })
      }
      </script>

      <td><a href="../src/write_review.php?store_id=<?=$_GET['store_id']?>">리뷰 작성하기</td>
      <?php
       // 로그인을 하지 않았다면? 공유하기 버튼만 활성화
      } else{
         echo '
        <td id="share"><a id="kakao-link-btn" href="javascript:sendLink()">카카오톡으로 공유하기</a></td>
        <script type="text/javascript">
        Kakao.init(\'2d9e02bbf3e491073a84b72ed8376f1f\');

        function sendLink() {
            Kakao.Link.sendCustom({
                templateId: 34900,
                templateArgs: {
                    title: \'INHA-POT\',
                    description: "해당 페이지 URL",
                },
            })
        }
        </script>';
        }
     ?>
    </table>

    <div class="information">
      <strong>정보</strong>
      <a href=#none id="show"
          onclick="if(hide1.style.display=='none') {hide1.style.display='';show.innerText='▲'}
                    else {hide1.style.display='none';show.innerText='▶'}">
          ▶
      </a>
      <div id="hide1" style="display: none">
        <?php
            echo "<div class=\"text1\">주소<div class=\"address\">"."{$row['address']}"."</div></div>";
            echo "<div class=\"text2\">영업시간<div class=\"time\">"."{$row['hour']}"."</div></div>";
            echo "<div class=\"text3\">전화번호<div id=\"plus\">"."{$row['tel']}"."</div></div><br>";
          } // 식당 정보 출력하는 while 문 끝
        ?>
        <div style="text-align: center;">
          <a href="update_info.php?store_id=<?=$_GET['store_id']?>">
            -정보 수정 제안하기-
          </a>
        </div>
      </div>
    </div>

    <div class="menubox">
      <strong>메뉴</strong><br>
      <div class="menu">
        <?php
          // 대표 메뉴 보이기
          $sql = "SELECT main_menu, main_menu_price FROM stores WHERE id={$_GET['store_id']}";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result);
          echo "<div style='float:left'>[대표 메뉴]"."{$row['main_menu']}</div>"."      "."<div style='display: inline-block; float: right'>{$row['main_menu_price']}"."원</div><br>";
        ?>
        <br>
        <a href=#none id="show2"
          onclick="if(hide2.style.display=='none') {hide2.style.display='';show2.innerText='-접기-'}
                    else {hide2.style.display='none';show2.innerText='-다른 메뉴 더보기-'}">
          -다른 메뉴 더보기-
        </a>
        <br><br>
        <div id="hide2" style="display: none">
          <?php
            // 대표 외 다른 메뉴를 보이기
            $sql = "SELECT * FROM menus WHERE store_id={$_GET['store_id']} ORDER BY price DESC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
              echo "<div style='float:left'>"."{$row['menu']}</div>"."      "."<div style='display: inline-block; float: right'>{$row['price']}"."원</div><br>";
            }
          ?>
          <br><a href="update_menu.php?store_id=<?=$_GET['store_id']?>">-메뉴 정보 수정 제안하기-</a>
        </div>
      </div>
    </div>

    <div class="reviewbox" style="overflow:hidden;">
      <?php
      echo "<strong>리뷰 ("."{$review_amount}"."건)</strong>";
      $sql = "SELECT * FROM reviews WHERE store_id={$_GET['store_id']} ORDER BY created DESC";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){
        $class_review = "<div class='review'>";
        echo $class_review;

        $class_rating = "<div class=\"rating\">";
        echo $class_rating;

        // author 표현
        echo "<div style='float:left'>{$row['author']}"."</div>";
        if(isset($_SESSION)  && $_SESSION['name'] == $row['author'] ){
          $update_link = "update_review.php?store_id='".$_GET['store_id']."'&id='".$row['id']."'";
          $review_id = $row['id'];
      ?>
        <div class="buttons">
          <form action="<?php echo $update_link;?>">
            <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
            <input type="hidden" name="star_count" value="<?php echo $star_origin;?>">
            <input type="hidden" name="comment" value="<?php echo $row['review'];?>">
            <input type="hidden" name="review_id" value="<?php echo $row['id'] ?>">
            <input type="submit" value="수정">
          </form>
          <form action="process_delete.php" method="post">
            <input type="hidden" name="id" value="<?=$review_id?>">
            <input type="hidden" name="store_id" value="<?=$_GET['store_id']?>">
            <input type="submit" value="삭제" style="margin-left: 10px">
          </form>
        </div><br>
        <?php
        }
        // 각 리뷰의 별점 출력
        $star = $row['star'];
        for($i=5; $i>0; $i--){
          if($star > 0){
            echo "<span class=\"fa fa-star checked\"></span>";
            $star = $star - 1;
          } else{
            echo "<span class=\"fa fa-star\"></span>";
          }
        }
        echo "</div>";
        // 각 리뷰의 리뷰(comment) 출력
        echo "<div class=\"comment\">"."{$row['review']}"."</div></div>";
        }
        ?>
    </div>
  </div>
</body>

</html>
