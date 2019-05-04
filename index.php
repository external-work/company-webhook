<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->Company;

	// switch ($text) {
	// 	case 'hi':
	// 		$speech = "Hi, Nice to meet you";
	// 		break;

	// 	case 'bye':
	// 		$speech = "Bye, good night";
	// 		break;

	// 	case 'anything':
	// 		$speech = "Yes, you can type anything here.";
	// 		break;
		
	// 	default:
	// 		$speech = "Sorry, I didnt get that. Please ask me something else.";
	// 		break;
	// }

	$response = new \stdClass();
	// $response->queryResult->fulfillmentText = "Hey! Sam, response from webhook";
	$response->responseId = $json->responseId;
	$response->queryResult = $json->queryResult;
	$response->webhookStatus->message = "Webhook execution successful";
	// $response->queryResult->fulfillmentText = "Hey! Sam, response from webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>