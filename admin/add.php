<?php
if (isset($_POST['sbmit'])) {
  $empid = strtoupper(filter_input(INPUT_POST, 'empid'));
  $empname = strtoupper(filter_input(INPUT_POST, 'empname'));
  $empmail = strtoupper(filter_input(INPUT_POST, 'email'));
  $jdate = strtoupper(filter_input(INPUT_POST, 'jdate'));
  $role = strtoupper(filter_input(INPUT_POST, 'role'));


  $cnn = @mysqli_connect("localhost", "admin", "molehiya", "office ms") or exit('Connection failed.' . mysqli_connect_errno());

  $query = 'insert into employee(empid,empname,email,jdate,role) values(?,?,?,?,?)';

  $stmt = mysqli_stmt_init($cnn);

  mysqli_stmt_prepare($stmt, $query) or exit('Query Error.' . mysqli_stmt_errno($stmt));

  @mysqli_stmt_bind_param($stmt, 'sssss', $empid, $empname, $empmail, $jdate, $role) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed

  if (!mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_errno($stmt))
      echo "This number is already recorded.<br/>";
    else
      exit('Query Execution failed.' . mysqli_stmt_errno($stmt));
  }

  if (mysqli_stmt_affected_rows($stmt) > 0) echo "Employee Added!";

  mysqli_stmt_close($stmt);

  mysqli_close($cnn);
}
header("Location: employees-list.php");
?>