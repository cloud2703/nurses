<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'health'; // Thay bằng tên database bạn dùng

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Giả sử NurseID đang đăng nhập là 1 (bạn nên dùng $_SESSION ở thực tế)
$nurse_id = 1;

// Truy vấn thông tin y tá
$nurse_sql = "SELECT * FROM NURSE WHERE NurseID = $nurse_id";
$nurse_result = $conn->query($nurse_sql);
$nurse = $nurse_result->fetch_assoc();

// Truy vấn lịch hẹn liên quan đến y tá
$schedule_sql = "
    SELECT a.AppointmentDate, a.AppointmentTime, p.FirstName AS PatientFirstName, p.LastName AS PatientLastName, a.Reason, a.Status
    FROM APPOINTMENT a
    JOIN PATIENT p ON a.PatientID = p.PatientID
    JOIN PATIENT_NURSE pn ON pn.PatientID = p.PatientID
    WHERE pn.NurseID = $nurse_id
    ORDER BY a.AppointmentDate, a.AppointmentTime
";
$schedule_result = $conn->query($schedule_sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nurse Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
    }

    .sidebar a:hover {
      background-color: var(--primary-color);
      color: white;
      border-radius: 8px;
    }

    .main-wrapper {
      flex-grow: 1;
      background-color: var(--right-panel);
      padding: 40px;
      overflow-y: auto;
    }

    .main-content {
      background: white;
      border-radius: 16px;
      padding: 30px;
      max-width: 1000px;
      margin: 0 auto;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .top-section {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      align-items: center;
    }

    .profile-img {
      width: 150px;
      height: 150px;
      border-radius: 12px;
      object-fit: cover;
    }

    .nurse-info {
      max-width: 400px;
    }

    .nurse-info h3 {
      margin-bottom: 10px;
    }

    .nurse-info p {
      margin: 6px 0;
    }

    .schedule-section {
      margin-top: 40px;
    }

    .calendar-grid {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      flex-wrap: wrap;
      gap: 5px;
    }

    .calendar-grid .day {
      text-align: center;
      padding: 10px;
      background-color: #ddd;
      border-radius: 6px;
      min-width: 80px;
      font-weight: 500;
    }

    .time-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 10px;
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

    .time-slot {
      padding: 10px;
      background-color: #d3d3d3;
      border-radius: 6px;
      text-align: center;
      cursor: pointer;
    }

    .datetime-pickers {
      margin-top: 30px;
    }

    .datetime-pickers label {
      display: block;
      margin: 20px 0 8px;
      font-weight: 600;
    }

    .input-group {
      position: relative;
      display: inline-block;
    }

    .input-group input {
      padding: 10px 40px 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-family: 'Poppins', sans-serif;
      width: 220px;
      cursor: pointer;
    }

    .input-group i {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      font-style: normal;
      pointer-events: none;
      color: #666;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h3> <img src="healthcare.png" width=40 height=40> Hospital's Name</img></h3>
    <a href="">Dashboard</a>
	
	<div class="dropdown">
      <a href="patientinfo.php">Patient Information</a>
      <div class="dropdown-content">
        <a href="patientresult.php">Patient Results</a>
      </div>
    </div>
    <a href="#">Medical Procedures</a>
    <a href="feedback.php">Feedback</a>
    <a href="#">Settings</a>
    <a href="#">More</a>
  </div>

  <!-- Main Content -->
  <div class="main-wrapper">
    <div class="main-content">

      <h2>Nurse’s Dashboard</h2>

      <div class="top-section">
        <img src="nurse.jpg" alt="Nurse" class="profile-img">

        <div class="nurse-info">
  <h3>Nurse Information</h3>
  <p><strong>Name:</strong> <?php echo $nurse['FirstName'] . ' ' . $nurse['LastName']; ?></p>
  <p><strong>Email:</strong> <?php echo $nurse['Email']; ?></p>
  <p><strong>Department:</strong> <?php echo $nurse['Department']; ?></p>
  <p><strong>Hire Date:</strong> <?php echo date('F d, Y', strtotime($nurse['HireDate'])); ?></p>
  <p><strong>Location:</strong> Central General Hospital</p>
</div>

      </div>

    <div class="schedule-section">
  <h3>Patient Appointment Schedule</h3>
  <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse; background:#fff;">
    <thead style="background:#eee;">
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th>Patient Name</th>
        <th>Reason</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $schedule_result->fetch_assoc()): ?>
        <tr>
          <td><?php echo date('M d, Y', strtotime($row['AppointmentDate'])); ?></td>
          <td><?php echo date('H:i', strtotime($row['AppointmentTime'])); ?></td>
          <td><?php echo $row['PatientFirstName'] . ' ' . $row['PatientLastName']; ?></td>
          <td><?php echo $row['Reason']; ?></td>
          <td><?php echo $row['Status']; ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>


    </div>
  </div>

  <!-- JS Flatpickr -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr("#datepicker", {
      dateFormat: "Y-m-d",
      defaultDate: "2025-04-07"
    });

    flatpickr("#timepicker", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i"
    });
  </script>

</body>
</html>
