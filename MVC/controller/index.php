<?php
require ('../model/database.php');
require ('../model/action.php');

$action = filter_input (INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input (INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_employees';
    }
}

if ($action == 'list_employees'){
    get_categories();
    include ('../view/employee_list.php');
}
else if ($action == 'show_employee_form'){
    $categories = get_categories();
    include ('../view/add_employee_form.php');
}
else if ($action == 'add_employee'){
    $EMP_NUM = filter_input(INPUT_POST, 'EMP_NUM');
    $EMP_LNAME =filter_input(INPUT_POST,'EMP_LNAME');
    $EMP_FNAME = filter_input(INPUT_POST, 'EMP_FNAME');
    $EMP_INITIAL =filter_input(INPUT_POST,'EMP_INITIAL');
    $EMP_HIREDATE = filter_input(INPUT_POST, 'EMP_HIREDATE');
    $JOB_CODE =filter_input(INPUT_POST,'JOB_CODE');

    if($EMP_NUM == NULL || $EMP_LNAME == NULL || $EMP_FNAME == NULL || $EMP_INITIAL == NULL ||
    $EMP_HIREDATE == NULL || $JOB_CODE == NULL){
        echo "Invalid employee data. Check all fields and try again.";
    } else {
        add_employee($EMP_NUM, $EMP_LNAME, $EMP_FNAME, $EMP_INITIAL, $EMP_HIREDATE, $JOB_CODE);
        header('Location: index.php');
    }
}
else if ($action == 'show_update_employee'){
    $EMP_NUM = filter_input (INPUT_POST, 'EMP_NUM', FILTER_VALIDATE_INT);
    $employee = get_employee($EMP_NUM);
    include ('../view/update_employee_form.php');
}
else if ($action == 'update_employee'){
    $EMP_NUM = filter_input (INPUT_POST, 'EMP_NUM', FILTER_VALIDATE_INT);
    $EMP_LNAME =filter_input(INPUT_POST,'EMP_LNAME');
    $EMP_FNAME = filter_input(INPUT_POST, 'EMP_FNAME');
    $EMP_INITIAL =filter_input(INPUT_POST,'EMP_INITIAL');
    $EMP_HIREDATE = filter_input(INPUT_POST, 'EMP_HIREDATE');
    $JOB_CODE =filter_input(INPUT_POST,'JOB_CODE');

    if($EMP_LNAME == NULL || $EMP_FNAME == NULL || $EMP_INITIAL == NULL ||
        $EMP_HIREDATE == NULL || $JOB_CODE == NULL){
        echo "Invalid employee data. Check all fields and try again.";
    } else {
        update_employee($EMP_NUM, $EMP_LNAME, $EMP_FNAME, $EMP_INITIAL, $EMP_HIREDATE, $JOB_CODE);
        header('Location: index.php');
    }
}


else if ($action == 'delete_employee'){
    $EMP_NUM = filter_input (INPUT_POST, 'EMP_NUM', FILTER_VALIDATE_INT);
    delete_employee($EMP_NUM);
    header('Location: index.php');
}