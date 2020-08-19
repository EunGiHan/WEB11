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
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/topbar.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
  <title><?=$name?></title>
</head>

<body>
    <h1><?=$name?></h1>
    <?php echo "{$star}({$review_amount})" //star은 나중에 별 개수로 바꾸어놓기?>
    <div>
      정보 탭
    </div>
    <div>
      <?php
      $sql = "SELECT * FROM reviews WHERE store_id={$_GET['store_id']}";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){
        echo "{$row['author']}  {$row['created']}'<br>'{$row['star']}'<br>'{$row['review']}";
      }
       ?>
    </div>
</body>

</html>
