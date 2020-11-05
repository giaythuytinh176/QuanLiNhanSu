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

use Models\Employee;
use Services\EmployeeManager;

$employeeManager = new EmployeeManager();
$employeeManager->add(new Employee("Le", "Tam", "17/06/1990", "Hanoi", "Freelancer"));
$employeeManager->add(new Employee("Pham", "Dao", "14/11/2002", "Hanoi", "Freelancer"));

$employee = $employeeManager->getEmployee();

?>

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
                echo "<th>Edit - Delete</th>";
                echo "</tr>";
            }

            ?>
        </table>

    </div>
</div>


<?php

//$employeeManager->del("Tam");// del by lName
//$employee = $employeeManager->getEmployee();
//
//foreach ($employee as $value) {
//
//    echo $value->getFname() . "<br>";
//    echo $value->getLname() . "<br>";
//    echo $value->getBirthday() . "<br>";
//    echo $value->getAddress() . "<br>";
//    echo $value->getPosition();
//}

//print("<pre>" . print_r($employee, true) . "</pre>");

//Array
//(
//    [0] => Models\Employee Object
//(
//    [fname:Models\Employee:private] => Le
//[lname:Models\Employee:private] => Tam
//[birthday:Models\Employee:private] => 17/06/1990
//            [address:Models\Employee:private] => Hanoi
//[position:Models\Employee:private] => Freelancer
//        )
//
//)


?>


</body>
</html>
