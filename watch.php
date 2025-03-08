<?php
include 'includes/db.php';

$course_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->bind_param("i", $course_id);
$stmt->execute();
$course = $stmt->get_result()->fetch_assoc();
?>

<div class="container">
    <h1><?= $course['title'] ?></h1>
    <video controls width="100%">
        <source src="uploads/videos/<?= $course['video_url'] ?>" type="video/mp4">
    </video>
    <p><?= $course['description'] ?></p>
    <a href="download.php?id=<?= $course['id'] ?>" class="btn btn-secondary">Download PDF</a>
</div>
