<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <title>Admin panel</title>
    <style>
        #mydiv{
                        padding-left:320px;
        }
        #div2{
                        padding-left:1120px;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>Billing Software</h2>
            </div>
           
            
            <div class="user">
                <img src="logo.png" alt="">
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
                    <a href="#">
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
                    <a href="setting.php">
                        <i class="fas fa-cog"></i>
                        <div>Settings</div>
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
                <center>
    <br><br><br><br>
    <br>
    <h3>Invoice is created</h3><br><br>
</center>
               
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="chart1.js"></script>
    
</body>
</html>
  <?php

$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";
$q="INSERT INTO customer (cname,cemail,cadd,cno) values('$_POST[cname]','$_POST[cemail]','$_POST[cadd]','$_POST[cno]')";
$result=pg_query($conn,$q);
if($result)
echo "<center><br><br><br><br>Customer Is Added</center>";
pg_close($conn);

?>

