<?php
include('../data/db.php');

$sql = "SELECT * FROM setting";

$res = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Upload Data</title>
</head>

<body>
  <?php include('../components/navbar.php') ?>

  <div class="flex gap-10 px-5">
    <?php include('../components/sidebar.php') ?>

    <div class="flex-1 py-10">

      <div class="flex justify-end" style="margin-bottom: 10px;">
        <button onclick="window.open('../utils/export-excel.php')" class="border border-gray-400 bg-gray-200 px-5 py-2 rounded-lg font-medium">Download/Export to Excel</button>

      </div>

      <?php include('../utils/table-export.php') ?>

    </div>

  </div>
</body>

</html>