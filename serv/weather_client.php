<?php
 
require_once ('../lib/nusoap.php');

$wsdl="http://www.webservicex.net/globalweather.asmx?wsdl";
$client = new nusoap_client($wsdl,'wsdl');


$params = array('CountryName'=> $_POST['country']);

$xmlstr = $client->call('GetCitiesByCountry', $params);
$xmlstr = implode(" ", $xmlstr);
$result = new SimpleXMLElement($xmlstr);


echo '<h2>Resultat</h2><pre>';
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	//print_r($result);
	//print_r($result[0][1][0]);
	/*for($i=0;$i<$result.length){

	}*/
	echo "<table border=1><tr><td><b>Cities from ".(string) $result->Table[0]->Country."</b></td></tr>";
	foreach ($result->Table as $table) {
		$output = (string) $table->City;
		//$output = $table->City;
	   	echo "<tr><td>".$output."</td></tr>";
	}
	echo "</table>";
}

?>