<!DOCTYPE html>
<html ng-app="appWebPkiAngular_Module">

<head>
    <title>Authentication</title>

	<?php

	$url = "http://lacuna.local/";
	//$url = "http://localhost/lacuna/RestPkiSamples/PHP/standard/";
	
	$init = curl_init($url);

	curl_setopt($init, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($init, CURLOPT_SSL_VERIFYPEER, 0);
	
	curl_setopt($init, CURLOPT_URL, $url."?getLibsApiPki=lacunalibs&getFormtlsApiPki=lacunaform&getInitJStlsApiPki=lacunainitjs&appDomainAccept=appTest&tokenApp=123456789");
	$response = json_decode(curl_exec($init));
	
	curl_close($init);

	?>

	<link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/bootstrap-theme.css" rel="stylesheet"/>
	<link href="css/site.css" rel="stylesheet"/>
</head>

<body ng-controller="appWePkiAngular_Controller">

<div class="container">

	<h1>{{name}}</h1>
	<p>{{content}}</p>

    <h2>Authentication</h2>

	<div id="logPanel"></div>

</div>

</body>
</html>
