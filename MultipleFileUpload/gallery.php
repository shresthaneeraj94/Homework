<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Gallery</title>
</head>
<body>
<?php
$images = file("gallery.txt");

?>
<form method="post">
    <?php
    foreach ($images as $image) {
        echo "<img src='img/$image' width='400px'>";
        echo "<input type=\"checkbox\" name=\"download[]\" value=\"$image\">download";

    }
    ?>
    <input type='submit' value='Start Download'>
</form>


</body>
</html>

<?php
$error = "";
if($_SERVER['REQUEST_METHOD']=='POST') {
    $download = $_POST['download'];
    $file_folder = "img/";
    $zipname = 'file.zip';
    $zip = new ZipArchive;
    if ($zip->open($zipname, ZIPARCHIVE::CREATE) !== TRUE) {
        // Opening zip file to load files
        $error .= "* Sorry ZIP creation failed at this time";
    }
    foreach ($download as $file) {
        $zip->addFile($file_folder . trim($file));
    }
    $zip->close();
    echo filesize($zipname);
    echo $error;


//
//    header('Content-Type: application/zip');
//    header('Content-disposition: attachment; filename='.$zipname);
//    header('Content-Length: ' . filesize($zipname));
//    readfile($zipname);
//if(file_exists($zipname)) {
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zipname) . '"');
//    header("Content-length: " . filesize($zipname));
//    header("Pragma: no-cache");
//    header("Expires: 0");
//    ob_clean();
//    flush();
    readfile($zipname);
    unlink($zipname);
    exit;
}

