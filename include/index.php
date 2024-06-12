<?php
include "include/common.php";
$sql = "select * from employee ";

$data = db_select($sql);

// in du lieu
foreach ($data as $row){
    echo ["employee_name"] . "<br>";
}
?>