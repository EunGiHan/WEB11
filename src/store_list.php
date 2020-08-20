<?php
$conn = mysqli_connect(
  'localhost',
  'inhapot',
  'inha8302#11',
  'inhapot'
);

$sql = "SELECT * FROM categories WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/category.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title><?="{$row['category']}"?></title>
</head>

<body>
  <div class="container">
      <div class="top">
          <input type="button" class="btn" onclick="location.href='javascript:history.back()';" value="back">
          <input type="button" class="btn1" onclick="location.href='../index.php';" value="home" >
      </div>
      <div class="title">
          <strong><?="{$row['category']}"?></strong>
          <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">정렬
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">별점 높은 순</a></li>
                <li><a href="#">리뷰 많은 순</a></li>
                <li><a href="#">대표메뉴 가격 순</a></li>
              </ul>
          </div>
      </div>
      <?php
      $sql = "SELECT * FROM stores WHERE category={$_GET['id']}";
      $result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_array($result)){
        $box_div = "<div class=\"place\">";
        $img = "<img src=\"../assets/food_1.jpg\" width=\"150px\" height=\"100px\" >";
        echo $box_div;
        echo $img;

        $name_menu = "
        <div>
            <b><a href=\"store_page.php?store_id={$row['id']}\">"."{$row['name']}"."</a></b><br>
            <div class=\"menu\">"."{$row['main_menu']}"."</div>
        </div>
        ";
        echo $name_menu;

        $rating = "<div class=\"rating\">";
        echo $rating;

        $star = $row['star'];
        for($i=5; $i>0; $i--){
          if($star > 0){
            echo "<span class=\"fa fa-star checked\"></span>";
            $star = $star - 1;
          } else{
            echo "<span class=\"fa fa-star\"></span>";
          }
        }
        echo "리뷰 "."{$row['review_amount']}"."건<br><br>"."{$row['main_menu_price']}"."원</div></div>";
      }
       ?>

</body>

</html>
