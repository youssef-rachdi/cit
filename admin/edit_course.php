<?php
session_start();
include '../includes/db.php';

// Ensure only admin can access this page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$course_id = $_GET['id'] ?? null;
if (!$course_id) {
    echo "Invalid course ID.";
    exit;
}

// Fetch course details
$stmt = $conn->prepare("SELECT * FROM courses WHERE id = :id");
$stmt->bindValue(':id', $course_id);
$stmt->execute();
$course = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$course) {
    echo "Course not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $video_url = $_POST['video_url'] ?? '';

    if ($title && $description && $video_url) {
        $updateStmt = $conn->prepare("UPDATE courses SET title = :title, description = :description, video_url = :video_url WHERE id = :id");
        $updateStmt->bindValue(':title', $title);
        $updateStmt->bindValue(':description', $description);
        $updateStmt->bindValue(':video_url', $video_url);
        $updateStmt->bindValue(':id', $course_id);

        if ($updateStmt->execute()) {
            header("Location: manage_courses.php?success=Course updated successfully");
            exit;
        } else {
            echo "Failed to update course.";
        }
    } else {
        echo "All fields are required.";
    }
}
