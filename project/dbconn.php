<?php
echo "progam start";
$db=pg_connect("host=localhost dbname=test user=root password=root");
if(!$db)
echo "Connection fail";
else
echo "Connection Success";

?>



