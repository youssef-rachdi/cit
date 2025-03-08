<div class="col-md-4">
    <div class="card mb-4">
        <img src="assets/images/course-thumbnails/<?= $course['id'] ?>.jpg" class="card-img-top" alt="Course Thumbnail">
        <div class="card-body">
            <h5 class="card-title"><?= $course['title'] ?></h5>
            <p class="card-text"><?= $course['description'] ?></p>
            <a href="watch.php?id=<?= $course['id'] ?>" class="btn btn-primary">Watch Video</a>
            <a href="download.php?id=<?= $course['id'] ?>" class="btn btn-secondary">Download PDF</a>
        </div>
    </div>
</div>