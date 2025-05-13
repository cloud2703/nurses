<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Details</title>
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
    }

    .dropdown-content a:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .main {
      flex: 1;
      background-color: var(--right-panel);
      padding: 40px;
      overflow-y: auto;
    }

    .content {
      background-color: white;
      padding: 30px;
      border-radius: 16px;
      max-width: 1000px;
      margin: 0 auto;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }

    .patient-info label {
      font-weight: 600;
      display: inline-block;
      margin: 10px 0 5px;
    }

    .patient-info input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      width: calc(100% - 22px);
      margin-bottom: 10px;
    }

    .patient-section {
      margin-top: 20px;
    }

    .info-group {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .info-group .field {
      flex: 1;
      min-width: 200px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    .btn {
      padding: 10px 20px;
      background-color: var(--primary-dark);
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin: 15px 10px 0 0;
    }

    .btn:hover {
      background-color: var(--primary-color);
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2><img src="healthcare.png" width=40 height=40> Hospital's Name</img></h2>
    <ul style="list-style: none; padding-left: 0;">
      <li><a href="homepagenurse.php">Dashboard</a></li>
      <li class="dropdown">
        <a href="patientinfo.php">Patient Information</a>
        <div class="dropdown-content">
          <a href="patientresult">Patient Results</a>
        </div>
      </li>
      <li><a href="#">Medical Procedures</a></li>
      <li><a href="feedback.php">Provide Feedback</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </div>

  <div class="main">
    <div class="content">
      <h2>Search Results</h2>
      <div class="patient-info">
        <label>Unique Patient ID:</label>
        <input type="text" value="1024">

        <div class="patient-section">
          <fieldset>
            <legend>Patient Details</legend>
            <div class="info-group">
              <div class="field">
                <label>Name:</label>
                <input type="text" value="vishal reddy">
              </div>
              <div class="field">
                <label>Sex:</label>
                <input type="text" value="Male">
              </div>
              <div class="field">
                <label>Marital Status:</label>
                <input type="text" value="Single">
              </div>
            </div>
            <div class="info-group">
              <div class="field">
                <label>Address:</label>
                <input type="text" value="House no 8-20\nABC Colony, XYZ Street\nTelangana">
              </div>
              <div class="field">
                <label>Due Amount:</label>
                <input type="text">
              </div>
            </div>
          </fieldset>
        </div>

        <table>
          <thead>
            <tr>
              <th>Date</th>
              <th>Lab report</th>
              <th>Prescription</th>
              <th>Doctor</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>12/3/2019</td>
              <td><button class="btn">View</button></td>
              <td><button class="btn">View</button></td>
              <td>Dr. Gowtham</td>
            </tr>
          </tbody>
        </table>

        <div style="margin-top: 20px;">
          <button class="btn">Book Appointment</button>
          <button class="btn">Make Payment</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
