<?php 
    session_start();
    if(isset($_POST['submit'])){
        include('connect.php');
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $specialized = $_POST['specialized'];
        $education = $_POST['education'];
        $admission = $_POST['admission'];
        $status = 0;
        if(empty($fullName)){
            header('location:admissionPage.php  ? error = Full name is required!');
        }   else if(empty($email)){
             header('location:admissionPage.php ? error = Email is required!');
        }   else if(empty($phone)){
             header('location:admissionPage.php ? error = Phone is required!');
        }   else if(empty($birthday)){
             header('location:admissionPage.php ? error = Birthday is required!');
        }   else if(empty($address)){
             header('location:admissionPage.php ? error = Address is required!');
        }   else if(empty($specialized)){
             header('location:admissionPage.php ? error = Specialized is required!');      
        }   else if(empty($education)){
              header('location:admissionPage.php ? error = Education is required!');      
        }   else if(empty($admission)){
             header('location:admissionPage.php ? error = Admission is required!');      
        }   else{
            $sql= "INSERT INTO `admissions`(`name`, `email`, `phone`, `birthday`, `address`, `specialized`, `education`, `admission`, `status`) VALUES ('$fullName','$email','$phone','$birthday','$address','$specialized','$education','$admission','$status')";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                header('location:admissionPage.php');
            }   else{
                echo "loi";
            }
        }
    }
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
    <title>Tuy???n sinh</title>
</head>
<body style="background-color: cornsilk;">
    <div class="container col-md-4 my-5">
        <form class="text-left" method="POST">
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
            <div class="form-row">
                <h2>TH??NG TIN ????NG K?? TUY???N SINH</h2>
                <h5 class="font-italic">L??u ??: Nh???ng m???c ????nh d???u (*) l?? th??ng tin b???t bu???c ph???i ??i???n.</h5>
                <div class="form-group col-md-12">
                <label for="inputfullName">T??n*</label>
                <input type="fullName" class="form-control" id="inputfullName" placeholder="Name" name="fullName">
                </div>
                <div class="form-group col-md-12">
                <label for="inputEmail">Email*</label>
                <input type="Email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPhoneNumber">S??? ??i???n tho???i*</label>
                <input type="text" class="form-control" id="inputPhoneNumber" placeholder="S??? ??i???n tho???i" name="phone">
            </div>
            <div class="form-group">
                <label for="inputBirthday">Ng??y sinh*</label>
                <input type="date" class="form-control" id="inputBirthday" placeholder="dd/mm/yy" name="birthday">
            </div>
            <div class="form-group">
                <label for="inputPhoneNumber">?????a ch???*</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="?????a ch???" name="address">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Chuy??n ng??nh*</label>
                    <select id="inputState" class="form-control" name="specialized">
                        <option selected>Ch???n chuy??n ng??nh...</option>
                        <option value="C??ng ngh??? th??ng tin">C??ng ngh??? th??ng tin</option>
                        <option value="C??ng ngh??? th??ng tin Vi???t Nh???t">C??ng ngh??? th??ng tin Vi???t Nh???t</option>
                        <option value="??i???u D?????ng">??i???u d?????ng</option>
                        <option value="D?????c h???c">D?????c h???c</option>
                        <option value="K??? thu???t ?? t??">K??? thu???t ?? t??</option>
                        <option value="C??ng nghe ch??? t???o">C??ng ngh??? ch??? t???o</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Lo???i h??nh ????o t???o*</label>
                    <select id="inputState" class="form-control" name="education">
                        <option selected>Ch???n lo???i h??nh ????o t???o</option>
                        <option value="?????i h???c ch??nh quy">?????i h???c ch??nh quy</option>
                        <option value="Li??n th??ng">Li??n th??ng</option>
                        <option value="Sau ?????i h???c">Sau ?????i h???c</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                    <label for="inputState">H??nh th???c x??t tuy???n*</label>
                    <select id="inputState" class="form-control" name="admission">
                        <option selected>Ch???n h??nh th???c x??t tuy???n...</option>
                        <option value="X??t tuy???n">X??t tuy???n</option>
                        <option value="Thi">Thi</option>
                </select>
            </div>       
            <button type="submit" class="btn btn-primary col-md-12" name="submit">????ng k??</button>
        </form>
    </div>
    <?php include('./footer/footer.php') ?>
</body>
</html>