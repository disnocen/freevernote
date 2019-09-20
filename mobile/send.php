<?php

date_default_timezone_set('Europe/Rome');
$file_path_str = date('Ymd_Hi') . '.md';
$txt=$_POST["note"]; //text of the note it will write on file
$fh_res = fopen($file_path_str, 'w');
fwrite($fh_res,$txt);
fclose($fh_res);
$fh_res = fopen($file_path_str, 'r');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://owncloud.fadibarbara.it/remote.php/webdav/journal/' . basename($file_path_str));
curl_setopt($ch, CURLOPT_USERPWD, "user:pass");
curl_setopt($ch, CURLOPT_PUT, 1);
curl_setopt($ch, CURLOPT_INFILE, $fh_res);
curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path_str));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30 );
curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE); // --data-binary
$curl_response_res = curl_exec($ch);
curl_close ($ch);
fclose($fh_res);
unlink($fh_res);

exit();
?>
