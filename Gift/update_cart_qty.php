<?php
session_start();
include("header.php"); 
include("connect.php");


$oqty = $_REQUEST["oqty"];
$pid = $_REQUEST['pid'];
$res1 = mysqli_query($con,"select * from product_detail where product_id='$pid'");
$r1 = mysqli_fetch_array($res1);
$name = $r1[1];
$desc = $r1[2];
$catid = $r1[3];
$price = $r1[4];
$pimg1 = $r1[5];
$sid = $r1[6];

?>
<script>
    function validation()
    {
        var v =/^[0-9]{1,3}$/
        if(form1.txtqty.value=="")
        {
            alert("Please Enter Quantity");
            form1.txtqty.focus();
            return false;
        }
        else if (parseInt(form1.txtqty.value)<=0)
        {
            alert("Please Enter Quantity Greater than 0");
            form1.txtqty.focus();
            return false;
        }
        else if (parseInt(form1.txtqty.value)>=10)
        {
            alert("Please Enter Quantity Less than 10");
            form1.txtqty.focus();
            return false;
        }
        else if (!v.test(form1.txtqty.value))
        {
            alert("Please Enter Only Digit in Quantity");
            form1.txtqty.focus();
            return false;
        }
        
    }
</script>
<?php
if(isset($_POST['btnupdate']))
{
    $qty = $_POST["txtqty"];
    $cartid = $_SESSION["cartid"];
    $query2 = "update cart_detail set qty='$qty' where cart_id='$cartid' and product_id='$pid'";
    if(mysqli_query($con,$query2))
    {
        echo "<script>";
        echo "alert('Product Quantity Updated Into Cart Successfull');";
        echo "window.location.href='view_cart.php';";
        echo "</script>";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h1>UPDATE CART QUANTITY</h1>
         </div> 
    </div> 
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="<?php echo $pimg1; ?>" style="width:100%;"/>
        </div>
          <div class="col-md-6">
            <form method="post" name="form1">
                <div class="form-group">
                    <h3> Product Name: <?php echo $name; ?></h3>

                </div>

                <div class="form-group">
                    <h3> Description: <?php echo $desc; ?></h3>
                    
                </div>
                <div class="form-group">
                    <h3> Price: &#8377; <?php echo $price; ?>/-</h3>
                    
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" class="form-control" name="txtqty" placeholder="Enter Qunatity" value="<?php echo $oqty; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary" name="btnupdate" onclick="return validation();" style="background-color: #18ffff;">UPDATE QUANTITY</button>
            </form>
         </div> 
    </div> 
</div>



<?php
include("footer.php"); 
?>