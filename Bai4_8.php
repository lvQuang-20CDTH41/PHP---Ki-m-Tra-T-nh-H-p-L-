<?php
$user = $email = $age = $phone = '';
$userErr = $emailErr = $ageErr = $phoneErr = '';
// xử lý tên
function validateUser($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
// kiểm tra email
function validateEmail($data)
{
    $v = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    return preg_match($v, $data);
}
// kiem tra phone
function validatePhone($data)
{
    $v = "/^[0]{1}[0-9]{2}-[0-9]{4}-[0-9]{3}$/";
    return preg_match($v, $data);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['user'])) {
        $userErr = 'Vui lòng nhập Username';
    } else {
        $user = $_POST['user'];
        if (!preg_match("/^[a-zA-Z ]*$/", $user)) {
            $userErr = 'Chỉ chứ ký tự và khoảng trắng.';
        }
    }
    if (empty($_POST['email'])) {
        $emailErr = 'Vui lòng nhập Email';
    } else {
        $email = validateUser($_POST['email']);
        if (!validateEmail($email)) {
            $emailErr = 'Email không hợp lệ.';
        }
    }
    if (empty($_POST['age'])) {
        $ageErr = 'Vui lòng nhập Age';
    } else {
        $age = $_POST['age'];
        if ($age < 18 || $age > 100) {
            $ageErr = 'Yêu cầu tuổi từ 18 đến 100.';
        }
    }
    if (empty($_POST['phone'])) {
        $phoneErr = 'Vui lòng nhập Age';
    } else {
        $phone = $_POST['phone'];
        if (!validatePhone($phone) || strlen($phone) < 10) {
            $phoneErr = 'Số điện thoại không hợp lệ.';
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
    <title>TH 4.8. Tạo Form Sign In theo yêu cầu trong bảng 4.4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card bg-info text-white">
            <div class="card-header ">
                <h2 class="text-center">SIGN IN</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mt-3">
                        <label for="user" class="col-form-label col-sm-2">Username: </label>
                        <div class="col-sm-7">
                            <input type="text" name="user" id="user" class="form-control" value="<?= $user ?>" placeholder='Nhập Username'>
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $userErr ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="email" class="col-form-label col-sm-2">Email: </label>
                        <div class="col-sm-7">
                            <input type="text" name="email" id="email" class="form-control" value="<?= $email ?>" placeholder='levanquang@gmail.com'>
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $emailErr ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="age" class="col-form-label col-sm-2">Age: </label>
                        <div class="col-sm-7">
                            <input type="number" name="age" id="age" class="form-control" value="<?= $age ?>" placeholder='Nhập tuổi của bạn'>
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $ageErr ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="phone" class="col-form-label col-sm-2">Phone-number: </label>
                        <div class="col-sm-7">
                            <input type="tel" name="phone" id="phone" class="form-control" value="<?= $phone ?>" placeholder='070-8050-907'>
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $phoneErr ?></span>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>