<?php
session_start();
include("admin_header.php"); 
include("connect.php");

?>


<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h1>VIEW ORDER DETAIL</h1>
         </div> 
    </div> 
    <div class="row mt-5">
          
         <div class="col-md-12">
            <?php
                $cartid = $_REQUEST["cid"];
                $tot=0;
                $res3=mysqli_query($con,"select * from cart_detail where cart_id='$cartid'");
                if(mysqli_num_rows($res3)>0)
                {
                    echo"<table class='table table-bordered'>
                           <tr>
                                <th> PRODUCT IMAGE</th>
                                <th> PRODUCT NAME</th>
                                <th> QUANTITY</th>
                                <th> PRICE</th>
                                <th> AMOUNT</th>
                                
                            </tr>";
                        while($r3=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                           
                            $res4=mysqli_query($con,"select * from product_detail where product_id='$r3[1]'");
                            $r4=mysqli_fetch_array($res4);
                            echo "<td><img src='$r4[5]' style='width:150px; height:150px;'></td>";
                            echo "<td>$r4[1]</td>";
                            echo "<td>$r3[2]</td>";
                            
                            echo "<td>&#8377; $r3[3] /- </td>";
                            $amt = $r3[2] * $r3[3];
                            $tot = $tot + $amt;
                            echo "<td>&#8377; $amt /- </td>";
                            
                            
                            echo "</tr>";
                        }
                    echo "</table>";
                    echo "<h2> Total Amount = &#8377; $tot /- </h2>";
                    
                }
                else
                {
                    echo "<h2>No Product Found In Cart</h2>";
                } 
            ?>
        </div>
    </div> 
</div>



<?php
include("footer.php"); 
?>