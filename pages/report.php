<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <title>Report</title>
</head>

<body>
  <?php include('../components/navbar.php') ?>

  <div class="flex gap-10 px-5">
    <?php include('../components/sidebar.php') ?>

    <div class="flex-1">
      <form action="report.php" method="post"
        style="padding: 50px 0px;display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px;">

        <textarea placeholder="Fill in your complaint" name="body" cols="90" rows="10"
          class="border border-gray-400 px-5 py-2" required></textarea>

        <button type="submit" name="send"
          class="bg-gray-200 py-2 border border-gray-400 w-64 rounded-lg font-medium">Send</button>
      </form>
    </div>

  </div>
</body>

</html>

<?php
include('../data/db.php');

if (isset($_POST['send'])) {
  $text = $_POST['body'];

  $sql = "INSERT INTO report (complaint) VALUES ('$text')";

  mysqli_query($conn, $sql);

?>
<script language="JavaScript">
alert('Report has been sent');
</script>
<?php
}
?>