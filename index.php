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

	$response = {
  "responseId": "96620af9-b7e0-441a-8318-82d41afa513e-32138632",
  "queryResult": {
    "queryText": "can you tell me something about Mistral Solutions",
    "parameters": {
      "Company": "Mistral Solutions"
    },
    "allRequiredParamsPresent": true,
    "fulfillmentText": "Hey Company name i recieved",
    "fulfillmentMessages": [
      {
        "platform": "ACTIONS_ON_GOOGLE",
        "simpleResponses": {
          "simpleResponses": [
            {
              "textToSpeech": "Hey Company name i recieved"
            }
          ]
        }
      },
      {
        "text": {
          "text": [
            "Hey Company name i recieved"
          ]
        }
      }
    ],
    "webhookSource": "webhook",
    "intent": {
      "name": "projects/company-f811e/agent/intents/90be1d8d-492d-4087-b8cb-624f5bd8c9bf",
      "displayName": "Company"
    },
    "intentDetectionConfidence": 0.5742474,
    "diagnosticInfo": {
      "webhook_latency_ms": 299
    },
    "languageCode": "en"
  },
  "webhookStatus": {
    "message": "Webhook execution successful"
  }
}
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>