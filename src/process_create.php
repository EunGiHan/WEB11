<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '111111',
    'inhapot'
  );

  echo $_REQUEST['store_id'];  --식당 아이디로 바꾸기

$sql = "
    INSERT INTO reviews
    (review, created, store_id)
    VALUES(
        '{$_POST['review']}',
        NOW(),
        {$_REQUEST['store_id']}
);
";

$result = mysqli_query($conn, $sql);
if($result === false){
echo "리뷰를 남기는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
error_log(mysqli_error($conn));
}else{
header('Location: store_list_korean.php?id='.$_REQUEST['store_id']);
}
?>
