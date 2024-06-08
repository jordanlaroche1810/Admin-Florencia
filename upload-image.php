<?php
include 'config.php';
include 'inc/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $sql = "INSERT INTO images (filename, uploaded_at) VALUES (?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([basename($_FILES["image"]["name"])]);

        echo '<div class="alert alert-success" role="alert">The file '. basename($_FILES["image"]["name"]). ' has been uploaded.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">File is not an image.</div>';
    }
}
?>
    <h2 class="text-center">Upload Image</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Select image to upload</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
<?php include 'inc/footer.php'; ?>
