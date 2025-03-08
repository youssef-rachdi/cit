<?php
session_start();
include '../includes/db.php';

// Ensure only admin can access this page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$course_id = $_GET['id'] ?? null;
if ($course_id) {
    $stmt = $conn->prepare("DELETE FROM courses WHERE id = :id");
    $stmt->bindValue(':id', $course_id);
    $stmt->execute();
}

header("Location: manage_courses.php?success=Course deleted");
exit;
