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
    <link rel="stylesheet" href="./font/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <title>INHA-Pot</title>
</head>

<body>
    <div class="container">
      <div class="banner">
        <div style="font-size:50px; color:whitesmoke"><b>INHA-POT</b></div>
        <?php
        if(isset($_SESSION['userid'])){
            echo '<i class="fas fa-user-alt">'.$_SESSION["name"].'님 환영합니다.</i>
            <a href="../member/logout.php"><button type="logout" id="btn">로그아웃</button></a>';
        }else {
          echo '<a href="./member/login.php"><i class="fas fa-user-alt" style="float:right; margin-top:-15px; margin-right:15px;">로그인</i></a>';
        }
        ?>


      </div>
        <div class="icon_box">
            <?php
      echo "<div><a href=\"./src/store_list.php?id=1\"><i class=\"flaticon-bibimbap\"></i></a><br>한식</div>
            <div><a href=\"./src/store_list.php?id=2\"><i class=\"flaticon-tuna\"></i></a><br>일식</div>
            <div><a href=\"./src/store_list.php?id=3\"><i class=\"flaticon-dumpling\"></i></a><br>중식</div>
            <div><a href=\"./src/store_list.php?id=4\"><i class=\"flaticon-pizza\"></i></a><br>양식</div>
            <div><a href=\"./src/store_list.php?id=5\"><i class=\"flaticon-fish-cake\"></i></a><br>분식</div>
            <div><a href=\"./src/store_list.php?id=6\"><i class=\"flaticon-restaurant\"></i></a><br>그 외</div>
            <div><a href=\"./src/store_list.php?id=7\"><i class=\"flaticon-coffee-beans\"></i></a><br>카페</div>
            <div><a href=\"./src/store_list.php?id=8\"><i class=\"far fa-heart fa-3x\"style=\"margin-top:3px;\"></i></a><br><p style=\"margin-top:5px;\">데이트</p></div>
            <div><a href=\"./src/store_list.php?id=9\"><i class=\"flaticon-eat\"></i></a><br>혼밥</div>
            <div><a href=\"./src/store_list.php?id=10\"><i class=\"flaticon-clock\"></i></a><br>24시간</div>
      ";

      ?>
        </div>

        <div id="review"><b>최근 등록된 리뷰</b></div>

        <?php
            $sql = "SELECT *, reviews.star as r_star FROM reviews LEFT JOIN stores ON reviews.store_id = stores.id ORDER BY created DESC limit 3";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
              $top = "<div class=\"reviewbox\">";
              echo $top;

              $name = "<div><a href=\"./src/store_page.php?store_id={$row['store_id']}\">"."{$row['name']}"."</a></div>";
              echo $name;

              $rating = "<div class=\"rating\">";
              echo $rating;

              $star = $row['r_star'];
              for($i=5; $i>0; $i--){
                if($star > 0){
                  echo "<span class=\"fa fa-star checked\"></span>";
                  $star = $star - 1;
                } else{
                  echo "<span class=\"fa fa-star\"></span>";
                }
              }
              $date = "<div class=\"date\">"."{$row['created']}"."</div>";
              $text = "<div class=\"text\">"."{$row['review']}"."</div>";
              echo $date;
              echo $text;
            }
            ?>



    </div>
    </div>
    </div>
</body>

</html>
