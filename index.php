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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <title>INHA-Pot</title>
</head>

<body>
    <div class="container">
        <div class="banner">
            INHA-POT
        </div>

        <?php
        if(isset($_SESSION['userid'])){
            echo "
            <div>
            <p>{$_SESSION['name']} 님 환영합니다.</p>
            <p><a href='./src/logout.php'>로그아웃</a></p>
            </div>
            ";
        }else {
          echo '
          <div class="login_box">
            <form action="./src/login_ok.php" method="POST">
                <table>
                    <tr>
                        <td>ID</td>
                        <td><input type="text" name="userid"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="userpw"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" id="btn">로그인</button></td>
                    </tr>
                    <tr>
                        <td><a href="./src/member.php">회원가입 하러가기</a></td>
                    </tr>
                </table>
            </form>
        </div>
          ';
        }
        ?>

        <div class="icon_box">
            <?php
      echo "<a href=\"./src/store_list.php?id=1\"><i class=\"fas fa-pepper-hot\">한식</i></a>
      <a href=\"./src/store_list.php?id=2\"><i class=\"fas fa-fish\">일식</i></a>
      <a href=\"./src/store_list.php?id=3\"><i class=\"fas fa-egg\">중식</i></a>
      <a href=\"./src/store_list.php?id=4\"><i class=\"fas fa-drumstick-bite\">양식</i></a>
      <a href=\"./src/store_list.php?id=5\"><i class=\"fas fa-cookie-bite\">분식</i></a>
      <a href=\"./src/store_list.php?id=6\"><i class=\"fas fa-utensils\">그 외</i></a>
      <a href=\"./src/store_list.php?id=7\"><i class=\"fas fa-coffee\">카페</i></a>
      <a href=\"./src/store_list.php?id=8\"><i class=\"fas fa-shipping-fast\">테이크아웃</i></a>
      <a href=\"./src/store_list.php?id=9\"><i class=\"fas fa-child\">혼밥</i></a>
      <a href=\"./src/store_list.php?id=10\"><i class=\"fas fa-clock\">24시간</i></a>
      ";

      ?>
        </div>

        <div id="review"><b>최근 등록된 리뷰</b></div>

        <?php
            $sql = "SELECT *, reviews.star as r_star FROM reviews LEFT JOIN stores ON reviews.store_id = stores.id ORDER BY created DESC limit 3";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
              echo $row['r_star'];
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
