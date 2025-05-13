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
    <h2><img src="healthcare.png" width=40 height=40> Hospital's Name</img></h2>
    <a href="homepagenurse.php">Dashboard</a>
    <a href="patientinfo.php">Patient Information</a>
    <a href="#">Medical Procedures</a>
    <a href="feedback.php">Provide Feedback</a>
    <a href="#">Settings</a>
    <a href="#">More</a>
  </div>

  <div class="main-wrapper">
    <div class="main-content">
      <h1>Share your feedback</h1>

      <label for="feedbackType">Feedback type</label>
      <select id="feedbackType">
        <option value="">Select feedback type</option>
        <option value="service">Service</option>
        <option value="staff">Staff</option>
        <option value="facility">Facility</option>
      </select>

      <label for="feedbackDetails">Feedback details</label>
      <textarea id="feedbackDetails" placeholder="Describe your feedback..."></textarea>

      <label class="file-label" for="fileUpload">Upload file (optional)</label>
      <input type="file" id="fileUpload">

      <button class="submit-btn">Submit</button>
    </div>
  </div>
</body>
</html>
