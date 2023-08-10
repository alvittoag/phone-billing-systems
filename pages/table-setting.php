<?php

include('../data/db.php');

$recordsPerPage = 10;

$query = "SELECT * FROM setting";
$res_query = mysqli_query($conn, $query);
$total_data = mysqli_num_rows($res_query);

$total_page = ceil($total_data / $recordsPerPage);


if (isset($_GET['search_option']) && isset($_GET['search_val'])) {
  $search_option = $_GET['search_option'] ?? '';
  $search_val = $_GET['search_val'] ?? '';

  $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($currentpage - 1) * $recordsPerPage;


  if ($search_option === 'all') {
    $sql = "SELECT * FROM setting  WHERE handphone_no LIKE '%$search_val%' OR badge_number LIKE '%$search_val%' OR user_name LIKE '%$search_val%' OR charge_quota LIKE '%$search_val%' LIMIT $offset, $recordsPerPage";

    $res = mysqli_query($conn, $sql);
  } else {
    $sql = "SELECT * FROM setting  WHERE {$search_option} LIKE '%$search_val%' LIMIT $offset, $recordsPerPage";
    $res = mysqli_query($conn, $sql);
  }
} else {

  $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($currentpage - 1) * $recordsPerPage;

  $sql = "SELECT * FROM setting LIMIT $offset, $recordsPerPage ";
  $res = mysqli_query($conn, $sql);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Table Setting</title>
</head>

<body>
  <?php include('../components/navbar.php') ?>

  <div class="flex gap-10 px-5">
    <?php include('../components/sidebar.php') ?>

    <div class="flex-1">
      <form action="table-setting.php" method="get" class="bg-red-400" style="display: flex;  padding: 9px 180px ; margin-bottom: 20px; gap: 30px; background-color: #F5F5F5;">
        <div style="display: flex; gap: 25px;">
          <label>Search By</label>

          <select name="search_option" class="border focus:outline-black">
            <option value="all">All</option>
            <option value="handphone_no">
              Handphone No</option>
            <option value="badge_number">Badge No</option>
            <option value="user_name">User Name</option>
            <option value="charge_quota">Cost Center</option>
          </select>
        </div>

        <input type="text" name="search_val" class="border px-2 focus:outline-black w-[250px]">

        <button type="submit" class="border border-gray-400 bg-gray-200 px-5 rounded-lg text-sm font-medium">SEARCH</button>
      </form>

      <div>
        <div class="bg-[#5A9FD6] text-center font-bold mb-[2px]">HANDPHONE RESPONSIBLE LIST</div>
        <table class="w-full border-collapse border">
          <thead class="text-center" style="background-color: #5A9FD6;">
            <tr>
              <th class="border">HANDPHONE NO</th>
              <th class="border">BADEGE NUMBER </th>
              <th class="border">USER NAME</th>
              <th class="border">CHARGING NO</th>
              <th class="border">PURPOSE</th>
              <th class="border">CHARGE QUOTA</th>
              <th class="border">UPADATE</th>
            </tr>
          </thead>
          <tbody style="background-color: #F5F5F5;">

            <?php
            while ($data = mysqli_fetch_assoc($res)) :
            ?>
              <tr>
                <th class="border font-normal text-center"><?= $data['handphone_no']; ?></th>
                <th class="border  font-normal text-center"><?= $data['badge_number']; ?></th>
                <th class="border  font-normal text-left px-1"><?= $data['user_name']; ?></th>
                <th class="border  font-normal text-left px-1"><?= $data['charging_selected']; ?>
                  <?= $data['charging_no']; ?></th>
                <th class="border  font-normal text-left px-1"><?= $data['purpose']; ?></th>
                <th class="border font-normal text-left px-1"><?= $data['charge_quota']; ?></th>
                <th class="border">

                  <a href="/telephone/pages/form-tablesetting-update.php?id=<?= $data['id']; ?>">
                    _
                    <i class="fa-solid fa-pen"></i>
                  </a>

                </th>
              </tr>

            <?php endwhile; ?>

          </tbody>
        </table>
      </div>

      <div class="py-5 flex justify-between items-start">
        <div class="flex gap-20 items-center">

          <div class="flex gap-3 items-center">
            <a href="?page=<?= $offset == 0 || $currentpage == 2 ? 1 : $currentpage - 2 ?>" class="bg-gray-200 px-1 rounded-full border border-gray-400">
              <i class="fa-solid fa-backward-fast" style="font-size: 14px;"></i>
            </a>

            <a href="?page=<?= $offset == 0 ? 1 : $currentpage - 1 ?>" class="bg-gray-200 rounded-full border border-gray-400">
              <i class="fa-solid fa-caret-left" style="font-size: 24px; width: 25px; display: flex; justify-content: center;"></i>
            </a>

            <a href="?page=<?= $currentpage >= $total_page ? $total_page : $currentpage + 1; ?>" class="bg-gray-200 px-1 rounded-full border border-gray-400">
              <i class="fa-solid fa-play" style="font-size: 14px;"></i>
            </a>

            <a href="?page=<?= $currentpage >= $total_page || $currentpage == $total_page - 1 ? $total_page : $currentpage + 2; ?>" class="bg-gray-200 px-1 rounded-full border border-gray-400">
              <i class="fa-solid fa-forward-fast" style="font-size: 14px;"></i>
            </a>

          </div>


          <form action="table-setting.php" method="get" class="flex gap-3">
            <label>Page</label>
            <input type="number" value="<?= $_GET['page'] ?? '1'; ?>" name="page" class="border px-2">

            <button class="bg-gray-200 px-2 rounded-lg border border-gray-400 font-medium">Go</button>
          </form>
        </div>

        <div class="space-y-3">
          <p class="text-gray-400">Page <?= $currentpage; ?> of <?= $total_page; ?>, Total <?= $total_data ?>
            record(s)
          </p>

          <div class="flex justify-end">

            <a href="/telephone/pages/form-tablesetting-add.php" class="bg-gray-200 border w-32 flex justify-center  border-gray-400 rounded-lg font-medium">ADD</a>

          </div>

        </div>
      </div>

    </div>

  </div>
</body>

</html>