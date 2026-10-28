<?php
session_start();
include("supplier_header.php"); 
include("connect.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h1>VIEW NEW ORDERS</h1>
        </div> 
    </div> 

    <div class="row mt-5">
        <div class="col-md-12">
            <?php
            $suppid = $_SESSION["suppid"];

            // ✅ Main Query
            $res3 = mysqli_query($con,"SELECT * FROM order_detail 
            WHERE cart_id IN (
                SELECT cart_id FROM cart_detail 
                WHERE product_id IN (
                    SELECT product_id FROM product_detail WHERE supplier_id='$suppid'
                )
            ) 
            AND order_id NOT IN (SELECT order_id FROM bill_detail)");

            // ✅ Error Handling
            if(!$res3){
                die("<h3 style='color:red;'>Query Error: ".mysqli_error($con)."</h3>");
            }

            // ✅ Check Records
            if(mysqli_num_rows($res3) > 0)
            {
                echo "<table class='table table-bordered table-striped'>
                        <tr>
                            <th>ORDER ID</th>
                            <th>ORDER DATE</th>
                            <th>CART ID</th>
                            <th>DELIVERY ADDRESS</th>
                            <th>MOBILE NO</th>
                            <th>AMOUNT</th>
                            <th>ACTION</th>
                        </tr>";

                while($r3 = mysqli_fetch_array($res3))
                {
                    echo "<tr>";
                    echo "<td>".$r3[0]."</td>";
                    echo "<td>".$r3[1]."</td>";
                    echo "<td>".$r3[2]."</td>";
                    echo "<td>".$r3[4]."</td>";
                    echo "<td>".$r3[5]."</td>";
                    echo "<td>&#8377; ".$r3[6]." /-</td>";
                    echo "<td>
                            <a href='supplier_view_order_detail.php?cid=".$r3[2]."' 
                               class='btn btn-sm btn-primary'>
                               View Detail
                            </a>
                          </td>";
                    echo "</tr>";
                }

                echo "</table>";
            }
            else
            {
                echo "<h3 class='text-center text-danger'>No New Orders Found</h3>";
            }
            ?>
        </div>
    </div> 
</div>

<?php
include("footer.php"); 
?>