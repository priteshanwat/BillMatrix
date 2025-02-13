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
                    <a href="report.php">
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
                <br><br><br><br><br>
<center><h1> Add New Product</h1>
<form  method=post>
<br><br><br>
Product Name  <input type=text name=pname>
<br><br><br>
Product Price  <input type=text name=pprice>
<br><br><br>

Launched Date  <input type=date name=edate>
<br><br><br>
Description <textarea id="description" name="description"></textarea><br><br><br>
<input type=submit name=submit>
</form>
</center>

<?php
$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";
$q="INSERT INTO product (pname,pprice) values('$_POST[pname]','$_POST[pprice]')";
$result=pg_query($conn,$q);
if($result)
echo "<center><br><br><br><br>Product Is Added</center>";

pg_close($conn);

?>

<!--                
            <div class="charts">
                <div class="chart">
                    <h2>Earnings (past 12 months)</h2>
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div> -->
               
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="chart1.js"></script>
    
</body>
</html>
