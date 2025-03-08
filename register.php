<?php
session_start();
include 'includes/db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $role = $_POST['role'] ?? 'student'; // Default role is 'student'

    if ($username && $email && $password && $role) {
        // Check if email already exists
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $checkStmt->bindValue(':email', $email);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo "Email already registered.";
        } else {
            // Hash the password
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // Insert user into the database
            $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (:username, :email, :password_hash, :role)");
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password_hash', $passwordHash);
            $stmt->bindValue(':role', $role);

            if ($stmt->execute()) {
                echo "Registration successful!";
                header("Location: login.php?success=registered");
                exit;
            } else {
                echo "Error: Could not register user.";
            }
        }
    } else {
        echo "All fields are required.";
    }
}
?>
