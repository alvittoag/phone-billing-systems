<table border="1" cellpadding="5" class="border border-collapse w-full ">
  <thead>
    <tr>
      <th class="border">HANDPHONE NO</th>
      <th class="border">BADGE NUMBER</th>
      <th class="border">USER NAME</th>
      <th class="border">CHARGING NO</th>
      <th class="border">PURPOSE</th>
      <th class="border">CHARGE QUOTA</th>
    </tr>
  </thead>

  <tbody>
    <?php while ($data = mysqli_fetch_assoc($res)) : ?>
      <tr>
        <td class="border"><?= $data['handphone_no']; ?></td>
        <td class="border text-center"><?= $data['badge_number']; ?></td>
        <td class="border text-left"><?= $data['user_name']; ?></td>
        <td class="border"><?= $data['charging_selected'] ?> <?= $data['charging_no']; ?></td>
        <td class="border text-center"><?= $data['purpose']; ?></td>
        <td class="border text-center"><?= $data['charge_quota']; ?></td>
      </tr>
    <?php endwhile; ?>



  </tbody>
</table>