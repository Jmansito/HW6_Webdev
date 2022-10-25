<?php include "header.php"; ?>
<html>
<head>
    <title>Employee Manager</title>
    <link rel="stylesheet" href="/MVC/main.css" />
</head>

<!-- the body section -->
<body>

<h1>List of employees</h1>
<section>
    <!-- display a table of products -->
    <table class = "center">
        <tr>
            <th>Emp ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Initial</th>
            <th>Hire Date</th>
            <th>Job Description</th>
            <th>Charge Per Hour</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <tr>
            <?php $employees = get_categories();
            foreach ($employees as $employee) : ?>
            <td><?php echo $employee['EMP_NUM'];?></td>
            <td><?php echo $employee['EMP_LNAME'];?></td>
            <td><?php echo $employee['EMP_FNAME'];?></td>
            <td><?php echo $employee['EMP_INITIAL'];?></td>
            <td><?php echo $employee['EMP_HIREDATE'];?></td>
            <td><?php echo $employee['JOB_DESCRIPTION'];?></td>
            <td><?php echo $employee['JOB_CHARGE_HOUR'];?></td>
            <td><form action="." method="post">
                    <input type="hidden" name="action" value="show_update_employee">
                    <input type="hidden" name="EMP_NUM" value="<?php echo $employee['EMP_NUM']; ?>">
                    <input type="submit" value="Update">
                </form></td>
            <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_employee">
                    <input type="hidden" name="EMP_NUM" value="<?php echo $employee['EMP_NUM']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
        </tr>

        <?php endforeach;?>
    </table>

    <p><button><a href="index.php?action=show_employee_form">ADD EMPLOYEE</a></button></p>

</section>

</body>
</html>
<?php include "footer.php"; ?>
