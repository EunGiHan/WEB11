<meta charset="utf-8">
<?php
	$conn = mysqli_connect(
        'localhost',
        'inhapot',
        'inha8302#11',
        'inhapot'
    );
    
    $sql = "select * from member where id={$_GET['userid']}";
	if(!$member = mysqli_query($conn, $sql))
	{
?>
<div><?php echo $_GET['userid']; ?>는 사용가능한 아이디입니다.</div>
<?php 
	}else{
        ?>
<div><?php echo $_GET['userid']; ?>는 중복된아이디입니다.<div>
        <?php
            }
        ?>
        <button value="닫기" onclick="window.close()">닫기</button>
        <script>
        </script>