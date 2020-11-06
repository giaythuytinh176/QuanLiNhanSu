<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['btn'])) {
        unset($_POST['btn']);
        foreach ($toArr as $value) {
            $toArr[$_REQUEST['id']] = $_POST;
        }
        $toArr = array_values($toArr);
        self::saveJson("data.json", $toArr, 1);
        echo "Edited successfully.";
        header("refresh:1;url=/Accessmodifier/QuanLiNhanSu/");
    }
}

?>

<h3>Edit Employee</h3>

<form method="post">
    <div class="row justify-content-center">
        <div class="col-auto">
            <table class="table table-responsive">
                <tr>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Vị trí</th>
                    <th>Action</th>
                </tr>

                <?php

                ?>
                <tr>
                    <th><input type="text" name="fname" value="<?= $toArr[$id]['fname']; ?>"></th>
                    <th><input type="text" name="lname" value="<?= $toArr[$id]['lname']; ?>"></th>
                    <th><input type="text" name="birthday" value="<?= $toArr[$id]['birthday']; ?>"></th>
                    <th><input type="text" name="address" value="<?= $toArr[$id]['address']; ?>"></th>
                    <th><input type="text" name="position" value="<?= $toArr[$id]['position']; ?>"></th>
                    <th><input type="submit" name="btn" value="Submit"></th>
                </tr>
            </table>
        </div>
    </div>
</form>

<br>