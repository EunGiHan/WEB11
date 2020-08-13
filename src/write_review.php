<?php 
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'web11'
);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/topbar.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="https://kit.fontawesome.com/78e43f918f.js" crossorigin="anonymous"></script>
    <title>리뷰 작성</title>
</head>

<body>
    <h1>한식</h1>
    <ol>
        <?php 
    $sql = "SELECT * FROM korean";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){
      echo "<h3>{$row['title']} : {$row['description']} <input type='button' value='리뷰보러가기' 
      onClick='location.href=\"store_list_korean.php?id={$row['id']}\"'></h3>";
    }
    ?>
    </ol>
    <form action="process_create.php" method="POST">
        <input type="hidden" name="num" value="<?=$_GET['id']?>">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" cols="30" rows="10" placeholder="description"></textarea></p>
        <p><input type="submit"></p>
    </form>
</body>

</html>