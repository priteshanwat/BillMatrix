<?php
$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";
$q="INSERT INTO product values('$_POST[pname]','$_POST[pprice]','$_POST[mdate]','$_POST[edate]')";
$result=pg_query($conn,$q);
echo "save";


pg_close($conn);

?>
