<?php
include("admin_header.php"); 
include("connect.php");
?>

<script>
  function validation()
{
    var v = /^[a-zA-Z0-9 ]{2,50}$/; // ✅ letters + numbers allowed

    if(form1.txtcat.value=="")
    {
        alert("Please Enter Category");
        form1.txtcat.focus();
        return false;
    }
    else
    {
        if(!v.test(form1.txtcat.value))
        {
            alert("Please Enter Only Characters and Numbers in Category");
            form1.txtcat.focus();
            return false;
        }
    }
}
</script>

<?php
if(isset($_POST['btnsave']))
{
    $cat = $_POST["txtcat"];
    
    $res2 = mysqli_query($con,"select max(category_id) from product_category");
    $cid=0;
    while ($r2=mysqli_fetch_array($res2))
    {
        $cid=$r2[0];
    }
    $cid++;

    $query = "insert into product_category values('$cid','$cat')";
    if(mysqli_query($con,$query))
    {
        echo "<script>";
        echo "alert('Category Saved Successfull');";
        echo "window.location.href='admin_manage_category.php';";
        echo "</script>";
    }
    else
    {
        echo "Error In Insertion: ".mysqli_error($con);
    }
}

if(isset($_REQUEST['dcid']))
{
    $cid1=$_REQUEST['dcid'];
    $query = "delete from product_category where category_id='$cid1'";
    if(mysqli_query($con,$query))
    {
        echo "<script>";
        echo "alert('Category Deleted Successfull');";
        echo "window.location.href='admin_manage_category.php';";
        echo "</script>";
    }
    else
    {
        echo "Error In Deletion: ".mysqli_error($con);
    }
}

if(isset($_REQUEST['ecid']))
{
    $cid1=$_REQUEST['ecid'];
    $res5=mysqli_query($con,"select * from product_category where category_id='$cid1'");
    $r5=mysqli_fetch_array($res5);
    $cat1 = $r5[1];
}

if(isset($_POST['btnupdate']))
{
    $cat = $_POST["txtcat"];
    $cid = $_REQUEST['ecid'];

    $query = "update product_category set category='$cat'where category_id='$cid'";
    if(mysqli_query($con,$query))
    {
        echo "<script>";
        echo "alert('Category Upadte Successfull');";
        echo "window.location.href='admin_manage_category.php';";
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
            <h1>MANAGE CATEGORY</h1>
         </div> 
    </div> 
    <div class="row mt-5">
        <div class="col-md-6">
            <?php
                $res3=mysqli_query($con,"select * from product_category");
                if(mysqli_num_rows($res3)>0)
                {
                    echo "<table class='table table-bordered'>
                            <tr>
                                <th> CATEGORY ID</th>
                                <th> CATEGORY</th>
                                <th> EDIT</th>
                                <th> DELETE</th>
                            </tr>";
                        while($r3=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                            echo "<td>$r3[0]</td>";
                            echo "<td>$r3[1]</td>";
                            echo "<td><a href='admin_manage_category.php?ecid=$r3[0]'>EDIT</a></td>";
                            echo "<td><a href='admin_manage_category.php?dcid=$r3[0]'>DELETE</a></td>";
                            echo "</tr>";
                        }
                    echo "</table>";
                }
                else
                {
                    echo "<h2>No Category Found</h2>";
                }
            ?>
        </div>
          <div class="col-md-6">
            <form method="post" name="form1">
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter Category</label>
                    <input type="text" class="form-control" name="txtcat" placeholder="Enter category" value="<?php echo $cat1;?>">
                </div>
                <?php
                if(isset($_REQUEST['ecid']))
                {
                    ?>
                        <button type="submit" class="btn btn-primary" name="btnupdate" onclick="return validation();" style="background-color: #18ffff;">UPDATE</button>
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
    </div> 
</div>



<?php
include("footer.php"); 
?>