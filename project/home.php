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
                <img src="apple-logo.jpg" alt="not">
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="home.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="admin/product.php">
                    <i class="fas fa-box"></i>
                        <div>Add Product</div>
                    </a>
                </li>
                <li>
                    <a href="admin/sale.php">
                    <i class="fas fa-plus"></i>
                        <div>New Sale</div>
                    </a>
                </li>
                <li>
                    <a href="admin/report.php">
                    <i class="fa fa-filter"></i>
                        <div>Generate Report</div>
                    </a>
                </li>
               
               
                <li>
                    <a href="logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        <div>Logout</div>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="main">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
<?php
$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";
$q="select count(*) as count from bill";
$result=pg_query($conn,$q);
$row=pg_fetch_assoc($result);
$count=$row["count"];
echo "<div class=number>".$count."</div>";

pg_close($conn);

?>
                        
                        <div class="card-name">Invoices</div>
                    </div>
                    <div class="icon-box">
                    <i class="fas fa-file-invoice"></i>
                      
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                    <?php
$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";
$q="select count(*) as count from product";
$result=pg_query($conn,$q);
$row=pg_fetch_assoc($result);
$count=$row["count"];
echo "<div class=number>".$count."</div>";

pg_close($conn);

?>
                        
                        <div class="card-name">Product</div>
                    </div>
                    <div class="icon-box">
                    <i class="fas fa-box"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                               <?php
$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";
$q="select sum(total) as count from sales";
$result=pg_query($conn,$q);
$row=pg_fetch_assoc($result);
$count=$row["count"];
echo "<div class=number>".$count."</div>";

pg_close($conn);

?>
                        
                        <div class="card-name">Earnings</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-rupee-sign"></i>
</div>

                
                </div>
              
            
               
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="chart1.js"></script>
    
</body>
</html>
