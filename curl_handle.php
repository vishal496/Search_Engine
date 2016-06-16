<?php
// Query made by user.
$raw_query = $_POST['query'];

// Encoded query for url.
$encoded_query = rawurlencode($raw_query);

// Url to be hit for the search.
$url = "http://www.faroo.com/api?q=".$encoded_query."&start=1&length=10&l=en&src=web&i=false&f=json&key=Tf9@y14AptkXcnmoTCxyt@UDFCs_";

// Curl request handling.
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$maps_json = curl_exec($ch);
curl_close($ch);

// Converting the JSON response to a PHP array.
$response = json_decode(($maps_json),true);

?>

<!DOCTYPE html>
<html>
<head>
	<title> SEARCH </title>
</head>
<body>
	<?php for($i=0;$i<=9;$i++) { ?> <!--Looping through response array-->
		<h3><a href="<?php echo $response['results'][$i]['url']; ?>"> <?php echo $response['results'][$i]['title'];?> </a></h3>
		<p><?php echo $response['results'][$i]['kwic']; ?></p>
	<?php } ?>	
</body>
</html>