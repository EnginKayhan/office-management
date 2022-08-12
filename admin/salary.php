<?php
if (isset($_POST['sbmit'])) {
  $empid = strtoupper(filter_input(INPUT_POST, 'empid'));
  $empname = strtoupper(filter_input(INPUT_POST, 'empname'));
  $salary = strtoupper(filter_input(INPUT_POST, 'salary'));
  


  $cnn = @mysqli_connect("localhost", "admin", "molehiya", "office ms") or exit('Connection failed.' . mysqli_connect_errno());

  $query = 'insert into salary(empid,empname,salary) values(?,?,?)';

  $stmt = mysqli_stmt_init($cnn);

  mysqli_stmt_prepare($stmt, $query) or exit('Query Error.' . mysqli_stmt_errno($stmt));

  @mysqli_stmt_bind_param($stmt, 'ssi', $empid, $empname, $salary) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed

  if (!mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_errno($stmt))
      echo "This number is already recorded.<br/>";
    else
      exit('Query Execution failed.' . mysqli_stmt_errno($stmt));
  }

  if (mysqli_stmt_affected_rows($stmt) > 0) echo "Salary Added!";

  mysqli_stmt_close($stmt);

  mysqli_close($cnn);
}
header("Location: table.php");
?>