 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$feedbacks = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientID = $_POST['patientID'] ?? null;
    $nurseID = $_POST['nurseID'] ?? null;
    $rating = $_POST['rating'] ?? null;
    $comments = $_POST['feedbackDetails'] ?? null;
    $feedbackDate = date("Y-m-d H:i:s");

    if ($patientID && $nurseID && $rating && $comments) {
        // Thêm feedback mới
        $sql = "INSERT INTO feedback (PatientID, NurseID, FeedbackDate, Rating, Comments, IsAddressed)
                VALUES (?, ?, ?, ?, ?, 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisis", $patientID, $nurseID, $feedbackDate, $rating, $comments);

        if ($stmt->execute()) {
            echo "<script>alert('Feedback submitted successfully');</script>";
        } else {
            echo "<script>alert('Lỗi khi thêm dữ liệu: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    }
}

    // ✅ Truy vấn tất cả feedback để hiển thị
$feedbacks = [];
$feedback_sql = "SELECT PatientID, NurseID, FeedbackDate, Rating, Comments FROM feedback ORDER BY FeedbackDate DESC";
$result = $conn->query($feedback_sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;
    }
}
?>

 
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Provide Feedback</title>
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
      max-width: 800px;
      margin: 0 auto;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    h1 {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: 600;
      margin: 20px 0 10px;
    }

    select, textarea, input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    textarea {
      height: 150px;
      resize: none;
    }

    .file-label {
      margin-top: 15px;
    }

    .submit-btn {
      margin-top: 30px;
      padding: 12px 24px;
      background-color: black;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h3><img src="healthcare.png" width=40 height=40> Hospital's Name</img></h3>
    <a href="homepagenurse.php">Dashboard</a>
    <a href="patientinfo.php">Patient Information</a>
    <a href="medical_procedures.php">Medical Procedures</a>
    <a href="feedback.php">Provide Feedback</a>


  </div>

<body>
 <div class="main-wrapper">
    <div class="main-content">

    
	<?php if (!empty($feedbacks)): ?>
  <h2 style="margin-top: 50px;">Feedback List</h2>
  <table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse: collapse; margin-top: 15px;">
    <tr style="background-color: #f0f0f0;">
      <th>Patient ID</th>
      <th>Nurse ID</th>
      <th>Feedback Date</th>
      <th>Rating</th>
      <th>Comments</th>
    </tr>
    <?php foreach ($feedbacks as $fb): ?>
      <tr>
        <td><?= $fb['PatientID'] ?></td>
        <td><?= $fb['NurseID'] ?></td>
        <td><?= $fb['FeedbackDate'] ?></td>
        <td><?= $fb['Rating'] ?></td>
        <td><?= htmlspecialchars($fb['Comments']) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php else: ?>
  <p style="margin-top: 40px;">No feedback has been submitted yet.</p>
<?php endif; ?>

    </div>
  </div>
</body>
</html>
