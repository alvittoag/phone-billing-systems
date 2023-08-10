<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Form Table Add</title>
</head>

<body>
  <?php include('../components/navbar.php'); ?>

  <div class="flex gap-10 px-5">
    <?php include('../components/sidebar.php'); ?>

    <div class="flex-1 py-5">
      <form action="form-tablesetting-add.php" method="post">

        <table class="w-full border-collapse border">
          <thead>
            <th colspan="2" class="border bg-[#5A9FD6] font-bold">HANDPHONE RESPONSIBLE - ADD</th>
          </thead>
          <tbody style="background-color: #F5F5F5;">
            <tr>
              <td class="px-3 w-96 border py-2 font-medium">Mobile Phone No</td>
              <td class="border  px-5">
                <input type="number" name="handphone_no" class="px-2 border border-gray-400 w-64" required>
                <span class="text-red-500">*)</span>
              </td>
            </tr>


            <tr>
              <td class="px-3 w-72 border py-2 font-medium">Phone Model</td>
              <td class="border  px-5">
                <input type="text" name="phone_model" class="px-2 border border-gray-400 w-[40rem]">
              </td>
            </tr>


            <tr>
              <td class="px-3 w-72 border py-2 font-medium">Badge No</td>
              <td class="border  px-5">
                <input type="text" name="badge_number" class="px-2 border border-gray-400 w-64">
              </td>
            </tr>

            <tr>
              <td class="px-3 w-72 border py-2 font-medium">User Name</td>
              <td class="border  px-5">
                <input type="text" name="user_name" class="px-2 border border-gray-400 w-64" required>
                <span class="text-red-500">*)</span>
              </td>
            </tr>

            <tr>
              <td class="px-3 w-72 border py-2 font-medium">Charging Info</td>
              <td class="border px-5">
                <div class="flex items-stretch">
                  <select name="select_charging" class="border border-gray-400 ">
                    <option value="CC">CC</option>
                    <option value="WO">WO</option>
                  </select>

                  <input type="text" name="charging_no" class="px-2 border border-gray-400 w-64" required>
                  <span class="text-red-500">*)</span>
                </div>

              </td>
            </tr>

            <tr>
              <td class="px-3 w-72 border py-2 font-medium">Purpose</td>
              <td class="border px-5">
                <select name="purpose" class="border border-gray-400 ">
                  <option value="Personal">Personal</option>
                  <option value="Business">Business</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="px-3 w-72 border py-2 font-medium">Charge Quota (quota stratum override)</td>
              <td class="border  px-5">
                <input type="number" name="charge_quota" class="px-2 border border-gray-400 w-64">
                <span class="text-red-500">(Set -999 for unlimited data)</span>
              </td>
            </tr>

            </td>
          </tbody>
        </table>

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

include('../data/db.php');


if (isset($_POST['save'])) {
  $handphone_no = $_POST['handphone_no'];
  $phone_model = $_POST['phone_model'] ?? '';
  $badge_number = $_POST['badge_number'] ?? '';
  $user_name = $_POST['user_name'];

  $select_charging = $_POST['select_charging'];
  $charging_no = $_POST['charging_no'];

  $purpose = $_POST['purpose'];
  $charge_quota = $_POST['charge_quota'] ?? '';


  $sql = "INSERT INTO setting (handphone_no, phone_model, badge_number, user_name, charging_selected, charging_no, purpose, charge_quota) VALUES ('$handphone_no', '$phone_model', '$badge_number', '$user_name', '$select_charging - ', '$charging_no', '$purpose', '$charge_quota')";

  mysqli_query($conn, $sql);

?>
  <script language="JavaScript">
    document.location = './table-setting.php';
  </script>
<?php
}

?>