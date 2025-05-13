<?php
// THÔNG TIN KẾT NỐI DATABASE
$servername = "localhost";
$username = "root";
$password = ""; // sửa nếu có
$dbname = "health"; // thay bằng tên database thực tế

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý tìm kiếm
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT PatientID, FirstName, LastName, DateOfBirth, Gender, Address FROM PATIENT";
if ($search) {
    $sql .= " WHERE FirstName LIKE '%$search%' OR LastName LIKE '%$search%'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $no = 1;
    while($row = $result->fetch_assoc()) {
        $age = date_diff(date_create($row["DateOfBirth"]), date_create('today'))->y;
        
    }
} else {
    echo "<tr><td colspan='7'>Không tìm thấy bệnh nhân</td></tr>";
}
// Xuất Excel nếu người dùng bấm nút
if (isset($_GET['export']) && $_GET['export'] == "excel") {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=patient_data.xls");

    $excel_sql = "SELECT * FROM PATIENT $search_sql";
    $excel_result = $conn->query($excel_sql);

    echo "PatientID\tFirstName\tLastName\tDateOfBirth\tGender\tAddress\tPhoneNumber\tRegistrationDate\n";
    while ($row = $excel_result->fetch_assoc());
        
    exit;
}


// Truy vấn phản hồi


?>


<script>
function saveData() {
  // Thêm mã để lưu dữ liệu
  alert('Chức năng lưu chưa được triển khai.');
}

function exportToExcel() {
  // Thêm mã để xuất dữ liệu ra Excel
  alert('Chức năng xuất Excel chưa được triển khai.');
}
</script>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Information</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #8a55d7;
      --primary-dark: #6941c6;
      --light-gray: #f5f5f7;
      --text-color: #333333;
      --error-color: #e74c3c;
      --success-color: #2ecc71;
      --dashboard-blue: #dbeeff;
      --right-panel: #e0d2f4;
    }

    * {
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      margin: 0;
      color: var(--text-color);
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 250px;
      background-color: var(--dashboard-blue);
      padding: 20px;
    }

    .sidebar a {
      display: block;
      padding: 12px 10px;
      color: var(--text-color);
      text-decoration: none;
      transition: background 0.3s;
      font-weight: normal;
    }

    .sidebar a:hover {
      background-color: var(--primary-color);
      color: white;
      border-radius: 8px;
    }

    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: var(--dashboard-blue);
      min-width: 200px;
      z-index: 1;
      top: 100%;
      left: 0;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      border-radius: 8px;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-content a {
      padding: 12px 10px;
      display: block;
      color: var(--text-color);
      text-decoration: none;
      border-radius: 8px;
	  font-weight: normal;
    }

    .dropdown-content a:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .main {
      flex-grow: 1;
      background-color: var(--right-panel);
      padding: 40px;
      overflow-y: auto;
    }

    .content {
      background-color: white;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      max-width: 1000px;
      margin: 0 auto;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
      font-size: 14px;
    }

    .feedback {
      margin-top: 30px;
    }

    .feedback h3 {
      margin-bottom: 10px;
    }

    textarea {
      width: 100%;
      height: 100px;
      border-radius: 6px;
      padding: 10px;
      resize: none;
      font-size: 14px;
      border: 1px solid #ccc;
    }

    .button-group {
      margin-top: 20px;
    }

    .btn {
      padding: 10px 20px;
      background-color: black;
      color: white;
      border: none;
      border-radius: 6px;
      margin-right: 10px;
      cursor: pointer;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2><img src="healthcare.png" width=40 height=40> Hospital's Name</img></h2>
    <a href="homepagenurse.php">Dashboard</a>
    <div class="dropdown">
      <a href="patientinfo.php">Patient Information</a>
      <div class="dropdown-content">
        <a href="patientresult.php">Patient Results</a>
      </div>
    </div>
    <a href="#">Medical Procedures</a>
    <a href="feedback.php">Provide Feedback</a>
    <a href="#">Settings</a>
  </div>

  <div class="main">
    <div class="content">
      <h1>View Patient Information</h1>
      <input type="text" placeholder="Search patient...">

      <table>
        <thead>
          <tr>
            <th>PatientID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Phone Number</th>
			<th> Registration Date </th>
          </tr>
        </thead>
        <tbody>
         <?php
        $sql = "SELECT * FROM patient";
        $result = $conn->query($sql);
        $no = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['PatientID'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['DateOfBirth'] . "</td>";
            echo "<td>" . $row['Gender'] . "</td>";
			    echo "<td>" . $row['Address'] . "</td>";
				    echo "<td>" . $row['PhoneNumber'] . "</td>";
					    echo "<td>" . $row['RegistrationDate'] . "</td>";
            echo "<td><a href='patient_detail.php?id=" . $row['PatientID'] . "'>View</a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='7'>No patient data found</td></tr>";
        }
        ?>
      </tbody>
       
      </table>

      <div class="feedback">
		  <h3>Feedback</h3>
		  <?php echo $feedback_html; ?>
		  <textarea placeholder="Write your feedback here..."></textarea>
		</div>
     <div class="button-group">
  <button class="btn" onclick="saveData()">Lưu</button>
  <button class="btn" onclick="exportToExcel()">Xuất Excel</button>
</div>

    </div>
  </div>
</body>
</html>
