<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!file_exists('img')) {
        mkdir('img');
    }
    $file_count = count($_FILES['myFile']['name']);
    for ($i = 0; $i < $file_count; $i++) {
        $fileName = $_FILES['myFile']['name'][$i];
        $fileType = $_FILES['myFile']['type'][$i];
        $fileLoc = $_FILES['myFile']['tmp_name'][$i];
        $fileError = $_FILES['myFile']['error'][$i];
        $fileSize= $_FILES['myFile']['size'][$i];

        if ($fileError === 0) {
            if (move_uploaded_file($fileLoc, 'img/' . $fileName)) {
                echo "File[$i] Uploaded<br>";
                $uploadedFileName[]=$fileName;
            }
        } else {
            echo 'Error encountered';
        }
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiple File</title>
</head>
<body>

<br>

<form method="post" enctype="multipart/form-data">
    <input multiple type="file" name="myFile[]">
    <br>
    <br>
    <button type="submit">Upload</button>
    <a href="gallery.php">Gallery</a>
</form>
<?php {
    $handle=fopen("gallery.txt","a");
    foreach ($uploadedFileName as $uploadedFile){
        echo '<img src="img/' . $uploadedFile . '" width="600"/>';
        fwrite($handle,$uploadedFile);
        fwrite($handle,"\n");
    }
    fclose($handle);
    }
?>

</body>
</html>