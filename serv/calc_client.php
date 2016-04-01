<?php
 
require_once ('../lib/nusoap.php');

$root = "http://2daw09.cesnuria.com";

$wsdl=$root."/SOAP/serv/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');
$params = array('a' => $_POST['num1'], 'b'=> $_POST['num2']);

switch($_POST['operation']){
	case 'add':			$result = $client->call('Add', $params);
						break;						
	case 'subtract':		$result = $client->call('Subtract', $params);
						break;
	case 'multiply':	$result = $client->call('Multiply', $params);
						break;
	case 'divide':		$result = $client->call('Divide', $params);
						break;
}

echo '<h2>Resultat</h2><pre>';
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	print_r($result);
}

?>



