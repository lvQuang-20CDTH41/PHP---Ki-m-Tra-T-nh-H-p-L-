<?php
$name = $email = $website = $comment =  $gender = '';
$nameErr = $emailErr = $websiteErr = $commentErr =  $genderErr = '';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
        $nameErr = 'Name không được để trống';
    } else {
        $name = test_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Name chỉ chứa kí tự và khoảng trắng.";
        }
    }
    if (empty($_POST['email'])) {
        $emailErr = 'Email không được để trống';
    } else {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email không hợp lệ";
        }
    }
    if (empty($_POST['website'])) {
        $websiteErr = 'Website không được để trống';
    } else {
        $website = test_input($_POST['website']);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "URL không hỗ trợ.";
        }
    }
    if (empty($_POST['comment'])) {
        $commentErr = 'Comment không được để trống';
    } else {
        $comment = test_input($_POST['comment']);
    }
    if (empty($_POST['gender'])) {
        $genderErr = 'Gender không được để trống';
    } else {
        $gender = test_input($_POST['gender']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP FORM VALIDTION EXAMPLE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card bg-info text-white">
            <div class="card-header">
                <h2 class="text-center">PHP FORM VALIDTION EXAMPLE</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mt-3">
                        <label for="name" class="col-form-label col-sm-2"><span class="h5">Name: </span></label>
                        <div class="col-sm-7">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên của bạn" value="<?= $name ?>">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $nameErr; ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="email" class="col-form-label col-sm-2"><span class="h5">Email: </span></label>
                        <div class="col-sm-7">
                            <input type="text" name="email" id="email" value="<?= $email ?>" class="form-control" placeholder="Nhập tên của bạn">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $emailErr; ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="website" class="col-form-label col-sm-2"><span class="h5">Website: </span></label>
                        <div class="col-sm-7">
                            <input type="text" name="website" id="website" class="form-control" placeholder="Nhập website của bạn" value="<?= $website ?>">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $websiteErr; ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="comment" class="col-form-label col-sm-2"><span class="h5">Comment: </span></label>
                        <div class="col-sm-7">
                            <textarea name="comment" id="comment" cols="81" rows="3" placeholder="Nhập bình luận của bạn"><?php echo $comment ?></textarea>
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $commentErr; ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="gender" class="col-form-label col-sm-2"><span class="h5">Gender: </span></label>
                        <div class="col-sm-7">
                            <input type="radio" name="gender" id="female" value="female" <?php if (isset($gender) && $gender == 'female') {echo 'checked';} ?>>
                            <label for="female" class="col-form-label">Female</label>
                            <input type="radio" name="gender" id="male" value="male" <?php if (isset($gender) && $gender == 'male') {echo 'checked';} ?>>
                            <label for="male" class="col-form-label">Male</label>
                            <input type="radio" name="gender" id="other" value="other" <?php if (isset($gender) && $gender == 'other') {echo 'checked';} ?>>
                            <label for="other" class="col-form-label">Othor</label>
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $genderErr; ?></span>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </div>
                </form>
                <h2>Your Input</h2>
                <?php
                echo "<h5>Name: $name</h5>";
                echo "<h5>Email: $email</h5>";
                echo "<h5>Website: $website</h5>";
                echo "<h5>Comment: $comment</h5>";
                echo "<h5>Gender: $gender</h5>";
                ?>
            </div>
        </div>
    </div>
</body>

</html>