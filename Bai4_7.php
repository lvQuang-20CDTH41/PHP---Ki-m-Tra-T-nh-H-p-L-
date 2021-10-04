<?php
function test_input($data)
{
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}
function test_password($pwd)
{
    $upperCase = preg_match('@[A-Z]@', $pwd);
    $lowerCase = preg_match('@[a-z]@', $pwd);
    $number = preg_match('@[0-9]@', $pwd);
    $specialChar = preg_match('@[^\w]@', $pwd);
    if (strlen($pwd) < 8  || !$upperCase || !$lowerCase || !$number  || !$specialChar) {
        return false;
    } else {
        return true;
    }
}
$user = $pwd = $cpwd = '';
$userErr = $pwdErr = $cpwdErr = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['user'])) {
        $userErr = "Username bắt buộc nhập!";
    } else {
        $user = test_input($_POST['user']);
        if (!preg_match("/^[a-zA-Z ]*$/", $user)) {
            $userErr = "Chỉ chứ ký tự và khoảng trắng.";
        }
    }
    if (empty($_POST['pwd'])) {
        $pwdErr = "Password bắt buộc nhập!";
    } else {
        $pwd = $_POST['pwd'];
        if (!test_password($_POST['pwd'])) {
            $pwdErr = 'Password dài ít nhất 8 kí tự, trong 
            đó có ít nhất 1 kí tự hoa, 1 chữ số, 1 kí tự đặc biệt
          ';
        }
    }
    if (empty($_POST['cpwd'])) {
        $cpwdErr = "Confirm Password bắt buộc nhập!";
    } else {
        if ($_POST['pwd'] != $_POST['cpwd']) {
            $cpwdErr = "Không trùng với Password. Vui lòng nhập lại";
        } else {
            $cpwd = $_POST['cpwd'];
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
    <title>TH 4.7. Tạo Form Sign In theo yêu cầu trong bảng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card bg-info text-white">
            <div class="card-header">
                <h2 class="text-center">SIGN IN</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mt-3">
                        <label for="user" class="col-form-label col-sm-3"><span class="h5">Username: </span></label>
                        <div class="col-sm-6">
                            <input type="text" name="user" id="user" class="form-control" placeholder="Nhập Username" value="<?= $user ?>">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $userErr ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="pwd" class="col-form-label col-sm-3"><span class="h5">Password: </span></label>
                        <div class="col-sm-6">
                            <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Nhập Password" value="<?= $pwd ?>">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $pwdErr ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="cpwd" class="col-form-label col-sm-3"><span class="h5">Confirm Password: </span></label>
                        <div class="col-sm-6">
                            <input type="password" name="cpwd" id="cpwd" class="form-control" placeholder="Nhập Confirm Passowrd" value="<?= $cpwd ?>">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $cpwdErr ?></span>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-success" name="submit">Đăng ký</button>
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    echo '<h2>YOUR INFOMATION</h2>';
                    echo "Username: " . $user . "<br>";
                    echo "Password: " . $pwd . "<br>";
                    echo "Confirm Password: " . $cpwd;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>