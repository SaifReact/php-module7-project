<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = $_FILES['file'];

    // Validate the upload
    if ($file['size'] > 5000000) {  // 5MB max
        echo "<p class='alert alert-danger'>File size must be under 5MB.</p>";
    } else {
        $targetDir = "assets/images/";
        $targetFile = $targetDir . basename($file['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an image
        if (getimagesize($file['tmp_name'])) {
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                // Insert image info into the database
                $stmt = $pdo->prepare("INSERT INTO images (title, description, filename) VALUES (?, ?, ?)");
                $stmt->execute([$title, $description, basename($file['name'])]);

                echo "<p class='alert alert-success'>Image uploaded successfully!</p>";
            } else {
                echo "<p class='alert alert-danger'>Error uploading the image.</p>";
            }
        } else {
            echo "<p class='alert alert-danger'>Only image files are allowed.</p>";
        }
    }
}
?>

<?php include('includes/header.php'); ?>

<h2>Upload Image</h2>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="file">Upload Image</label>
        <input type="file" class="form-control" id="file" name="file" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>

<?php include('includes/footer.php'); ?>
