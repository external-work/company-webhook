<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST")
{
	$request_body = file_get_contents("php://input");
	$json = json_decode($request_body);

	$company_name = $json->queryResult->parameters->Company;

	$speech = "The company ".$company_name." contains these information."

	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "I did'nt quite get that!";
}

?>