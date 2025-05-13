<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealthcarePortal - Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #8a55d7;
      --primary-dark: #6941c6;
      --light-gray: #f5f5f7;
      --text-color: #333333;
      --error-color: #e74c3c;
      --success-color: #2ecc71;
    }

    .page-header {
      display: flex;
      align-items: center;
      padding: 10px 20px;
      background-color: white;
      border-bottom: 1px solid #ddd;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo-icon {
      color: #ff4d4d;
      /* Red color for the cross icon */
      font-size: 1.5rem;
      font-weight: bold;
    }

    .logo-text {
      font-size: 1.2rem;
      font-weight: 600;
      color: #333;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      background-color: #fff;
      display: flex;
      flex-direction: column;
    }

    .login-container {
      display: flex;
      width: 100%;
      flex: 1;
    }

    .login-form-section {
      flex: 1;
      padding: 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      max-width: 1200px;
    }

    .illustration-section {
      flex: 1;
      background-color: var(--light-gray);
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #e9d9ff;
      position: relative;
      overflow: hidden;
    }

    /* Container for the doctor-patient image and decorations */
    .doctor-patient-container {
      position: relative;
      width: 350px;
      height: 350px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Add styles for the doctor-patient image */
    .doctor-patient-image {
      width: 280px;
      height: 280px;
      border-radius: 24px;
      position: relative;
      z-index: 5;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
      object-fit: cover;
    }

    /* Decorative elements for the image */
    .image-decoration {
      position: absolute;
      border-radius: 24px;
      z-index: 2;
    }

    .decoration-1 {
      width: 280px;
      height: 280px;
      background-color: rgba(255, 243, 216, 0.8);
      top: -15px;
      left: -15px;
    }

    .decoration-2 {
      width: 280px;
      height: 280px;
      background-color: rgba(209, 233, 220, 0.8);
      bottom: -15px;
      right: -15px;
    }

    .decoration-3 {
      width: 280px;
      height: 280px;
      background-color: rgba(205, 232, 246, 0.8);
      top: 15px;
      right: 15px;
    }

    .logo {
      height: 32px;
      margin-bottom: 2rem;
    }

    h1 {
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
      color: var(--text-color);
    }

    .subtitle {
      color: #666;
      margin-bottom: 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      color: var(--text-color);
      font-weight: 500;
    }

    input,
    select {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #ddd;
      border-radius: 0.5rem;
      font-size: 1rem;
      transition: border 0.3s ease;
    }

    input:focus,
    select:focus {
      border-color: var(--primary-color);
      outline: none;
    }

    .forgot-password {
      text-align: right;
      margin-top: 0.5rem;
    }

    .forgot-password a {
      color: var(--primary-color);
      text-decoration: none;
      font-size: 0.9rem;
    }

    .forgot-password a:hover {
      text-decoration: underline;
    }

    .btn {
      width: 100%;
      padding: 0.75rem;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 0.5rem;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: var(--primary-dark);
    }

    .btn-google {
      background-color: white;
      color: #333;
      border: 1px solid #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      margin-top: 1rem;
    }

    .btn-google:hover {
      background-color: #f5f5f5;
    }

    .google-icon {
      width: 20px;
      height: 20px;
    }

    .or-divider {
      display: flex;
      align-items: center;
      margin: 1.5rem 0;
      color: #777;
    }

    .or-divider::before,
    .or-divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background-color: #ddd;
    }

    .or-divider span {
      padding: 0 1rem;
      font-size: 0.9rem;
    }

    .role-selector {
      margin-bottom: 1.5rem;
    }

    .role-options {
      display: flex;
      gap: 0.5rem;
      margin-top: 0.5rem;
    }

    .role-option {
      flex: 1;
      border: 1px solid #ddd;
      border-radius: 0.5rem;
      padding: 1rem 0.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .role-option.selected {
      border-color: var(--primary-color);
      background-color: rgba(138, 85, 215, 0.05);
    }

    .role-icon {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
    }

    .role-name {
      font-size: 0.9rem;
      font-weight: 500;
    }

    .illustration {
      max-width: 70%;
      position: relative;
      z-index: 2;
    }

    .bg-pattern {
      position: absolute;
      width: 100%;
      height: 100%;
      opacity: 0.2;
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%236941c6' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    @media (max-width: 768px) {
      .login-container {
        flex-direction: column-reverse;
      }

      .illustration-section {
        height: 200px;
      }

      .login-form-section {
        max-width: 100%;
      }
    }

    .error-message {
      color: var(--error-color);
      font-size: 0.9rem;
      margin-top: 0.5rem;
      display: none;
    }

    .success-message {
      color: var(--success-color);
      font-size: 0.9rem;
      margin-top: 0.5rem;
      display: none;
    }

    .logo-image {
      height: 36px;
      /* Adjust the height as needed */
      width: auto;
      /* Maintain aspect ratio */
    }
  </style>
</head>

<body>
  <!-- Page Header -->
  <header class="page-header">
    <div class="logo">
      <img src="healthcare.png" alt="Hospital Logo" class="logo-image">
      <span class="logo-text">Hospital's Name</span>
    </div>
  </header>
  <div class="login-container">
    <div class="login-form-section">
      <!-- Form logo - could be removed if desired since we now have the header logo -->
      <div class="logo">
        <svg xmlns="http://www.w3.org/2000/svg" width="180" height="32" viewBox="0 0 180 32" fill="none">
          <path
            d="M15.8 2.4C10.6 2.4 6.4 6.6 6.4 11.8C6.4 17 10.6 21.2 15.8 21.2C21 21.2 25.2 17 25.2 11.8C25.2 6.6 21 2.4 15.8 2.4Z"
            fill="#8A55D7" />
          <path
            d="M29.8 23.4C26.6 27.8 21.6 30.6 15.9 30.6C10.2 30.6 5.1 27.8 2 23.4C0.7 21.6 0 19.4 0 17C0 12.6 3.6 9 8 9C10.4 9 12.6 10 14 11.7C15.4 10 17.6 9 20 9C24.4 9 28 12.6 28 17C28 19.4 27.2 21.6 26 23.4H29.8Z"
            fill="#6941C6" />

        </svg>
      </div>

      <h1>Welcome back</h1>
      <p class="subtitle">Please enter your credentials to login</p>

      <div id="login-form">
        <div class="role-selector">
          <label>Select your role</label>
          <div class="role-options">
            <div class="role-option" data-role="patient" onclick="selectRole('patient')">
              <div class="role-icon">👤</div>
              <div class="role-name">Patient</div>
            </div>
            <div class="role-option" data-role="nurse" onclick="selectRole('nurse')">
              <div class="role-icon">👩‍⚕️</div>
              <div class="role-name">Nurse</div>
            </div>
            <div class="role-option" data-role="doctor" onclick="selectRole('doctor')">
              <div class="role-icon">👨‍⚕️</div>
              <div class="role-name">Doctor</div>
            </div>
            <div class="role-option" data-role="admin" onclick="selectRole('admin')">
              <div class="role-icon">🔐</div>
              <div class="role-name">Admin</div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" id="email" placeholder="name@company.com" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="••••••••" required>
          <div class="forgot-password">
            <a href="#">Forgot password?</a>
          </div>
        </div>

        <div id="admin-code" class="form-group" style="display: none;">
          <label for="admin-auth-code">Admin Authentication Code</label>
          <input type="text" id="admin-auth-code" placeholder="Enter admin code">
        </div>

        <div id="doctor-id" class="form-group" style="display: none;">
          <label for="doctor-license">Medical License ID</label>
          <input type="text" id="doctor-license" placeholder="Enter license number">
        </div>

        <div id="nurse-id" class="form-group" style="display: none;">
          <label for="nurse-id-number">Nursing ID</label>
          <input type="text" id="nurse-id-number" placeholder="Enter nursing ID">
        </div>

        <div class="error-message" id="error-message">Invalid credentials. Please try again.</div>
        <div class="success-message" id="success-message">Login successful! Redirecting...</div>

        <button class="btn" onclick="login()">Sign in</button>

        <div class="or-divider">
          <span>OR</span>
        </div>

        <button class="btn btn-google">
          <svg class="google-icon" viewBox="0 0 24 24">
            <path fill="#EA4335"
              d="M5.26620003,9.76452941 C6.19878754,6.93863203 8.85444915,4.90909091 12,4.90909091 C13.6909091,4.90909091 15.2181818,5.50909091 16.4181818,6.49090909 L19.9090909,3 C17.7818182,1.14545455 15.0545455,0 12,0 C7.27006974,0 3.1977497,2.69829785 1.23999023,6.65002441 L5.26620003,9.76452941 Z" />
            <path fill="#34A853"
              d="M16.0407269,18.0125889 C14.9509167,18.7163016 13.5660892,19.0909091 12,19.0909091 C8.86648613,19.0909091 6.21911939,17.076871 5.27698177,14.2678769 L1.23746264,17.3349879 C3.19279051,21.2970244 7.26500293,24 12,24 C14.9328362,24 17.7353462,22.9573905 19.834192,20.9995801 L16.0407269,18.0125889 Z" />
            <path fill="#4A90E2"
              d="M19.834192,20.9995801 C22.0291676,18.9520994 23.4545455,15.903663 23.4545455,12 C23.4545455,11.2909091 23.3454545,10.5272727 23.1818182,9.81818182 L12,9.81818182 L12,14.4545455 L18.4363636,14.4545455 C18.1187732,16.013626 17.2662994,17.2212117 16.0407269,18.0125889 L19.834192,20.9995801 Z" />
            <path fill="#FBBC05"
              d="M5.27698177,14.2678769 C5.03832634,13.556323 4.90909091,12.7937589 4.90909091,12 C4.90909091,11.2182781 5.03443647,10.4668121 5.26620003,9.76452941 L1.23999023,6.65002441 C0.43658717,8.26043162 0,10.0753848 0,12 C0,13.9195484 0.444780743,15.7301709 1.23746264,17.3349879 L5.27698177,14.2678769 Z" />
          </svg>
          Sign in with Google
        </button>

        <p style="text-align: center; margin-top: 2rem; font-size: 0.9rem; color: #666;">
          Don't have an account? <a href="#" style="color: var(--primary-color); text-decoration: none;">Sign up</a>
        </p>
      </div>
    </div>

    <div class="illustration-section">
      <div class="bg-pattern"></div>
      <div class="doctor-patient-container">
        <div class="image-decoration decoration-1"></div>
        <div class="image-decoration decoration-2"></div>
        <div class="image-decoration decoration-3"></div>
        <img src="assets/icons/unnamed.jpg" alt="Doctor with patient" class="doctor-patient-image">
      </div>
    </div>
  </div>

  <script>
    let selectedRole = null;

    function selectRole(role) {
      // Remove selected class from all options
      document.querySelectorAll('.role-option').forEach(option => {
        option.classList.remove('selected');
      });

      // Add selected class to the clicked option
      document.querySelector(`.role-option[data-role="${role}"]`).classList.add('selected');
      selectedRole = role;

      // Hide all role-specific fields
      document.getElementById('admin-code').style.display = 'none';
      document.getElementById('doctor-id').style.display = 'none';
      document.getElementById('nurse-id').style.display = 'none';

      // Show role-specific field if needed
      if (role === 'admin') {
        document.getElementById('admin-code').style.display = 'block';
      } else if (role === 'doctor') {
        document.getElementById('doctor-id').style.display = 'block';
      } else if (role === 'nurse') {
        document.getElementById('nurse-id').style.display = 'block';
      }
    }

    function login() {
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const errorMessage = document.getElementById('error-message');
      const successMessage = document.getElementById('success-message');

      // Hide any previous messages
      errorMessage.style.display = 'none';
      successMessage.style.display = 'none';

      // Simple validation
      if (!email || !password) {
        errorMessage.textContent = 'Please enter both email and password';
        errorMessage.style.display = 'block';
        return;
      }

      if (!selectedRole) {
        errorMessage.textContent = 'Please select a role';
        errorMessage.style.display = 'block';
        return;
      }

      // Additional role-specific validation
      if (selectedRole === 'admin' && !document.getElementById('admin-auth-code').value) {
        errorMessage.textContent = 'Admin authentication code is required';
        errorMessage.style.display = 'block';
        return;
      }

      if (selectedRole === 'doctor' && !document.getElementById('doctor-license').value) {
        errorMessage.textContent = 'Medical license ID is required';
        errorMessage.style.display = 'block';
        return;
      }

      if (selectedRole === 'nurse' && !document.getElementById('nurse-id-number').value) {
        errorMessage.textContent = 'Nursing ID is required';
        errorMessage.style.display = 'block';
        return;
      }

      // In a real app, you would send these credentials to the server here
      // For demo, we'll just show a success message
      successMessage.style.display = 'block';

      // Simulate redirection after login
      setTimeout(() => {
        // Redirect to index.html
        window.location.href = "index.html";
      }, 2000);
    }

    // Pre-select patient role by default
    selectRole('patient');
  </script>
</body>

</html>