<?php

include('../data/db.php');

if (isset($_POST['upload'])) {
  if ($_FILES["uploaded_file"]["error"] == UPLOAD_ERR_OK) {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/telephone/uploads/";
    $target_file = $target_dir . basename($_FILES["uploaded_file"]["name"]);

    if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {

      $file_contents = file_get_contents($target_file);

      $teks = htmlspecialchars($file_contents);

      $sql = "SELECT * FROM setting WHERE handphone_no LIKE '%$teks%'";

      $res = mysqli_query($conn, $sql);

      unlink($target_file);
    } else {
      echo "Terjadi kesalahan saat mengunggah file.";
    }
  } else {
    echo "Terjadi kesalahan: " . $_FILES["uploaded_file"]["error"];
  }
}

if (isset($_POST['confirm_search_no'])) {
  $search_no = $_POST['search_no'] ?? '';

  $sql = "SELECT * FROM setting WHERE handphone_no LIKE '%$search_no%'";

  $res = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Phone Billing</title>
</head>

<body>
  <?php include('../components/navbar.php'); ?>

  <div class="flex gap-10 px-5">
    <?php include('../components/sidebar.php'); ?>

    <div class="flex-1 py-5">
      <div class="text-center py-1 font-bold" style="background-color: #5F9FD4;">HandPhone Responible Deletion</div>

      <a href="/telephone/utils/template_delete.zip">Download template file <span style="color: blue;">DeletePhoneNumberTemplate</span></a>

      <div class="text-center" style="background-color: #5F9FD4; height: 30px;"></div>

      <form action="phone-billing.php" method="post" enctype="multipart/form-data" class="px-20 py-2" style="background-color: #F5F5F5; display: flex; justify-content: space-between; align-items: center;">
        <h1 class="text-end font-medium" style="width: 230px;">Import list to be deleted</h1>

        <input type="file" name="uploaded_file" class="border border-gray-400">

        <button type="submit" name="upload" class="bg-gray-200 border border-gray-400 px-5 rounded-lg">SEARCH</button>

      </form>

      <form action="phone-billing.php" method="post" class="px-20 py-2 " style="background-color: #F5F5F5; display: flex; justify-content: space-between; align-items: center;">
        <div class="font-medium" style="width: 250px;">

          <h1><span style="color: red;">OR</span> type the number spreated by</h1>
          <h5 class="text-end" style="margin-right: 15px;">semicolon(;)</h5>
        </div>

        <input type="number" name="search_no" value="<?= $_POST['search_no'] ?? '' ?>" class="border border-gray-400 px-2" style="width: 230px;">

        <button type="submit" name="confirm_search_no" class="bg-gray-200 border  border-gray-400 px-5 rounded-lg">SEARCH</button>

      </form>


      <form action="phone-billing.php" method="post">

        <div>
          <div class="bg-[#5A9FD6] text-center font-bold mb-[2px]">HANDPHONE RESPONSIBLE LIST</div>
          <?php if (isset($_POST['confirm_search_no']) || isset($_POST['upload'])) : ?>

            <table class="w-full border-collapse border">
              <thead class="text-center" style="background-color: #5A9FD6;">
                <tr>
                  <th class="border">HANDPHONE NO</th>
                  <th class="border">BADEGE NO </th>
                  <th class="border">USER NAME</th>
                  <th class="border">CHARGING NO</th>
                  <th class="border">PURPOSE</th>
                  <th class="border">CHARGE QUOTA</th>
                  <th class="border">Select</th>
                </tr>
              </thead>
              <tbody style="background-color: #F5F5F5;">

                <?php if (mysqli_num_rows($res) !== 0) : ?>

                  <?php while ($data = mysqli_fetch_assoc($res)) : ?>
                    <tr>
                      <th class="border font-normal text-center"><?= $data['handphone_no']; ?></th>
                      <th class="border  font-normal text-center"><?= $data['badge_number']; ?></th>
                      <th class="border  font-normal text-left px-1"><?= $data['user_name']; ?></th>
                      <th class="border  font-normal text-left px-1"><?= $data['charging_no']; ?></th>
                      <th class="border  font-normal text-left px-1"><?= $data['purpose']; ?></th>
                      <th class="border font-normal text-left px-1"><?= $data['charge_quota']; ?></th>
                      <th class="border">
                        <form action="phone-billing.php" method="post">
                          <input type="checkbox" name="checked[]" value="<?= $data['id']; ?>">

                      </th>
                    </tr>
                  <?php endwhile; ?>

                <?php endif; ?>

              </tbody>
            </table>
          <?php endif; ?>

        </div>

        <div class="flex justify-end py-2">
          <button name="delete" class="bg-gray-200 border border-gray-400 px-5 rounded-lg">DELETE</button>
      </form>

    </div>

    </form>

  </div>

  </div>
</body>

</html>

<?php


if (isset($_POST['delete'])) {
  $id = $_POST['checked'];
  $total_data = count($id);

  for ($i = 0; $i < $total_data; $i++) {

    $sql = "DELETE FROM setting WHERE id='$id[$i]'";
    mysqli_query($conn, $sql);
  }

?>
  <script language="JavaScript">
    document.location = './table-setting.php';
  </script>
<?php

}
?>