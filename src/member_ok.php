<?php 
$conn = mysqli_connect(
    'localhost',
    'inhapot',
    'inha8302#11',
    'inhapot'
);
    $id = $_POST['userid'];
    $pw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
    $name = $_POST['name'];

    $sql = "INSERT into member(userid,userpw,name) 
            VALUES('$id',$pw','$name')";
    if(mysqli_query($conn, $sql)){ /* 회원가입이 성공한다면 */
        echo '<script>alert("회원가입에 성공했습니다")</script>';
        header("Location: ../index.php");
    }else {
        echo '<script>alert("회원가입에 실패했습니다")</script>';
        header("Location: ./member.php");
    }
?>