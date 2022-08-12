<?php
if (isset($_POST['sbmt'])) {
  $depid = strtoupper(filter_input(INPUT_POST, 'depid'));
  $depname = strtoupper(filter_input(INPUT_POST, 'depname'));
  $cnn = @mysqli_connect("localhost", "admin", "molehiya", "office ms") or exit('Connection failed.' . mysqli_connect_errno());

  $query = 'insert into dept(depid,depname) values(?,?)';

  $stmt = mysqli_stmt_init($cnn);

  mysqli_stmt_prepare($stmt, $query) or exit('Query Error.' . mysqli_stmt_errno($stmt));

  @mysqli_stmt_bind_param($stmt, 'ss', $depid, $depname) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed

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
header("Location: departments.php");
?>