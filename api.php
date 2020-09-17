<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type:application/json");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-gateway-admin.trulioo.com/embedids/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
// add your public key
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n\t\"publicKey\": \"ADD_YOUR_EMBEDID_PUBLIC_KEY_HERE\"\n}");
// WARNING: THIS IS FOR DEMO PURPOSES ONLY, PLEASE CONFIGURE YOUR SSL CERTIFICATE ACCORDINGLY
// https://stackoverflow.com/questions/21187946/curl-error-60-ssl-certificate-issue-self-signed-certificate-in-certificate-cha
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$headers = array();
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Content-Type: application/json';
// add your API key
$headers[] = 'X-Trulioo-Api-Key: {ADD_YOUR_EMBEDID_API_KEY_HERE}';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
echo $result;
if (curl_errno($ch)) {
	echo 'Error:' . curl_error($ch);
}
curl_close($ch);
