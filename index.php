<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Welcome</title>
</head>

<body>

  <?php include('./components/navbar.php') ?>

  <div class="flex gap-10 px-5">
    <?php include('./components/sidebar.php') ?>

    <div class="flex-1 py-10">

      <div class="flex justify-between items-start gap-10">

        <div class="w-[40%] mx-auto">
          <h1 class="text-[#6C6AAB] font-medium text-2xl font-serif">WELCOME TO PHONE BILLING SYSTEM</h1>

          <i class="fa-solid fa-square-phone-flip" style="font-size: 100px; text-align: center; color: green; display: flex; justify-content: center; margin-top: 20px;"></i>
        </div>


        <div class=" font-serif">
          <div class="bg-[#DEDFFE] px-3 ">
            <div>
              <p>To use this application please use the navigation menu available on the left each page</p>
              <p>To create, save, delete execute other commands please use command buttons available</p>
              <p class="text-end">on the bottom of each page.</p>
            </div>

            <div class="text-end" style="margin-top: 40px;">
              <p>Supported browser is Internet Explorer 5.0 or above.</p>
              <p>Best viewed on 1024 x 768 resolution higher</p>
            </div>

            <div style="padding: 20px 0px;">
              <div style="display: flex; gap: 5px; color: blue;">
                <p class="underline">Process Flow </p>
                <span>-</span>
                <p class="underline">F A Q</p>
              </div>

              <div style="display: flex; gap: 5px; color: blue;">
                <p class="underline">User Guidance</p>
                <span>-</span>
                <p class="underline">User Guidance (Multimedia Version)</p>
              </div>

            </div>
          </div>

          <div class="text-end py-10">

            <h5>Copyright 2007 <span class="underline" style="color: blue;">PT International Nickel Indonesia</span>
            </h5>
            <h5>Developed by <span class="underline" style="color: blue;">PT Gudang Data Informatika</span></h5>
          </div>


        </div>

      </div>


    </div>

  </div>


</body>

</html>