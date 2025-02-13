         <?php 
         $myText =$_POST['cname'];
         $conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";

         $count=$_POST['count'];
         
         $name=$_POST['name'];
         
         $qty=$_POST['qty'];
         
         $price=$_POST['price'];
         
         
$sql1="select id from bill where cname='$myText';";
$query = pg_query($conn,$sql1);
$row1=pg_fetch_assoc($query);
$ccid=$row1['id'];

    $sql1="select max(bno) as lar from sales;";
$query = pg_query($conn,$sql1);
$row=pg_fetch_assoc($query);
$cid=$row['lar'];

if($count==1)
$cid=$cid+1;
$tot=$qty*$price;
$sql = "insert into sales(bno,cid,pname,qty,pprice,total)  values ('$cid','$ccid','$name','$qty','$price','$tot');";
$query2 = pg_query($conn,$sql);
                                
 ?>
