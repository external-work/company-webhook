<?php 

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->Company;
  
  switch ($text) {
    case 'Microsoft':
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : c  c#  python,";
      $text = $text."\nNearest workplace : Bangalore, whitefield";
      break;
    
    case 'Facebook':
     $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : php python  java  javascript,";
      $text = $text."\nNearest workplace : 1 Hacker Way 94025 Menlo Park, California";
      break;

    case 'Mistral Solutions':
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : c  java  python,";
      $text = $text."\nNearest workplace : Bangalore, Domlur";
      break;

    case 'Mistral':
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : c  java  python,";
      $text = $text."\nNearest workplace : Bangalore, Domlur";
      break;

    case 'Google':
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : python javascript,";
      $text = $text."\nNearest workplace : Mumbai";
      break;

    case 'tcs':
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : c  c++  python,";
      $text = $text."\nNearest workplace : Bangalore, whitefield";
      break;

    case 'mindtree':
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : c  c#  python,";
      $text = $text."\nNearest workplace : Bangalore, whitefield";
      break;

    case 'mercedes benz':
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : python java,";
      $text = $text."\nNearest workplace : Bangalore, whitefield";
      break;

    case 'mercedes':
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : python java,";
      $text = $text."\nNearest workplace : Bangalore, whitefield";
      break;

    default:
      $text = "These are information pertaining ".$text." in my database,";
      $text = $text."\nprogramming languages used are : c  c++  python,";
      $text = $text."\nNearest workplace : Delhi, IT road 435";
      break;
  }

	
  $response = new \stdClass();
  $temp = new \stdClass();
  $response->fulfillmentMessages = array();
  $temp->text->text = array( $text );
  $response->fulfillmentMessages[0] = $temp;
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>