<?php
session_start();
require 'db.php';

// ตรวจสอบว่ามีการเข้าสู่ระบบหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// ดึงข้อมูลจาก session
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Manager Dashboard</title>
    <link rel="icon" href="image/HOWDENLOGO.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesindex2.css">
</head>
<body> 
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index2.php">
            <img src="image/HOWDEN2.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="navbar-text">Hi User: <span><?= htmlspecialchars($username) ?></span> (<?= htmlspecialchars($role) ?>)</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index2.php">Home Page</a>
            </li>
            <!-- Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if ($role != 'officer'): ?>
                        <a class="dropdown-item" href="dashboard.php">Permission</a>
                        <a class="dropdown-item" href="dashboard2.php">Dashboard</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="index.php">Add Customer</a>
                    <a class="dropdown-item" href="clamdb/indexclam.php">Claim Reports</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="welcome-section">
        <div class="container">
            <h1>Welcome to Customer Management System</h1>
            <p>Manage your customers easily and efficiently.</p>
        </div>
    </div>

    <div class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-users"></i>
                        <h3>Manage Customers</h3>
                        <p>Add, edit, and delete customer records.</p>
                    </div>
                </div>
                <?php if ($role != 'officer'): ?>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-chart-line"></i>
                        <h3>Dashboard</h3>
                        <p>View important metrics and analytics.</p>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-file-export"></i>
                        <h3>Export Data</h3>
                        <p>Export customer data to Excel for reporting.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © Boat Patthanapong.URU Version 1.0.0</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
