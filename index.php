<?php
include('includes/config.php');

// Fetch all images from the database
$query = "SELECT * FROM images ORDER BY upload_date DESC";
$stmt = $pdo->query($query);
$images = $stmt->fetchAll();
?>

<?php include('includes/header.php'); ?>

<h2>All Uploaded Images</h2>

<div class="row">
    <?php foreach ($images as $image): ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="assets/images/<?php echo $image['filename']; ?>" class="card-img-top" alt="<?php echo $image['title']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $image['title']; ?></h5>
                    <p class="card-text"><?php echo $image['description']; ?></p>
                    <p class="card-text"><small class="text-muted">Uploaded on <?php echo $image['upload_date']; ?></small></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include('includes/footer.php'); ?>
