
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Document</title>
      <style>
        .result{
         color:red;
        }
        td
        {
          text-align:center;
        }
        body{
        background-color:#3ded97;
        }
      </style>
   </head>
   <body><a href="../home.php"><button>
                        Back</button>
                    </a>
   <center>
   <h1>Create Invoice</h1>
  </center>    <section class="mt-3">
         <div class="container-fluid">
       
         <div class="row">
            <div class="col-md-5  mt-4 ">
               <table class="table" style="background-color:#3ded97;">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th style="width: 31%">Qty</th>
                        <th>Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td scope="row">1</td>
                        <td style="width:60%">
                           <select name="vegitable" id="vegitable"  class="form-control">
                              <?php 
                            
$conn=pg_connect("host=localhost dbname=test user=root password=root");
if(!$conn)
echo "Connection fail";

                                 $sql = "SELECT * FROM product";
                                 $query = pg_query($conn,$sql);
                                 while($row = pg_fetch_assoc($query)){
                                 ?>
                              <option id="<?php echo $row['id']; ?>" value="<?php echo $row['pname']; ?>" class="vegitable custom-select">
                                 <?php echo $row['pname']; ?>
                              </option>
                              <?php  }?>   
                           </select>
                        </td>
                        <td style="width:1%">
                          <input type="number" id="qty" min="0" value="0" class="form-control">
                        </td>
                        <td>
                           <p id="price"></p>
                       
                        </td>
                        <td><button id="add" class="btn btn-primary"">Add</button></td>
                     </tr>
                  </tbody>
               </table><br><br>
               
                                  
 

               <div role="alert" id="errorMsg" class="mt-5" >
                 <!-- Error msg  -->
              </div>
            </div>
            <div class="col-md-7  mt-4" style="background-color:#e6e6fa;">
               <div class="p-4">
                  <div class="text-center">
                     <h4>Receipt</h4>
                  </div>

                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> : <span id="year"></span>
                     </div>
                    
                  </div>
                  <div class="row">
                     </span>
                     <table id="receipt_bill" class="table">
                        <thead>
                           <tr>
                              <th> No.</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                           </tr>
                        </thead>
                        <tbody id="new" >
                          
                        </tbody>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark" >
                                <h5><strong>Sub Total:  ₹ </strong></h5>
                                <p><strong>Tax (5%) : ₹ </strong></p>
                           </td>
                           <td class="text-center text-dark" >
                              <h5> <strong><span id="subTotal"></strong></h5>
                              <h5> <strong><span id="taxAmount"></strong></h5>
                           </td>
                        </tr>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark">
                              <h5><strong>Gross Total: ₹ </strong></h5>
                           </td>
                           <td class="text-center text-darkr">
                              <h5 id="totalPayment"><strong> </strong></h5>
                               
                           </td>
                        </tr>
                     </table>
                     
                  </div>
               </div>
            </div>
         </div>
         
      </section>
   
<script>

   $(document).ready(function(){
     $('#vegitable').change(function() {
      var id = $(this).find(':selected')[0].id;
       $.ajax({
          method:'POST',
          url:'fetch.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
            {
               $('#price').text(data.pprice);
 
               //$('#id').text(data.id);
            }
       });
     });
     //add to cart 
     var count = 1;
     $('#add').on('click',function(){
    
        var name = $('#vegitable').val();
        var qty = $('#qty').val();
        var price = $('#price').text();
 
        if(qty == 0)
        {
           var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
           $('#errorMsg').html(erroMsg).fadeOut(9000);
        }
        else
        {
           billFunction(); // Below Function passing here 
        }
         
        function billFunction(cname)
          {
          var total = 0;
       
          $("#receipt_bill").each(function () {
          var total =  price*qty;
          var subTotal = 0;
          subTotal += parseInt(total);
          
          var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+total+'">' +total+ '</strong></td></tr>';
          $('#new').append(table)
          var textfield=document.getElementById("srname");
   var cname=textfield.value;
   alert(cname);
          var data={
          count:count,
          name:name,
          qty:qty,
          price:price,
          totalPayment:totalPayment,
          cname:cname};
          console.log(data);
$.ajax({
    url: 'sr.php',
    method: 'POST',
    data: data,
    success: function(response) {
        console.log(response);
    },
    error: function(xhr, status, error) {
        console.error(error);
    }
});
 
           // Code for Sub Total of Vegitables 
            var total = 0;
            $('tbody tr td:last-child').each(function() {
                var value = parseInt($('#total', this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
             $('#subTotal').text(total);
               
            // Code for calculate tax of Subtoal 5% Tax Applied
              var Tax = (total * 5) / 100;
              $('#taxAmount').text(Tax.toFixed(2));
 
             // Code for Total Payment Amount
 
             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();
 
             var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
             $('#totalPayment').text(totalPayment.toFixed(2)); // Showing using ID 
             document.getElementById("tot").value=totalPayment;
          
        
         });
         count++;
        } 
       });
           // Code for year 
             
           var currentdate = new Date(); 
             var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear();
                $('#year').text(datetime);
 
           // Code for extract Weekday     
                function myFunction()
                 {
                    var d = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Sunday";
                    weekday[1] = "Monday";
                    weekday[2] = "Tuesday";
                    weekday[3] = "Wednesday";
                    weekday[4] = "Thursday";
                    weekday[5] = "Friday";
                    weekday[6] = "Saturday";
 
                    var day = weekday[d.getDay()];
                    return day;
                    }
                var day = myFunction();
                $('#day').text(day);
     });
     
   
</script>
 

</body>
</html>
