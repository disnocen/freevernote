<?

date_default_timezone_set('Europe/Rome');
$file_path_str = date('Ymd_Hi') . '.md';
$txt=$_POST["note"];
//$txt="ciao a tutti";
echo "this is the content of the note:";
echo $txt;

$fh_res = fopen($file_path_str, 'w');
echo "fopen\n";
fwrite($fh_res,$txt);
echo "fwrite\n";
fclose($fh_res);
$fh_res = fopen($file_path_str, 'r');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://owncloud.fadibarbara.it/remote.php/webdav/journal/' . basename($file_path_str));
echo "set url\n";
curl_setopt($ch, CURLOPT_USERPWD, "fadi:ciaogrande");
curl_setopt($ch, CURLOPT_PUT, 1);
echo "set passwd e put\n";
curl_setopt($ch, CURLOPT_INFILE, $fh_res);
curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path_str));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30 );
curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE); // --data-binary
echo "rest opt";
$curl_response_res = curl_exec($ch);
echo "curl exec\n";
curl_close ($ch);
echo "curl close\n";
echo $curl_response_res;
echo curl_error($ch);
print curl_error($ch);
fclose($fh_res);

exit();
echo "no output in teoria";
?>
