<?php
session_start();
include("header.php"); 
include("connect.php");
?>

<script>
    function validation()
    {
        if(form1.txtadd.value=="")
        {
            alert("Please Enter Your Delivery Address");
            form1.txtadd.focus();
            return false;
        }

        var v = /^[0-9]{10,10}$/
        if(form1.txtmno.value=="")
        {
            alert("Please Enter Your Mobile No");
            form1.txtmno.focus();
            return false;
        }
        else if(form1.txtmno.value.length!=10)
        {
            alert("Please Enter Your Mobile No in 10 Digit");
            form1.txtmno.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtmno.value))
            {
                alert("Please Enter Only Digits in Your Mobile No");
                form1.txtmno.focus();
                return false;
            }
        }
    }
</script>

<?php
if(isset($_POST['btnord']))
{ 
    $cartid = $_SESSION["cartid"];
    $custid = $_SESSION["custid"];
    $odate = date("Y-m-d");
    $add = $_POST["txtadd"];
    $mno = $_POST["txtmno"];

   // $res1 = mysqli_query($con,"select sum(qty*price) from cart_detail where cart_id='$cartid'");
  $res1 = mysqli_query($con,"SELECT IFNULL(SUM(qty*price),0) AS total FROM cart_detail WHERE cart_id='$cartid'");

if(!$res1){
    die("Query Error (cart_detail): " . mysqli_error($con));
}

$r1 = mysqli_fetch_array($res1);
$amt = $r1['total'];
        /*$res2 = mysqli_query($con,"select max(order_id) from order_detail");
        $oid=0;
        while ($r2=mysqli_fetch_array($res2))
        {
            $oid=$r2[0];
        }
        $oid++;*/
        $res2 = mysqli_query($con,"SELECT MAX(order_id) AS maxid FROM order_detail");

if(!$res2){
    die("Query Error (order_detail): " . mysqli_error($con));
}

$r2 = mysqli_fetch_array($res2);
$oid = $r2['maxid'] ?? 0;
$oid++;

        $query = "insert into order_detail values('$oid','$odate','$cartid','$custid','$add','$mno','$amt')";
        if(mysqli_query($con,$query))
        {
            unset($_SESSION["cartid"]);
            echo "<script>";
            echo "alert('Order Placed Successfully');";
            echo "window.location.href='cust_view_orders.php';";
            echo "</script>";
        }
        else
        {
            echo "Error In Order: ".mysqli_error($con);
        }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h1>ORDER FORM</h1>
         </div> 
    </div> 
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="assets/img/log1.gif" style="width:100%;"/>
        </div>
          <div class="col-md-6">
            <form method="post" name="form1">
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"> Delivery Address</label>
                    <textarea class="form-control" name="txtadd" placeholder="Enter Delivery Address" rows="3"></textarea>
                </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Mobile No</label>
                    <input type="text" class="form-control" name="txtmno" placeholder="Enter Mobile No">
                </div>
                
                <button type="submit" class="btn btn-primary" name="btnord" onclick="return validation();" style="background-color: #18ffff;">PLACE YOUR ORDER</button>
            </form>
         </div> 
    </div> 
</div>



<?php
include("footer.php"); 
?>