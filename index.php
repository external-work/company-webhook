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
	// $response->queryResult = $json->queryResult;
	$response->queryResult = json_encode({
    "queryText": "can you tell me something about Mistral Solutions",
    "parameters": {
      "Company": "Mistral Solutions"
    },
    "allRequiredParamsPresent": true,
    "fulfillmentText": "Hey! Sam, response from webhook",
    "fulfillmentMessages": [
      {
        "platform": "ACTIONS_ON_GOOGLE",
        "simpleResponses": {
          "simpleResponses": [
            {
              "textToSpeech": "wait a bit, ill check to see if i have something in my database!"
            }
          ]
        }
      },
      {
        "text": {
          "text": [
            "wait a bit, ill check to see if i have something in my database!"
          ]
        }
      }
    ],
    "intent": {
      "name": "projects/company-f811e/agent/intents/90be1d8d-492d-4087-b8cb-624f5bd8c9bf",
      "displayName": "Company"
    },
    "intentDetectionConfidence": 0.5830773,
    "diagnosticInfo": {
      "webhook_latency_ms": 302
    },
    "languageCode": "en"
  });
	$response->webhookStatus->message = "Samarth is great";
	// $response->queryResult->fulfillmentText = "Hey! Sam, response from webhook";
	// $response["queryResult"]["fulfillmentText"] = "Hey! Sam, response from webhook";
	// $response["queryResult"]["fulfillmentMessages"] = "Hey! Sam, response from webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>