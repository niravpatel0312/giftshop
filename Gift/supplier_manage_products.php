<?php
session_start();
include("supplier_header.php"); 
include("connect.php");
?>

<script>
    function validation()
    { 
        var v = /^[a-zA-Z ]{2,50}$/
        if(form1.txtname.value=="")
        {
            alert("Please Enter Products Name");
            form1.txtname.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtname.value))
            {
                alert("Please Enter Only Characters in Products Name");
                form1.txtname.focus();
                return false;
            }
        }

       

        if(form1.selcat.value =="0")
        {
           alert("Please Select Category");
            form1.selcat.focus();
            return false; 
        }

        var v = /^[0-9]{1,5}$/
        if(form1.txtprice.value =="")
        {
           alert("Please Enter Price");
            form1.txtprice.focus();
            return false; 
        }
        else if(parseInt(form1.txtprice.value)<=0)
        {
            alert("Please Enter Price Greater than 0");
            form1.txtprice.focus();
            return false; 
        }
        else if(!v.test(form1.txtprice.value))
        {
            alert("Please Enter Only Digit in Price");
            form1.txtprice.focus();
            return false; 
        }

        if(document.getElementById("txtimg").value=="")
        {
            alert("Please Select Product Iamge");
            return false;
        }
    }

    function validation_update()
    { 
        var v = /^[a-zA-Z ]{2,50}$/
        if(form1.txtname.value=="")
        {
            alert("Please Enter Products Name");
            form1.txtname.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtname.value))
            {
                alert("Please Enter Only Characters in Products Name");
                form1.txtname.focus();
                return false;
            }
        }

       
        if(form1.select.value =="0")
        {
           alert("Please Select Category");
            form1.selcat.focus();
            return false; 
        }

        var v = /^[0-9]{1,5}$/
        if(form1.txtprice.value =="")
        {
           alert("Please Enter Price");
            form1.txtprice.focus();
            return false; 
        }
        else if(parseInt(form1.txtprice.value)<=0)
        {
            alert("Please Enter Price Greater than 0");
            form1.txtprice.focus();
            return false; 
        }
        else if(!v.test(form1.txtprice.value))
        {
            alert("Please Enter Only Digit in Price");
            form1.txtprice.focus();
            return false; 
        }
    }
</script>

<?php
if(isset($_POST['btnsave']))
{
    $name = $_POST["txtname"];
    

    $catid = $_POST["selcat"];
    $price = $_POST["txtprice"];

    $tpath = $_FILES["txtimg"]["tmp_name"];
    $ipath = "products_img/".time().".png";
    $sid =  $_SESSION["suppid"];
    
    $res2 = mysqli_query($con,"select max(product_id) from product_detail");
        $pid=0;
        while($r2=mysqli_fetch_array($res2))
        {
            $pid=$r2[0];
        }
        $pid++;

    $query = "insert into product_detail values('$pid','$name','','$catid','$price','$ipath','$sid')";
    if(mysqli_query($con,$query))
    {
        move_uploaded_file($tpath,$ipath);
        echo "<script>";
        echo "alert('Products Detail Saved Successfull');";
        echo "window.location.href='supplier_manage_products.php';";
        echo "</script>";
    }
    else
    {
        echo "Error In Insertion: ".mysqli_error($con);
    }

}

if(isset($_REQUEST['dpid']))
{
    $pid1=$_REQUEST['dpid'];
    $query = "delete from product_detail where product_id='$pid1'";
    if(mysqli_query($con,$query))
    {
        echo "<script>";
        echo "alert('Product Deleted Successfull');";
        echo "window.location.href='supplier_manage_products.php';";
        echo "</script>";
    }
    else
    {
        echo "Error In Deletion: ".mysqli_error($con);
    }
}

if(isset($_REQUEST['epid']))
{
    $pid1=$_REQUEST['epid'];
    $res5=mysqli_query($con,"select * from product_detail where product_id='$pid1'");
    $r5=mysqli_fetch_array($res5);
    $name1 = $r5[1];
    
    $cid1 = $r5[3];
    $price1 = $r5[4];
    $pimg1 = $r5[5];
}

if(isset($_POST['btnupdate']))
{
    $name = $_POST["txtname"];
    
    $catid = $_POST["selcat"];
    $price = $_POST["txtprice"];
    $pid = $_REQUEST['epid'];

    if($_FILES["txtimg"]["size"] > 0)
    {
        $tpath = $_FILES["txtimg"]["tmp_name"];
        $ipath = "products_img/".time().".png";
        move_uploaded_file($tpath,$ipath);
        $query = "update product_detail set product_name='$name',category_id='$catid',price='$price',product_image='$ipath' where product_id='$pid'";
    }else{
        $query = "update product_detail set product_name='$name',category_id='$catid',price='$price' where product_id='$pid'";
    }
    
    if(mysqli_query($con,$query))
    {
        echo "<script>";
        echo "alert('Product Updated Successfull');";
        echo "window.location.href='supplier_manage_products.php';";
        echo "</script>";
    }
    else
    {
        echo "Error In Updation: ".mysqli_error($con);
    }

}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h1>MANAGE PRODUCTS</h1>
         </div> 
    </div> 
    <div class="row mt-5">
          <div class="col-md-6">
            <form method="post" name="form1" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter Product Name</label>
                    <input type="text" class="form-control" name="txtname" placeholder="Enter Product Name" value="<?php echo $name1;?>">
                </div>

                

                <div class="form-group">
                    <label for="exampleInputEmail1">Select Category</label>
                    <select class="form-control" name="selcat">
                        <option value="0">Select category</option>
                        <?php
                            $res6=mysqli_query($con,"select * from product_category");
                            while($r6=mysqli_fetch_array($res6))
                            {
                        ?>
                                <option value="<?php echo $r6[0]; ?>" <?php if($cid1==$r6[0]){ echo "selected='selected'"; } ?>> <?php echo $r6[1]; ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Enter Price</label>
                    <input type="text" class="form-control" name="txtprice" placeholder="Enter Price" value="<?php echo $price1;?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Select Products Image</label>
                    <input type="file" class="form-control" name="txtimg" id="txtimg">
                </div>

                <?php
                if(isset($_REQUEST['epid']))
                {
                    ?>
                        <img src="<?php echo $pimg1; ?>" style="width:150px; height:150px;" >
                        <button type="submit" class="btn btn-primary" name="btnupdate" onclick="return validation_update();" style="background-color: #18ffff;">UPDATE</button>
                    <?php
                }
                else
                {
                    ?>
                        <button type="submit" class="btn btn-primary" name="btnsave" onclick="return validation();" style="background-color: #18ffff;">SAVE</button>
                    <?php
                }
                ?>
             
            </form>
         </div> 
         <div class="col-md-12">
            <?php
                $suppid = $_SESSION["suppid"];
                $res3=mysqli_query($con,"select * from product_detail where supplier_id='$suppid'");
                if(mysqli_num_rows($res3)>0)
                {
                    echo"<table class='table table-bordered'>
                           <tr>
                                <th> PRODUCT ID</th>
                                <th> PRODUCT NAME</th>
                                
                                <th> CATEGORY</th>
                                <th> PRICE</th>
                                <th> PRODUCT IMAGE</th>
                                <th> EDIT</th>
                                <th> DELETE</th>
                            </tr>";
                        while($r3=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                            echo "<td>$r3[0]</td>";
                            echo "<td>$r3[1]</td>";
                            //echo "<td>$r3[2]</td>";
                            //echo "<td>$r3[3]</td>";
                            $res4=mysqli_query($con,"select * from product_category where category_id='$r3[3]'");
                            $r4=mysqli_fetch_array($res4);
                            echo "<td>$r4[1]</td>";
                            echo "<td>$r3[4]</td>";
                            echo "<td><img src='$r3[5]' style='width:150px; height:150px;'></td>";
                            echo "<td><a href='supplier_manage_products.php?epid=$r3[0]'>EDIT</a></td>";
                            echo "<td><a href='supplier_manage_products.php?dpid=$r3[0]'>DELETE</a></td>";
                            echo "</tr>";
                        }
                    echo "</table>";
                }
                else
                {
                    echo "<h2>No Product Found</h2>";
                } 
            ?>
        </div>
    </div> 
</div>



<?php
include("footer.php"); 
?>