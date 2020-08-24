<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$conn = mysqli_connect(
    'localhost',
    'inhapot',
    'inha8302#11',
    'inhapot'
);

    // 아이디 중복검사를 하지 않았다면?
    if($_REQUEST['chs'] == 1){
        echo '<script charset="utf-8">alert("아이디 중복검사를 해야 합니다."); history.back();</script>';
    }
    // 아이디 중복검사 결과가 중복된 아이디였다면?
    else if($_REQUEST['checked_id'] == 0){
        echo '<script charset="utf-8">alert("아이디가 중복됩니다."); history.back();</script>';
    }

    else if($_POST['userid']=="" || $_POST['userpw']==''){
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