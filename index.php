<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Employee Manager</title>
</head>

<header>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }

        .table {
            margin: auto;
            width: 75% !important;
        }
    </style>

</header>
<body>

<h1>Employee Manager</h1>


<?php

include_once "Models/Employee.php";
include_once "Services/EmployeeManager.php";

use Selling\Models\Employee;
use Selling\Services\EmployeeManager;

$employeeManager = new EmployeeManager();
//$employeeManager = new Services\EmployeeManager();

//$employeeManager->saveJson("data.json", $list_employeeXXX);
$list_employee = $employeeManager->loadJson("data.json");

foreach ($list_employee as $list_emp) {
    $employeeManager->add(new Employee($list_emp['fname'], $list_emp['lname'], $list_emp['birthday'], $list_emp['address'], $list_emp['position']));
}                       //Models\Employee

if (!empty($_REQUEST['action']) && $_REQUEST['action'] == "delete" && isset($_REQUEST['id'])) {

    $employeeManager->delete($_REQUEST['id']);
    echo "<h2>Deleted successfully.</h2>";
    header("refresh:3;url=/Accessmodifier/QuanLiNhanSu/");
} elseif (!empty($_REQUEST['action']) && $_REQUEST['action'] == "edit" && isset($_REQUEST['id'])) {

    $employeeManager->edit($_REQUEST['id']);
} elseif (!empty($_REQUEST['action']) && $_REQUEST['action'] == "add") {

    $employeeManager->addEmployee();
}

$employee = $employeeManager->getEmployee();

?>
<div class="row justify-content-center">
    <div class="col-auto">
        <table class="table table-responsive">
            <tr>
                <th><a href='/Accessmodifier/QuanLiNhanSu/?action=add'>Add</a></th>
            </tr>
        </table>

    </div>
</div>

<div class="row justify-content-center">
    <div class="col-auto">
        <table class="table table-responsive">
            <tr>
                <th>STT</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Vị trí</th>
                <th>Action</th>
            </tr>

            <?php

            foreach ($employee as $key => $value) {
                //print("<pre>" . print_r($value, true) . "</pre>");
                $fname = $value->getFname();
                $lname = $value->getLname();
                $birthday = $value->getBirthday();
                $address = $value->getAddress();
                $position = $value->getPosition();

                echo "<tr>";
                echo "<th>" . ($key + 1) . "</th>";
                echo "<th>$fname</th>";
                echo "<th>$lname</th>";
                echo "<th>$birthday</th>";
                echo "<th>$address</th>";
                echo "<th>$position</th>";
                echo "<th><a href='/Accessmodifier/QuanLiNhanSu/?action=edit&id=" . $key . "'>Edit</a> - <a href='/Accessmodifier/QuanLiNhanSu/?action=delete&id=" . $key . "'>Delete</a> </th>";
                echo "</tr>";
            }

            ?>
        </table>

    </div>
</div>


</body>
</html>
