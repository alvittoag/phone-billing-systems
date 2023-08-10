<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phone";
$recordsPerPage = 10;
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentpage - 1) * $recordsPerPage;
$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
//query to table phone save to arrray $result

if (isset($_GET['nama'])  && isset($_GET['phone']) && isset($_GET['departement'])) {
  $nama = $_GET['nama'] ?? '';
  $phone = $_GET['phone'] ?? '';
  $departement = $_GET['departement'] ?? '';
  $location = isset($_GET['location']) ? $_GET['location'] : ''; // Set location to an empty string if not provided
  $sql = "SELECT * 
  FROM phone 
  WHERE name LIKE '%" . $nama . "%' 
  OR phone ='" . $phone . "'
  OR UPPER(departement)='" . strtoupper($departement) . "'
  OR UPPER(location)= '" . strtoupper($location) . "'
  LIMIT " . $offset . ", " . $recordsPerPage;

  $result = mysqli_query($connection, $sql);
  $totalRecords = mysqli_num_rows($result);
} else {
  $sql = "SELECT * FROM phone LIMIT $offset, $recordsPerPage";
  $totalRecords = 1890;
  $result = mysqli_query($connection, $sql);
}


$totalPages = ceil($totalRecords / $recordsPerPage);

mysqli_close($connection);
//query for get departement




?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>PT TELEPHONE</title>
</head>

<body>
  <div class="container">
    <h1 class="mt-3">Telephone</h1>
    <hr>
    <form action="#" method="GET">
      <div class="row">
        <div class="col-5">
          <div class="mb-3">
            <label for="text" class="form-label">Nama</label>
            <input type="text" class="form-control" id="text" name="nama" value="<?= $_GET['nama'] ?? '' ?>">
          </div>
          <div class="mb-3">
            <label for="text" class="form-label">Phone</label>
            <input type="number" class="form-control" id="text" name="phone" min="0" value="<?= $_GET['phone'] ?? 0 ?>">
          </div>
        </div>
        <div class="col-5">
          <div class="mb-3">
            <label for="text" class="form-label">Departement</label>
            <select class="form-select" name="departement">
              <option value="">Departement</option>
              <option value="ETDS">ETDS</option>
              <option value="EXTERNAL RELATION">EXTERNAL RELATION</option>
              <option value="UTILITIES">UTILITIES</option>
              <option value="IT">IT</option>
              <option value="COMMERCIAL">COMMERCIAL</option>
              <option value="M I N E">MINE</option>
              <option value="CONSTRUCTION SERVICES">CONSTRUCTION SERVICES</option>
              <option value="GFS">GFS</option>
              <option value="PROCESS PLANT">PROCESS PLANT</option>
              <option value="Y P S">YPS</option>
              <option value="M E M">MEM</option>
              <option value="MOBILE EQUIPMENT MAINTENANCE">MOBILE EQUIPMENT MAINTENANCE</option>
              <option value="EXPLORATION & MINE DEVELOPMENT">EXPLORATION & MINE DEVELOPMENT</option>
              <option value="COMPTROLLER">COMPTROLLER</option>
              <option value="E H S">EHS</option>
              <option value="PLANT MAINTENANCE">PLANT MAINTENANCE</option>
              <option value="S C M">SCM</option>
              <option value="PROCESS PLANT MAINTENANCE">PROCESS PLANT MAINTENANCE</option>
              <option value="CAPITAL PROJECT, ENGINERING & CONSTRUCTION">CAPITAL PROJECT, ENGINERING & CONSTRUCTION</option>
              <option value="GOVERNMENT RELATION">GOVERNMENT RELATION</option>
              <option value="DSS">DSS</option>
              <option value="MEDICAL SERVICES">MEDICAL SERVICES</option>
              <option value="Maintenance & Utilities">Maintenance & Utilities</option>
              <option value="TAX">TAX</option>
              <option value="MGX">MGX</option>
              <option value="TOWM SERVICES">TOWM SERVICES</option>
              <option value="PTI COW PROJ OFFICE">PTI COW PROJ OFFICE</option>
              <option value="SECURITY">SECURITY</option>
              <option value="HUMAN RESOURCE">HUMAN RESOURCE</option>
              <option value="HUMAN RELATION">HUMAN RELATION</option>
              <option value="CENTRAL PLANNING">CENTRAL PLANNING</option>
              <option value="Contract Management">Contract Management</option>
              <option value="PROCESS TECHNOLOGY">PROCESS TECHNOLOGY</option>
              <option value="PPE">PPE</option>
              <option value="IGP">IGP</option>
              <option value="INTERNAL AUDIT">INTERNAL AUDIT</option>
              <option value="LOGISTICS & PROCUREMENT">LOGISTICS & PROCUREMENT</option>
              <option value="Central Engineering">Central Engineering</option>
              <option value="OPERATIONAL PLANNING & GEOTECHNICAL">OPERATIONAL PLANNING & GEOTECHNICAL</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="text" class="form-label">Phone Location</label>
            <select class="form-select" name="location">
              <option value="">Location</option>
              <option value="PLANT SITE">PLANT SITE</option>
              <option value="TOWN SITE">TOWN SITE</option>
              <option value="HARAPAN OFFICE">HARAPAN OFFICE</option>
              <option value="BALAMBANO">BALAMBANO</option>
              <option value="ENGGANO">ENGGANO</option>
              <option value="JAKARTA">JAKARTA</option>
              <option value="GUNUNG BATU">GUNUNG BATU</option>
              <option value="BAHODOPI">BAHODOPI</option>
              <option value="BALANTANG">BALANTANG</option>
              <option value="MAKASSAR">MAKASSAR</option>
              <option value="POMALAA">POMALAA</option>
              <option value="PETEA">PETEA</option>
              <option value="LARONA">LARONA</option>
              <option value="KAREBBE">KAREBBE</option>
            </select>
          </div>
        </div>
      </div>
      <button class="btn btn-success">Search</button>
      <a href="http://localhost/telephone/" class="btn btn-danger">Clear</a>
    </form>
  </div>
  <div class="container-fluid mt-3 p-5">
    <div class="card">
      <div class="card-header">
        <a href="http://localhost/telephone/phone.xlsx" class="btn btn-primary">Download</a>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Phone</th>
              <th scope="col">Sorowako DID</th>
              <th scope="col">Jakarta DID</th>
              <th scope="col">Phone Type</th>
              <th scope="col">Phone Location</th>
              <th scope="col">Departement</th>
              <th scope="col">DP</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
              <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['sorowako'] ?? '-' ?></td>
                <td><?= $row['jakarta'] ?></td>
                <td><?= $row['type'] ?></td>
                <td><?= $row['location'] ?></td>
                <td><?= $row['departement'] ?></td>
                <td><?= $row['dp'] ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <?php if ($currentpage > 1) : ?>
              <li class="page-item">
                <a class="page-link" href="?page=1">First</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $currentpage - 1; ?>">Previous</a>
              </li>
            <?php endif; ?>

            <?php
            // Batasan jumlah halaman yang ditampilkan sekitar halaman aktif
            $maxPagesToShow = 5;
            $startPage = max(1, $currentpage - floor($maxPagesToShow / 2));
            $endPage = min($totalPages, $startPage + $maxPagesToShow - 1);

            for ($page = $startPage; $page <= $endPage; $page++) :
            ?>
              <li class="page-item <?php if ($page == $currentpage) echo 'active'; ?>">
                <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
              </li>
            <?php endfor; ?>

            <?php if ($currentpage < $totalPages) : ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $currentpage + 1; ?>">Next</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $totalPages; ?>">Last</a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>