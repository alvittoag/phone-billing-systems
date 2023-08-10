<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Phone Billing System.xls");

include('../data/db.php');

$sql = "SELECT * FROM setting";

$res = mysqli_query($conn, $sql);

include('../utils/table-export.php');
