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
    <link rel="stylesheet" href="../css/topbar.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <title><?="{$row['category']}"?></title>
</head>

<body>
    <a href="../index.php"><i class="fas fa-arrow-left fa-2x"></i></a>
    <h1><?="{$row['category']}"?></h1>
    <ol>  -나중에는 박스에 넣기 / 링크 주소 id를 store_id로 해야 하는데?
      <?php
        $sql = "SELECT * FROM stores WHERE category={$_GET['id']}";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)){
          echo "{$row['name']}, {$row['star']}, {$row['review_amount']}, {$row['main_menu']}, {$row['main_menu_price']}";
        }
      ?>
    </ol>
</body>

</html>
