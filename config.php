<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_DB','la');

define('DB_ENCODER','utf8');

$GLOBALS['mysqli'] = null;



function connect_db()
{
$GLOBALS['mysqli'] = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DB);
$GLOBALS['mysqli'] ->query('SET NAMES "'.DB_ENCODER.'"');

return $GLOBALS['mysqli'];
}

function db()
{
	return $GLOBALS['mysqli'];

}

?>