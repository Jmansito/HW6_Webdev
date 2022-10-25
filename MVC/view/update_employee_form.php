<?php include '../view/header.php'; ?>
<?php
$EMP_NUM = filter_input (INPUT_POST, 'EMP_NUM', FILTER_VALIDATE_INT);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Employee Form</title>
</head>
<body>
<form action="." method="post" id="update_employee_form">
    <input type="hidden" name="action" value="update_employee">
    <p>
        <label for="employee_number">Employee Number:</label>
        <input type="number" name="EMP_NUM" id="employee_number" value="<?php echo htmlspecialchars($EMP_NUM) ?>">
    </p>
    <p>
        <label for="employee_lname">Last Name:</label>
        <input type="text" name="EMP_LNAME" id="employee_lname">
    </p>
    <p>
        <label for="employee_fname">First Name:</label>
        <input type="text" name="EMP_FNAME" id="employee_fname">
    </p>
    <p>
        <label for="employee_initial">Employee Initial:</label>
        <input type="text" name="EMP_INITIAL" id="employee_initial">
    </p>
    <p>
        <label for="employee_hiredate">Hire Date:</label>
        <input type="date" name="EMP_HIREDATE" id="employee_hiredate">
    </p>
    <p>
        <label for="employee_jobcode">Job Code:</label>
        <input type="number" name="JOB_CODE" id="employee_jobcode">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>
<?php include '../view/footer.php'; ?>
