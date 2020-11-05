<?php

namespace Services;

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

    public function del($name)
    {
        foreach (self::$employee as $key => $value) {
            //print("<pre>" . print_r($value, true) . "</pre>");
            if ($value->getLname() == $name) {
                //unset(self::$employee[$key]);
                //self::$employee = array_values(self::$employee);
                array_splice(self::$employee, $key, 1);
            }
        }
    }

    public function edit($field)
    {

    }

}