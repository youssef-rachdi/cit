<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">LearnPlatform</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- If user is logged in, show username and logout -->
                    <li class="nav-item">
                        <span class="nav-link text-warning">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger btn-sm text-white" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <!-- If not logged in, show login/register buttons -->
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></li>
                <?php endif; ?>
            </ul>   
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to LearnPlatform</h1>
            <p>Access video courses and downloadable PDFs</p>
        </div>
    </header>

    <!-- Courses Section -->
    <section id="courses" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Available Courses</h2>
            <div class="row">
                <!-- Course Card Example -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://www.softwaretestinghelp.com/wp-content/qa/uploads/2020/01/Free-Online-Courses.png" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">Course Title</h5>
                            <p class="card-text">Brief course description.</p>
                            <a href="watch.php?id=1" class="btn btn-primary">Watch Video</a>
                            <a href="download.php?id=1" class="btn btn-secondary">Download PDF</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://www.softwaretestinghelp.com/wp-content/qa/uploads/2020/01/Free-Online-Courses.png" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">Course Title</h5>
                            <p class="card-text">Brief course description.</p>
                            <a href="watch.php?id=1" class="btn btn-primary">Watch Video</a>
                            <a href="download.php?id=1" class="btn btn-secondary">Download PDF</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://www.softwaretestinghelp.com/wp-content/qa/uploads/2020/01/Free-Online-Courses.png" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">Course Title</h5>
                            <p class="card-text">Brief course description.</p>
                            <a href="watch.php?id=1" class="btn btn-primary">Watch Video</a>
                            <a href="download.php?id=1" class="btn btn-secondary">Download PDF</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://www.softwaretestinghelp.com/wp-content/qa/uploads/2020/01/Free-Online-Courses.png" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">Course Title</h5>
                            <p class="card-text">Brief course description.</p>
                            <a href="watch.php?id=1" class="btn btn-primary">Watch Video</a>
                            <a href="download.php?id=1" class="btn btn-secondary">Download PDF</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://www.softwaretestinghelp.com/wp-content/qa/uploads/2020/01/Free-Online-Courses.png" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">Course Title</h5>
                            <p class="card-text">Brief course description.</p>
                            <a href="watch.php?id=1" class="btn btn-primary">Watch Video</a>
                            <a href="download.php?id=1" class="btn btn-secondary">Download PDF</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://www.softwaretestinghelp.com/wp-content/qa/uploads/2020/01/Free-Online-Courses.png" class="card-img-top" alt="Course Thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">Course Title</h5>
                            <p class="card-text">Brief course description.</p>
                            <a href="watch.php?id=1" class="btn btn-primary">Watch Video</a>
                            <a href="download.php?id=1" class="btn btn-secondary">Download PDF</a>
                        </div>
                    </div>
                </div>
                <!-- Add more courses similarly -->
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="loginEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="registerEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="registerPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 LearnPlatform. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
