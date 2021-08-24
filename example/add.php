<?php
    session_start();
    include('connect.php');
    $name=$_SESSION['name'];
    $id = $_SESSION['id'];
    if(isset($_POST['submit'])){
            $fullName = $_POST['fullName'];
            $position = $_POST['position'];
            $unit = $_POST['unit'];
            $workPhone = $_POST['workPhone'];
            $email = $_POST['email'];
            $phone = $_POST['phonePerson'];
        $sql = "INSERT INTO `person`(`fullName`, `position`, `workPhone`, `email`, `phonePerson`, `id_unit`) VALUES ('$fullName','$position','$workPhone','$email','$phone','$id') ";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo " successfully!";
        }else{
            echo "error!";
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
    <title>New Person</title>
</head>
<body>
<section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/img3.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Info Person</h3>
            <form class="px-md-2" method="post">
              <div class="form-outline mb-4">
                <label class="form-label" for="txtFullName">FullName</label>
                <input type="text" id="txtFullName" class="form-control" name="fullName">
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="txtPosition">Position</label>
                <input type="text" id="txtPosition" class="form-control" name="position">
              </div>
              <div class="mb-4">
                <label for="" class="form-label">Unit: </label>
                <select class="select" name="unit">
                  <?php 
                        session_start();
                        $sql = "SELECT * FROM `unit`";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            while( $row = mysqli_fetch_assoc($result)){
                                $name = $row['name'];
                                $id = $row['id'];
                                $_SESSION['name']=$name;
                                $_SESSION['id']= $id;
                                echo '
                                    <option value="'.$id.'">'.$name.'</option>
                                ';
                            }}?>
                </select>
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="txtWorkPhone">WorkPhone</label>
                <input type="text" id="txtWorkPhone" class="form-control" name="workPhone">
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="txtEmail">Email</label>
                <input type="text" id="txtEmail" class="form-control" name="email">
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="txtPhone">Phone</label>
                <input type="text" id="txtPhone" class="form-control" name="phonePerson">
              </div>         
              <button type="submit" class="btn btn-success btn-lg mb-1" name="submit">Add</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>