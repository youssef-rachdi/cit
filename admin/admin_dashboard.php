<?php
session_start();
include '../includes/db.php';
// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: admin_dashboard.php");
    exit;
}

// Fetch total users
$stmt = $conn->prepare("SELECT COUNT(*) as total_users FROM users");
$stmt->execute();
$totalUsers = $stmt->fetch(PDO::FETCH_ASSOC)['total_users'];

// Fetch total courses
$stmt = $conn->prepare("SELECT COUNT(*) as total_courses FROM courses");
$stmt->execute();
$totalCourses = $stmt->fetch(PDO::FETCH_ASSOC)['total_courses'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LearnPlatform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <span class="text-light">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <!-- Users Card -->
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-4"><?php echo $totalUsers; ?></p>
                </div>
            </div>
        </div>
        
        <!-- Courses Card -->
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Courses</h5>
                    <p class="card-text display-4"><?php echo $totalCourses; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Manage Users and Courses -->
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="../admin/manage_users.php" class="btn btn-warning w-100">Manage Users</a>
        </div>
        <div class="col-md-6">
            <a href="../admin/manage_courses.php" class="btn btn-info w-100">Manage Courses</a>
        </div>
    </div>
</div>

</body>
</html>
