<?php 
                           
$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";

       
   $sql = "SELECT * FROM product WHERE id='".$_POST['id']."'";
   $query = pg_query($conn,$sql);
   while($row = pg_fetch_assoc($query))
   {
         $data = $row;
       
   }
    echo json_encode($data);
 ?>
