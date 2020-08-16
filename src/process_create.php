<?php 
$conn = mysqli_connect(
    'localhost',
    'root',
    '111111',
    'web11'
  );

  echo $_REQUEST['num'];

$sql = "
    INSERT INTO koreanreview
    (title, description, created, num)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW(),
        {$_REQUEST['num']}
);
";

$result = mysqli_query($conn, $sql);
if($result === false){
echo "리뷰를 남기는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
error_log(mysqli_error($conn));
}else{
header('Location: store_list_korean.php?id='.$_REQUEST['num']);
}
?>