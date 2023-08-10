<?php

include('../data/db.php');

$id = $_GET['id'] ?? '';

$sql = "SELECT * FROM setting WHERE id='$id'";

$res = mysqli_query($conn, $sql);

$data = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Form Table Update</title>
</head>

<body>
  <?php
  include('../components/navbar.php');
  ?>

  <div class="flex gap-10 px-5">
    <?php
    include('../components/sidebar.php');
    ?>

    <div class="flex-1 py-5">
      <form action="form-tablesetting-update.php" method="post">

        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <?php if (!isset($_POST['save'])) : ?>
          <table class="w-full border-collapse border">
            <thead>
              <th colspan="2" class="border bg-[#5A9FD6] font-bold">HANDPHONE RESPONSIBLE - UPDATE
              </th>
            </thead>
            <tbody style="background-color: #F5F5F5;">
              <tr>
                <td class="px-3 w-96 border py-2 font-medium">Mobile Phone No</td>
                <td class="border  px-5">
                  <input type="number" name="handphone_no" value="<?= $data['handphone_no']; ?>" class="px-2 border border-gray-400 w-64" required>
                  <span class="text-red-500">*)</span>
                </td>
              </tr>


              <tr>
                <td class="px-3 w-72 border py-2 font-medium">Phone Model</td>
                <td class="border px-5">
                  <input type="text" name="phone_model" value="<?= $data['phone_model']; ?>" class="px-2 border border-gray-400 w-[40rem]">
                </td>
              </tr>


              <tr>
                <td class="px-3 w-72 border py-2 font-medium">Badge No</td>
                <td class="border  px-5">
                  <input type="text" name="badge_number" value="<?= $data['badge_number']; ?>" class="px-2 border border-gray-400 w-64">
                </td>
              </tr>

              <tr>
                <td class="px-3 w-72 border py-2 font-medium">User Name</td>
                <td class="border  px-5">
                  <input type="text" name="user_name" value="<?= $data['user_name']; ?>" class="px-2 border border-gray-400 w-64" required>
                  <span class="text-red-500">*)</span>
                </td>
              </tr>

              <tr>
                <td class="px-3 w-72 border py-2 font-medium">Charging Info</td>
                <td class="border px-5">
                  <div class="flex items-stretch">
                    <select name="select_charging" class="border border-gray-400 ">


                      <option <?php if ($data['charging_selected'] === "CC") {
                                echo ("Selected");
                              } else {
                                null;
                              } ?> value="CC">CC</option>
                      <option <?php
                              if ($data['charging_selected'] === "WO") {
                                echo ("Selected");
                              } else {
                                null;
                              } ?> value="WO">WO</option>
                    </select>

                    <input type="text" value="<?= $data['charging_no']; ?>" name="charging_no" class="px-2 border border-gray-400 w-64" required>
                    <span class="text-red-500">*)</span>
                  </div>

                </td>
              </tr>

              <tr>
                <td class="px-3 w-72 border py-2 font-medium">Purpose</td>
                <td class="border px-5">
                  <select name="purpose" class="border border-gray-400 ">
                    <option <?php if ($data['purpose'] === "Personal") {
                              echo ("Selected");
                            } ?> value="Personal">Personal
                    </option>
                    <option <?php if ($data['purpose'] === "Business") {
                              echo ("Selected");
                            } ?> value="Business">Business
                    </option>
                  </select>
                </td>
              </tr>

              <tr>
                <td class="px-3 w-72 border py-2 font-medium">Charge Quota (quota stratum override)</td>
                <td class="border  px-5">
                  <input type="number" name="charge_quota" value="<?= $data['charge_quota']; ?>" class="px-2 border border-gray-400 w-64">
                  <span class="text-red-500">(Set -999 for unlimited data)</span>
                </td>
              </tr>

              </td>
            </tbody>
          </table>
        <?php endif; ?>



        <div class="flex justify-end gap-5 py-5">
          <button type="submit" name="save" class="bg-gray-200 border border-gray-400 px-8 rounded-lg font-medium">SAVE</button>

          <a href="/telephone/pages/table-setting.php" class="bg-gray-200 border border-gray-400 px-8 rounded-lg font-medium">CANCEL</a>

        </div>

      </form>
    </div>
  </div>

  </div>
</body>

</html>

<?php



if (isset($_POST['save'])) {
  $id_tel = $_POST['id'];
  $handphone_no = $_POST['handphone_no'];
  $phone_model = $_POST['phone_model'] ?? '';
  $badge_number = $_POST['badge_number'] ?? '';
  $user_name = $_POST['user_name'];

  $select_charging = $_POST['select_charging'];
  $charging_no = $_POST['charging_no'];

  $purpose = $_POST['purpose'];
  $charge_quota = $_POST['charge_quota'] ?? '';

  $sql = "UPDATE setting SET handphone_no='$handphone_no', phone_model='$phone_model', badge_number='$badge_number', user_name='$user_name', charging_selected='$select_charging - ', charging_no='$charging_no', purpose='$purpose', charge_quota='$charge_quota' WHERE id='$id_tel'";


  mysqli_query($conn, $sql);

  header('Location: ./table-setting.php');
}

?>