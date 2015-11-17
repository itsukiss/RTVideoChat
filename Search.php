<html>
<head>
<title>Bing</title>
<meta charset="utf-8">
</head>
<body>
<?php 
$query = $_GET['word'];
echo $query;
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

//header( 'Content-Type: application/json' );
echo $response;

?>
</body>
</html>


