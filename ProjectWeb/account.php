<?php 
    session_start();
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/5f58258f46.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
    <title>Account</title>
</head>
<body>
    <?php 
        if(isset($_SESSION['status'])){
            echo'
                <script language="javascript">
                    setTimeout(function(){
                        alert("'.$_SESSION['status'].'");
                    }, 100);
                </script>
            ';
            unset($_SESSION['status']);
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <button class="addAccount">
                    <a href="newAccount.php" class="text-decoration-none">Tạo tài khoản mới</a>
                </button>
            </div>
            <div class="col-md-6">
                <button class="addAccount">
                    <a href="admin.php" class="text-decoration-none">Về trang quản lý</a>
                </button>
            </div>
        </div>
<table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Tên tài khoản</th>
        <th scope="col">Mật khẩu</th>
        <th scope ="col">Trạng thái</th>
        <th scope="col">Quyền</th>
        <th scope="col">Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn,$sql);
            if($result){
               while( $row = mysqli_fetch_assoc($result)){
                   $id = $row['id'];
                   $useName = $row['useName'];
                   $passWord = $row['passWord'];
                   $status = $row['status'];
                   $role = $row['role'];
                   echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$useName.'</td>
                        <td>'.$passWord.'</td>
                        <td>'.$status.'</td>
                        <td>'.$role.'</td>
                        <td>
                        <button class="btn btn-primary"><a href="updateAccount.php ? updateid='.$id.'" class="text-light">Sửa</a></button>
                        <button class="btn btn-danger"><a href="deleteAccount.php ? deleteid='.$id.' " class="text-light">Xóa</a></button>
                        <button class="btn btn-primary"><a href="showInfo.php ? infoid='.$id.' " class="text-light">Thông tin</a></button>                  
                    </td>
                   </tr>';
               }
            }         
        ?>    
    </tbody>
</table>
    </div>
</body>
</html>