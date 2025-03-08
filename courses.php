<?php
include 'includes/db.php';

$result = $conn->query("SELECT * FROM courses ORDER BY created_at DESC");
while ($course = $result->fetch_assoc()) {
    include 'templates/course-card.php';
}
?>
