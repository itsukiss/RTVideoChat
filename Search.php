<html>
<head>
<title>Bing</title>
<meta charset="utf-8">
</head>
<body>
<?php
if($_GET['word']){
$query = $_GET['word'];
// echo $query;
//$query = 'ご飯';


$accountKey = '5hj8WLaVWT33WCk04XwcZ0UFI8GLZLGuFXntSZUWwuA';
$ServiceRootURL = 'https://api.datamarket.azure.com/Bing/Search/v1/';

$context = stream_context_create( array(
	'http'=>array(
		'request_fulluri'=>TRUE,
		'header'=>'Authorization: Basic '.base64_encode( $accountKey.':'.$accountKey)
	)));

$request = $ServiceRootURL.'Web?$format=json&Query='.urlencode( '\''.$query.'\'' );
$response = file_get_contents( $request, FALSE, $context);
$response = mb_convert_encoding($response,'UTF8','ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

$arr = json_decode($response,true);
$url = $arr["d"]["results"][0]["Url"];
//header( 'Content-Type: application/json' );
//echo $response;
$html = file_get_contents($url);
echo $html;
}
?>
</body>
</html>


