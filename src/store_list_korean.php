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
    <title>목록 - 한식</title>
</head>

<body>
    <a href="index.html"><i class="fas fa-arrow-left fa-2x"></i></a>
    <h1>한식</h1>
    <ol>
        <?php 
    $sql = "SELECT * FROM korean";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){
      echo "<h3>{$row['title']} : {$row['description']} <input type='button' value='리뷰보러가기' 
      onClick='location.href=\"store_list_korean.php?id={$row['id']}\"'></h3>";
    }
    
    $sql = "SELECT * FROM koreanreview";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
      echo "<li>{$row['title']} : {$row['menu']}</li>
      {$row['description']} by {$row['author']}";
    }
  
    echo "<p><input type='button' value='리뷰쓰러가기' 
        onClick='location.href=\"write_review.php?id={$_GET['id']}\"'>
        </p>";
    ?>
    </ol>
</body>

</html>