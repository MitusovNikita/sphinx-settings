<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require ( "sphinxapi.php" );

$sphinx_server = '127.0.0.1';
$sphinx_port = 9312;
$sphinx_index_name = 'test1';

$sphinx = new SphinxClient;
$sphinx->SetServer($sphinx_server, $sphinx_port);
$sphinx->SetMatchMode(SPH_MATCH_EXTENDED);
$sphinx->SetArrayResult(true);

$sphinx->SetFilter('group_id2', array(5));

$result = $sphinx->Query('', $sphinx_index_name);

echo "<pre>";
print_r($result);
echo "</pre>";

echo $sphinx->getLastWarning();
echo $sphinx->getLastError();