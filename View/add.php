<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['btn'])) {
        unset($_POST['btn']);
        if (!empty($toArr)) {
            foreach ($toArr as $value) {
                array_push($toArr, $_POST);
            }
        } else {
            $toArr[] = $_POST;
        }
        $toArr = array_values($toArr);
        self::saveJson("data.json", $toArr, 1);
        echo "Added successfully.";
        header("refresh:1;url=/Accessmodifier/QuanLiNhanSu/");
    }
}

?>

<h3>Add Employee</h3>

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
                    <th><input type="text" name="fname"></th>
                    <th><input type="text" name="lname"></th>
                    <th><input type="text" name="birthday"></th>
                    <th><input type="text" name="address"></th>
                    <th><input type="text" name="position"></th>
                    <th><input type="submit" name="btn" value="Submit"></th>
                </tr>
            </table>
        </div>
    </div>
</form>

<br>