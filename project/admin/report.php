<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <title>Admin panel</title>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>Apple Store</h2>
            </div>
           
            
            <div class="user">
                <img src="apple-logo.jpg" alt="">
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="../home.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="product.php">
                    <i class="fas fa-box"></i>
                        <div>Add Product</div>
                    </a>
                </li>
                <li>
                    <a href="sale.php">
                    <i class="fas fa-plus"></i>
                        <div>New Sale</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-filter"></i>
                        <div>Generate Report</div>
                    </a>
                </li>
               
              
                
                <li>
                    <a href="../logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        <div>Logout</div>
                    </a>
                </li>
                
            </ul>
        </div>
        
                
                </div>
                

        
  
               
            </div>
        </div>
    </div>
    <br><br><br><br>
    <center>
    <!--
    <?php
    $conn=pg_connect("host=localhost dbname=test user=root password=root");
			
			// Execute a SELECT query to retrieve data from the customers table
			$sql = "SELECT s.bno,c.cname,c.cno,s.total
			from sales s
			join bill c on s.cid=c.id";
			$result = pg_query($conn, $sql);
			echo "
	<h1>Report</h1><br><hr><br>
	<table border=1 style=width:62% >
		<tr>
			<th >Bill No.</th>
			<th>Customer Name</th>
			<th>Mobile Number</th>

			
			<th>Total</th>
						
		</tr>";
		echo '<style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
      </style>';


			// Display the data in a table format
			
				while ($row = pg_fetch_assoc($result)) {
					echo "<tr><td>" . $row["s.bno"] . "</td><td>" . $row["c.cname"] . "</td><td>" . $row["c.cno"] . "</td><td>" . $row["s.total"] . "</td></tr>";
				}
			
			
			// Close the database connection
			
		
		echo "</table><br><br><hr><br>";
pg_close($conn);
		?>*/-->
		
<?php
echo "<br><br><h1>Report</h1><br><hr><br>";
    $conn=pg_connect("host=localhost dbname=test user=root password=root");

// Query to retrieve the data
$query = 'SELECT s."bno", c."id", c."cname",c."cno",s."total" 
          FROM "sales" s
          JOIN "bill" c ON s."cid" = c."id"';

// Execute the query
$result = pg_query($conn, $query);
if (!$result) {
    echo "Error occurred while executing the query.";
    exit;
}

// Display the results in a tabular format
echo '<style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
      </style>';

echo "<table>";
echo "<tr><th>Sale ID</th><th>Customer ID</th><th>Customer Name</th><th>Phone</th><th>Total</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['bno'] . "</td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['cname'] . "</td>";
    
    echo "<td>" . $row['cno'] . "</td>";
    echo "<td>" . $row['total'] . "</td>";
   
    echo "</tr>";
}

echo "</table>";

echo '<style>
    table {
        width: 60%;
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
// Close the PostgreSQL connection
pg_close($conn);
?>
		
		
		
		
		                            <?php
$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";
$q="select sum(total) as count from sales";
$result=pg_query($conn,$q);
$row=pg_fetch_assoc($result);
$count=$row["count"];
echo "<div class=number>Total Amount : ".$count."</div>";

pg_close($conn);

?>


          </center>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="chart1.js"></script>
    
</body>
</html>



