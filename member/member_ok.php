<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$conn = mysqli_connect(
    'localhost',
    'inhapot',
    'inha8302#11',
    'inhapot'
);

    if($_POST['userid']=="" || $_POST['userpw']==''){
        echo '<script charset="utf-8">alert("회원가입에 실패했습니다"); history.back();</script>';
    }else{
        $id = $_POST['userid'];
        $pw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $email = $_POST['email'].'@'.$_POST['emailaddress'];
    
        $sql = "INSERT into member(userid,userpw,name,email)
                VALUES('".$id."','".$pw."','".$name."','".$email."')";

                
        if(mysqli_query($conn, $sql)){ /* 회원가입이 성공한다면 */
            echo '<script charset="utf-8">alert("회원가입에 성공했습니다"); location.href="../index.php";</script>';
        }else {
            echo '<script charset="utf-8">alert("회원가입에 실패했습니다"); history.back();</script>';
        }
    }
?>