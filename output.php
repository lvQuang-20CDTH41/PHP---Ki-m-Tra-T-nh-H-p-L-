<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUTPUT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card bg-info text-white">
            <div class="card-header">
                <h2 class="text-center">Thông tin</h2>
            </div>
            <div class="card-body">
                <?php
                echo '<h4>Ho ten: ' . $_POST['name'] . '</h4>';
                echo '<h4>Ngày sinh: ' . $_POST['date'] . '</h4>';
                echo '<h4>Điểm trung bình: ' . $_POST['medium'] . '</h4>';
                ?>
                <input type="button" value="trở lại" class="btn btn-success" onclick='history.go(-1);'>
            </div>
        </div>
    </div>
</body>

</html>