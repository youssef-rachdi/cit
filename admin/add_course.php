<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
include '../includes/db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];

    // Video Upload Handling
    $target_dir = "../uploads/videos/"; // Upload directory
    $video_name = basename($_FILES["course_video"]["name"]);
    $target_file = $target_dir . $video_name;
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a valid video
    $allowed_types = array("mp4", "avi", "mov", "wmv");
    if (!in_array($videoFileType, $allowed_types)) {
        echo "<div class='alert alert-danger'>Only MP4, AVI, MOV, and WMV files are allowed.</div>";
    } else {
        // Move uploaded file
        if (move_uploaded_file($_FILES["course_video"]["tmp_name"], $target_file)) {
            // Save course info in the database
            $stmt = $conn->prepare("INSERT INTO courses (title, description, video_url) VALUES (:title, :description, :video_url)");
            $stmt->bindParam(':title', $course_name);
            $stmt->bindParam(':description', $course_description);
            $stmt->bindParam(':video_url', $video_name);
            $stmt->execute();

            header("Location: manage_courses.php?success=Course added");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Error uploading the video.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Add New Course</h2>

    <form action="add_course.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="course_name" class="form-label">Course Title</label>
            <input type="text" class="form-control" id="course_name" name="course_name" required>
        </div>

        <div class="mb-3">
            <label for="course_description" class="form-label">Course Description</label>
            <textarea class="form-control" id="course_description" name="course_description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="course_video" class="form-label">Upload Course Video</label>
            <input type="file" class="form-control" id="course_video" name="course_video" accept="video/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Course</button>
        <a href="manage_courses.php" class="btn btn-secondary">Back</a>
    </form>
</div>

</body>
</html>
