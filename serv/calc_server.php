<?php

require_once ('../lib/nusoap.php');

$root = "http://2daw09.cesnuria.com";

$soap = new soap_server;
$soap->configureWSDL('AddService', $root.'/SOAP/serv');
$soap->wsdl->schemaTargetNamespace = $root.'/SOAP/serv';
$soap->register('Add', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), $root.'/SOAP/serv');
$soap->register('Subtract', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), $root.'/SOAP/serv');
$soap->register('Multiply', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), $root.'/SOAP/serv');
$soap->register('Divide', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), $root.'/SOAP/serv');
$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

function Add($a, $b){
	return $a + $b;
}

function Subtract($a, $b){
	return $a - $b;
}

function Multiply($a, $b){
	return $a * $b;
}

function Divide($a, $b){
	return $a / $b;
}

?>

