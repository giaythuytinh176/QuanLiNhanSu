<?php

namespace Selling\Services;

class EmployeeManager
{
    private static $employee;

    public function __construct()
    {
        self::$employee = [];
    }

    public function add($employee)
    {
        self::$employee[] = $employee;
    }

    public function getEmployee()
    {
        return self::$employee;
    }

    public function objtoArr()
    {
        $toArr = [];
        foreach (self::$employee as $val) {
            $toArr[] = ["fname" => $val->getFname(),
                "lname" => $val->getLname(),
                "birthday" => $val->getBirthday(),
                "address" => $val->getAddress(),
                "position" => $val->getPosition()];
        }
        return $toArr;
    }

    public function delete($id)
    {
        foreach (self::$employee as $key => $value) {
            if ($key == $id) {
                array_splice(self::$employee, $key, 1);
            }
        }
        $toArr = self::objtoArr();
        self::saveJson("data.json", $toArr, 1);
    }

    public function addEmployee()
    {
        $toArr = self::objtoArr();
        include_once "View/add.php";
    }

    public function edit($id)
    {
        $toArr = self::objtoArr();
        include_once "View/edit.php";
    }

    public function loadJson($filename = "data.json")
    {
        $data = json_decode(file_get_contents("Data/$filename"), true);
        if (empty($data)) $data = [];
        return $data;
    }

    public function saveJson($filename = "data.json", $data, $saveAndReplace = 0)
    {
        $load = json_decode(file_get_contents("Data/$filename"), true);
        if ($saveAndReplace == 1) {
            $load = $data;
        } else {
            if (empty($load)) $load = [];
            foreach ($data as $value) {
                array_push($load, $value);
            }
        }
        file_put_contents("Data/$filename", json_encode($load));
    }
}