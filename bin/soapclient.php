<?php
array_shift($argv);
$wsdl = array_shift($argv);
$method = array_shift($argv);
$input = file_get_contents('php://stdin');
$arguments = array();
if (!empty($input)) {
  $arguments = json_decode($input, TRUE);
}
$client = new SoapClient($wsdl, array('encoding' => 'UTF-8'));

try {
  $result = call_user_func(array($client, $method), $arguments);
} catch (Exception $e) {
  $result = array(
    'error' => $e,
  );
}
print json_encode($result);
