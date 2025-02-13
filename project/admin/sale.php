<html>
<head>
 <style>
       
        body{
        background-color:#3ded97;
        }
      </style></head>
      <body>



<center><h4>Customer Details</h4><br><br>
                <form action=bill.php method=post>
                <b>Name</b> <input type=text name=cname id="srname"><br><br>
                <b>Email </b><input type=text name=cemail><br><br>
                <b>Mobile Number</b> <input type=text name=cno><br><br>
                 <b>Address </b><input type=text name=cadd><br><br>
                 
                
                 
                 
                 <input type=submit value="Add New Customer" onClick="sp()"><br><br>

                                  </form>
                                  <form action=bill.php>
                                  <a href=bill.php><button>Already customer</button></a>
                                  </form>
                                  <br><a href=../home.php><button>Back</button></a>
                                  </center>
                                  
                                  
<script>
function sp()
{
alert("Customer Added Successfully");
}
</script>
</body>
</html>
