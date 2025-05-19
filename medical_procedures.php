<?php
// THÔNG TIN KẾT NỐI DATABASE
$servername = "localhost";
$username = "root";
$password = ""; // sửa nếu có
$dbname = "health"; // 

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
$sql = "SELECT 
            m.MedicationID, m.MedicationName, m.Dosage, m.StartDate, m.EndDate, 
            m.Instructions, m.PrescribedByID, 
            p.FirstName, p.LastName, p.DateOfBirth
        FROM medication m
        INNER JOIN patient p ON m.PatientID = p.PatientID
        ORDER BY m.StartDate DESC";

$result = mysqli_query($conn, $sql);


?>


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
    <h3><img src="healthcare.png" width=40 height=40> Hospital's Name</img></h3>
    <a href="homepagenurse.php">Dashboard</a>
    <div class="dropdown">
      <a href="patientinfo.php">Patient Information</a>
     <!-- <div class="dropdown-content">
        <a href="patientresult.php">Patient Results</a>
      </div>-->
    </div>
    <a href="#">Medical Procedures</a>
    <a href="feedback.php">Provide Feedback</a>

  </div>

  <div class="main">
    <div class="content">
      

      <table>
     
        <tbody>
        <div class="medical-procedures p-6">
  
		<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Medical Procedures</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 text-sm text-left bg-white shadow rounded-lg">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Patient</th>
                    <th class="px-4 py-2">DOB</th>
                    <th class="px-4 py-2">Medication</th>
                    <th class="px-4 py-2">Dosage</th>
                    <th class="px-4 py-2">Start</th>
                    <th class="px-4 py-2">End</th>
                    <th class="px-4 py-2">Instructions</th>
                    <th class="px-4 py-2">Prescribed By</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='hover:bg-blue-50'>";
                    echo "<td class='px-4 py-2'>{$count}</td>";
                    echo "<td class='px-4 py-2'>{$row['FirstName']} {$row['LastName']}</td>";
                    echo "<td class='px-4 py-2'>{$row['DateOfBirth']}</td>";
                    echo "<td class='px-4 py-2'>{$row['MedicationName']}</td>";
                    echo "<td class='px-4 py-2'>{$row['Dosage']}</td>";
                    echo "<td class='px-4 py-2'>{$row['StartDate']}</td>";
                    echo "<td class='px-4 py-2'>{$row['EndDate']}</td>";
                    echo "<td class='px-4 py-2'>{$row['Instructions']}</td>";
                    echo "<td class='px-4 py-2'>{$row['PrescribedByID']}</td>";
                    echo "</tr>";
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
      </tbody>
       
      </table>

      


    </div>
  </div>
</body>
</html>
