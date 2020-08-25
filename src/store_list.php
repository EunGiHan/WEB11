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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <title><?="{$row['category']}"?></title>
</head>

<body>
  <div class="container">
      <div class="top">
              <div style="text-align:center;"><a href="../index.php"><b style="color:white;">INHA-POT</b></a></div>
              <div> <input type="button" class="btn1" onclick="location.href='../index.php';" value="back"></div>
      </div><br>
      <div class="title">
          <strong><?="{$row['category']}"?></strong>
          <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:teal; margin-left:20px;">정렬
              <span class="caret"></span></button><br><br>
              <ul class="dropdown-menu">
                <li><a href="store_list.php?id=<?=$_GET['id']?>&sort=star">별점 높은 순</a></li>
                <li><a href="store_list.php?id=<?=$_GET['id']?>&sort=review">리뷰 많은 순</a></li>
                <li><a href="store_list.php?id=<?=$_GET['id']?>&sort=price">대표메뉴 가격 순</a></li>
              </ul>
          </div>
      </div>
      <div class="border"></div><br>
      <div>
        <a href="add_store.php?id=<?=$_GET['id']?>">
          <div  class= "add_store">
            <b>식당 추가하기</b>
          </div>
        </a></div>
      <?php
      $sql = "SELECT * FROM stores WHERE category={$_GET['id']}";
      if(isset($_GET['sort'])){
        if($_GET['sort'] == 'star'){
          $sql = "SELECT * FROM stores WHERE category={$_GET['id']} ORDER BY star DESC";
        } else if($_GET['sort'] == 'review'){
          $sql = "SELECT * FROM stores WHERE category={$_GET['id']} ORDER BY review_amount DESC";
        } else if ($_GET['sort'] == 'price') {
          $sql = "SELECT * FROM stores WHERE category={$_GET['id']} ORDER BY main_menu_price DESC";
        }
      }
      $result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_array($result)){
        echo "<div class=\"place\">";
        $name_menu = "
        <div>
            <b style=\"font-size:20px;\"><a href=\"store_page.php?store_id={$row['id']}\">"."{$row['name']}"."</a></b><br>
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
