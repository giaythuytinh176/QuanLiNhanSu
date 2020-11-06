<?php

namespace Services;

use Models\Employee;

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
            //print("<pre>" . print_r($value, true) . "</pre>");
            if ($key == $id) {
                //unset(self::$employee[$key]);
                //self::$employee = array_values(self::$employee);
                array_splice(self::$employee, $key, 1);
            }
        }
        //$toArr = json_decode(json_encode(self::$employee), true);
        //$toArr = parent::objtoArr(self::$employee);
        $toArr = self::objtoArr();
        self::saveJson("data.json", $toArr, 1);
        //print("<pre>" . print_r($toArr, true) . "</pre>");
    }

    public function addEmployee()
    {
        $toArr = self::objtoArr();
        //print("<pre>" . print_r($toArr, true) . "</pre>");die;
        include_once "add.php";
    }

    public function edit($id)
    {
        $toArr = self::objtoArr();
        //print("<pre>" . print_r($toArr, true) . "</pre>");die;
        include_once "edit.php";
    }

    public function loadJson($filename = "data.json")
    {
        $data = json_decode(file_get_contents($filename), true);
        if (empty($data)) $data = [];
        return $data;
    }

    public function saveJson($filename = "data.json", $data, $saveAndReplace = 0)
    {
        $load = json_decode(file_get_contents($filename), true);
        if ($saveAndReplace == 1) {
            $load = $data;
        } else {
            if (empty($load)) $load = [];
            foreach ($data as $value) {
                array_push($load, $value);
            }
        }
        file_put_contents($filename, json_encode($load));
    }
}