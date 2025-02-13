         <?php 

         $conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";
$sql1="select max(bno) as lar from sales;";
$query = pg_query($conn,$sql1);
$row=pg_fetch_assoc($query);
$large=$row['lar'];
$sql = "SELECT * FROM sales where bno=$large";
			$result = pg_query($conn, $sql);
			echo "<center>
	<h1>Apple Store</h1></center><br><hr><br>";
	
	
	echo "<table border=1 style=width:82% height=40% >
		<tr>
			
			<th style=font-size:30px;>Product Name</th>
			<th>Quantity</th>
<th>Price</th>
			<th>Total</th>
						
		</tr>";

			// Display the data in a table format
			if (pg_num_rows($result) > 0) {
				while ($row = pg_fetch_assoc($result)) {
					echo "<tr><td style=font-size:25px;text-align:center;>" . $row["pname"] . "</td><td style=font-size:25px;text-align:center>" . $row["qty"] . "</td><td style=font-size:25px;text-align:center>" . $row["pprice"] . "</td><td style=font-size:25px;text-align:center>" . $row["total"] . "</td></tr>";
					
				}
			} else {
				echo "<tr><td colspan='4'>No results found.</td></tr>";
			}



$sqlsr = "SELECT cid FROM sales where bno=$large";
			$resultsr = pg_query($conn, $sqlsr);
			$row=pg_fetch_assoc($resultsr);
			$sp= $row['cid'];
			
			
$sql1 = "select * from bill where id =$sp";

$result1 = pg_query($conn, $sql1);

$row = pg_fetch_assoc($result1);

echo "Bill Number : ".$large."<br>";
echo "Customer id : ".$row['id']."<br>";
echo "Customer Name : ".$row['cname']."<br>";
echo "Customer Email : ".$row['cemail']."<br>";

echo "Customer Mobile No. : ".$row['cno']."<br>";
echo "Customer Address : ".$row['cadd']."<br>";

echo "</table>";
$qp="select sum(total) as count from sales where bno=$large";
$result12=pg_query($conn,$qp);
$row=pg_fetch_assoc($result12);
$count=$row["count"];
echo "<br><br><hr><br><center><h3>Total Amount : <div class=number>".$count."</div></h3></center>";



echo "<br><a href=../home.php><button>Back</button></a>";

echo '<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }
    
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    tr:hover {
        background-color: #f5f5f5;
    }
    
    .total-row {
        font-weight: bold;
    }
</style>';


  pg_close($conn);                              

 ?>
