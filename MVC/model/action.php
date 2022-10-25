<?php

function get_categories(){
    global $db;
    $queryEmployee = 'SELECT Employee.EMP_NUM, Employee.EMP_LNAME, Employee.EMP_FNAME, 
       Employee.EMP_INITIAL, Employee.EMP_HIREDATE, Job.JOB_DESCRIPTION, Job.JOB_CHARGE_HOUR 
    From Employee 
    INNER JOIN job on Employee.JOB_CODE = job.JOB_CODE 
    ORDER BY Employee.EMP_NUM;';

    $statement = $db->prepare($queryEmployee);
    $statement ->execute();
    $employees = $statement-> fetchAll();
    $statement->closeCursor();
    return $employees;
}

function get_employee($EMP_NUM){
    global $db;
    $queryEmployee = "SELECT * FROM `employee` WHERE `employee`.`EMP_NUM` = '$EMP_NUM'";

    $statement = $db->prepare($queryEmployee);
    $statement ->execute();
    $employee = $statement-> fetchAll();
    $statement->closeCursor();
    return $employee;
}

function update_employee($EMP_NUM, $EMP_LNAME, $EMP_FNAME, $EMP_INITIAL, $EMP_HIREDATE, $JOB_CODE){
    global $db;
    $query = "UPDATE employee SET EMP_LNAME = :EMP_LNAME,EMP_FNAME = :EMP_FNAME,EMP_INITIAL = :EMP_INITIAL 
                    ,EMP_HIREDATE = :EMP_HIREDATE,JOB_CODE = :JOB_CODE
        WHERE EMP_NUM = :EMP_NUM";
    $statement = $db->prepare($query);
    $statement->bindValue(':EMP_NUM', $EMP_NUM);
    $statement->bindValue(':EMP_LNAME', $EMP_LNAME);
    $statement->bindValue(':EMP_FNAME', $EMP_FNAME);
    $statement->bindValue(':EMP_INITIAL', $EMP_INITIAL);
    $statement->bindValue(':EMP_HIREDATE', $EMP_HIREDATE);
    $statement->bindValue(':JOB_CODE', $JOB_CODE);
    $statement->execute();
    $statement->closeCursor();
}

function add_employee($EMP_NUM, $EMP_LNAME, $EMP_FNAME, $EMP_INITIAL, $EMP_HIREDATE, $JOB_CODE){
    global $db;
    $query = "INSERT INTO `employee` (`EMP_NUM`,`EMP_LNAME`,`EMP_FNAME`,`EMP_INITIAL`,`EMP_HIREDATE`,`JOB_CODE`) 
        VALUES (:EMP_NUM,:EMP_LNAME,:EMP_FNAME,:EMP_INITIAL,:EMP_HIREDATE,:JOB_CODE)";
    $statement = $db->prepare($query);
    $statement->bindValue(':EMP_NUM', $EMP_NUM);
    $statement->bindValue(':EMP_LNAME', $EMP_LNAME);
    $statement->bindValue(':EMP_FNAME', $EMP_FNAME);
    $statement->bindValue(':EMP_INITIAL', $EMP_INITIAL);
    $statement->bindValue(':EMP_HIREDATE', $EMP_HIREDATE);
    $statement->bindValue(':JOB_CODE', $JOB_CODE);
    $statement->execute();
    $statement->closeCursor();
}

function delete_employee($EMP_NUM){
    global $db;
    $query = 'DELETE FROM employee
              WHERE EMP_NUM = :EMP_NUM';
    $statement = $db->prepare($query);
    $statement->bindValue(':EMP_NUM', $EMP_NUM);
    $statement->execute();
    $statement->closeCursor();
}
