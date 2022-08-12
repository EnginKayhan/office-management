<?php
if (isset($_POST['sbmt']))
{
    $empid= trim(strtoupper(filter_input(INPUT_POST,'empid')));
    $empname= trim(strtoupper(filter_input(INPUT_POST,'empname')));
    $empmail= trim(strtoupper(filter_input(INPUT_POST,'email')));
    $jdate = strtoupper(filter_input(INPUT_POST, 'jdate'));
    $role = strtoupper(filter_input(INPUT_POST, 'role'));

    $cnn=@mysqli_connect("localhost","admin","molehiya","office ms") or exit('Connection failed.'.mysqli_connect_errno());

    $query='select * from employee';
    $prm=false;
    
    if (strlen($empid)>0){
     $query.= " where empid=?";
     $v=$empid;
     $prm=true;
    }

    
    $stmt=mysqli_stmt_init($cnn);

    mysqli_stmt_prepare($stmt, $query) or exit('Query Error.'. mysqli_stmt_errno($stmt));
    if ($prm) @mysqli_stmt_bind_param($stmt,'s', $v) or exit('Bind Param Error.');

    mysqli_stmt_execute($stmt) or exit('Query Execution failed.'. mysqli_stmt_errno($stmt));

    $r=mysqli_stmt_get_result($stmt);

    if ($r->num_rows>1) // if records exist and more than one record returned
    {
        echo '<table border="1"><tr><th>ID</th><th>Name</th><th>Mail</th><th>Join Date</th><th>Role</th></tr>';
        while($rec=mysqli_fetch_assoc($r))
        {
            echo '<tr>';
            echo '<td>'.$rec['empid'].'</td>';
            echo '<td>'.$rec['empname'].'</td>';
            echo '<td>'.$rec['email'].'</td>';
            echo '<td>'.$rec['jdate'].'</td>';
            echo '<td>'.$rec['jdate'].'</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    elseif ($r->num_rows==1) // if just one record
    {
        echo '<table border="0">';
        $rec=mysqli_fetch_assoc($r);
        echo '<tr><th>ID :</th><td>'.$rec['empid'].'</td></tr>';
        echo '<tr><th>Name  :</th><td>'.$rec['empname'].'</td></tr>';
        echo '<tr><th>Mail :</th><td>'.$rec['email'].'</td></tr>';
        echo '<tr><th>Join Date  :</th><td>'.$rec['jdate'].'</td></tr>';
        echo '<tr><th>Role  :</th><td>'.$rec['role'].'</td></tr>';
        echo '</table>';
    }

    echo '<br/>'.$r->num_rows.' record(s) found';

    mysqli_stmt_free_result($stmt); 
    mysqli_stmt_close($stmt);
    mysqli_close($cnn);
}