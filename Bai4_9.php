<?php
$name = $date = $medium = '';
$nameErr = $dateErr = $mediumErr = '';
// kiểm tra tính đúng date
function validateDate($date, $format = 'd/m/Y')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $nameErr = 'Họ và tên không được để trống.';
    } else {
        $name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = 'Chỉ chứa ký tự và khoảng trắng.';
        }
    }
    if (empty($_POST['date'])) {
        $dateErr = 'Ngày sinh không được để trống.';
    } else {
        $date = $_POST['date'];
        if (!validateDate($date)) {
            $dateErr = 'Ngày sinh không đúng định dạng.';
        }
    }
    if (empty($_POST['medium'])) {
        $mediumErr = 'Điểm trung bình không được để trống.';
    } else {
        (float)$medium = $_POST['medium'];
        if ($medium < 0 || $medium > 10) {
            $mediumErr = 'Điểm trung bình từ 0 - 10';
        }
    }
    if ($nameErr == '' && $dateErr == '' && $mediumErr == '') {
        header('location: output.php', false, 307);
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TH 4.9. Tạo Form Nhập thông tin theo yêu cầu trong bảng 4.5.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card  bg-info text-white">
            <div class="card-header">
                <h2 class="text-center">NHẬP THÔNG TIN</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mt-3">
                        <label for="name" class="col-form-label col-sm-2">Họ và Tên</label>
                        <div class="col-sm-7">
                            <input type="text" name="name" id="name" class="form-control" value="<?= $name ?>" placeholder="Nhập họ tên">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $nameErr ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="date" class="col-form-label col-sm-2">Ngày sinh: </label>
                        <div class="col-sm-7">
                            <input type="text" name="date" id="date" class="form-control" value="<?= $date ?>" placeholder="dd/mm/yyyy">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $dateErr ?></span>
                    </div>
                    <div class="row mt-3">
                        <label for="medium" class="col-form-label col-sm-2">Điểm TB: </label>
                        <div class="col-sm-7">
                            <input type="text" name="medium" id="medium" class="form-control" value='<?= $medium ?>' placeholder="Nhập điểm trung bình">
                        </div>
                        <span class="text-danger col-sm-3">* <?php echo $mediumErr ?></span>
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